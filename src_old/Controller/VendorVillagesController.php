<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VendorVillages Controller
 *
 * @property \App\Model\Table\VendorVillagesTable $VendorVillages
 *
 * @method \App\Model\Entity\VendorVillage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorVillagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Villages']
        ];
        $vendorVillages = $this->paginate($this->VendorVillages);

        $this->set(compact('vendorVillages'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Village id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorVillage = $this->VendorVillages->get($id, [
            'contain' => ['Vendors', 'Villages']
        ]);

        $this->set('vendorVillage', $vendorVillage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorVillage = $this->VendorVillages->newEntity();
        if ($this->request->is('post')) {
            $vendorVillage = $this->VendorVillages->patchEntity($vendorVillage, $this->request->getData());
            if ($this->VendorVillages->save($vendorVillage)) {
                $this->Flash->success(__('The vendor village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor village could not be saved. Please, try again.'));
        }
        $vendors = $this->VendorVillages->Vendors->find('list');
        $villages = $this->VendorVillages->Villages->find('list');
        $this->set(compact('vendorVillage', 'vendors', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Village id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorVillage = $this->VendorVillages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorVillage = $this->VendorVillages->patchEntity($vendorVillage, $this->request->getData());
            if ($this->VendorVillages->save($vendorVillage)) {
                $this->Flash->success(__('The vendor village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor village could not be saved. Please, try again.'));
        }
        $vendors = $this->VendorVillages->Vendors->find('list');
        $villages = $this->VendorVillages->Villages->find('list');
        $this->set(compact('vendorVillage', 'vendors', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Village id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorVillage = $this->VendorVillages->get($id);
        if ($this->VendorVillages->delete($vendorVillage)) {
            $this->Flash->success(__('The vendor village has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
