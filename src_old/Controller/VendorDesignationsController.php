<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VendorDesignations Controller
 *
 * @property \App\Model\Table\VendorDesignationsTable $VendorDesignations
 *
 * @method \App\Model\Entity\VendorDesignation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorDesignationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $vendorDesignation = $this->VendorDesignations->get($id);
        else
            $vendorDesignation = $this->VendorDesignations->newEntity();

        $vendorDesignations = $this->paginate($this->VendorDesignations);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorDesignation = $this->VendorDesignations->patchEntity($vendorDesignation, $this->request->getData());
            if ($this->VendorDesignations->save($vendorDesignation)) {
                $this->Flash->success(__('The vendor designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor designation could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorDesignations','vendorDesignation'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Designation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorDesignation = $this->VendorDesignations->get($id, [
            'contain' => ['Vendors']
        ]);

        $this->set('vendorDesignation', $vendorDesignation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorDesignation = $this->VendorDesignations->newEntity();
        if ($this->request->is('post')) {
            $vendorDesignation = $this->VendorDesignations->patchEntity($vendorDesignation, $this->request->getData());
            if ($this->VendorDesignations->save($vendorDesignation)) {
                $this->Flash->success(__('The vendor designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor designation could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorDesignation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Designation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorDesignation = $this->VendorDesignations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorDesignation = $this->VendorDesignations->patchEntity($vendorDesignation, $this->request->getData());
            if ($this->VendorDesignations->save($vendorDesignation)) {
                $this->Flash->success(__('The vendor designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor designation could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorDesignation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Designation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorDesignation = $this->VendorDesignations->get($id);
        if ($this->VendorDesignations->delete($vendorDesignation)) {
            $this->Flash->success(__('The vendor designation has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor designation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
