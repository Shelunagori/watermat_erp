<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vendors Controller
 *
 * @property \App\Model\Table\VendorsTable $Vendors
 *
 * @method \App\Model\Entity\Vendor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VendorDesignations']
        ];
        $vendors = $this->paginate($this->Vendors);

        $this->set(compact('vendors'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendor = $this->Vendors->get($id, [
            'contain' => ['VendorDesignations']
        ]);

        $this->set('vendor', $vendor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendor = $this->Vendors->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user']['username'] = $data['contact_no']+1;
            $data['user']['password'] = "hello";

            $vendor = $this->Vendors->patchEntity($vendor, $data);

            foreach ($_FILES as $key => $file) {
                $vendor->$key = $this->Help->upload($file);
                if(!$vendor->$key && $file['error'] != 4)
                    $this->Flash->error($key." (".$file['name']." ) can not be uploaded");
            }
            if ($this->Vendors->save($vendor))
            {
                $this->Flash->success(__('The vendor has been saved.'));
                  return $this->redirect(['controller'=>'Employees','action' => 'createUser','vendor']);
            }
            $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
        }
        $vendorDesignations = $this->Vendors->VendorDesignations->find('list');
        $this->set(compact('vendor', 'vendorDesignations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendor = $this->Vendors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendor_patch = $this->Vendors->patchEntity($vendor, $this->request->getData());

            foreach ($_FILES as $key => $file) {
                $vendor_patch->$key = $this->Help->upload($file,$vendor->$key);
                if(!$vendor_patch->$key && $file['error'] != 4)
                    $this->Flash->error($key." (".$file['name']." ) can not be uploaded");
            }
            
            if ($this->Vendors->save($vendor_patch)) {
                $this->Flash->success(__('The vendor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
        }
        $vendorDesignations = $this->Vendors->VendorDesignations->find('list');
        $this->set(compact('vendor', 'vendorDesignations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendor = $this->Vendors->get($id);
        if ($this->Vendors->delete($vendor)) {
            $this->Flash->success(__('The vendor has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getVendors()
    {
        $vendors = $this->Vendors->find('list')->where(['vendor_designation_id'=>$this->request->getData('designation_id')]);
        $this->set(compact('vendors'));
        $this->set('_serialize', ['vendors']);
    }
}
