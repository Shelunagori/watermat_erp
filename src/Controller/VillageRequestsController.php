<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VillageRequests Controller
 *
 * @property \App\Model\Table\VillageRequestsTable $VillageRequests
 *
 * @method \App\Model\Entity\VillageRequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageRequestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Villages', 'Technicians', 'Managers', 'OmSchedules']
        ];
        $villageRequests = $this->paginate($this->VillageRequests);

        $this->set(compact('villageRequests'));
    }

    /**
     * View method
     *
     * @param string|null $id Village Request id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $villageRequest = $this->VillageRequests->get($id, [
            'contain' => ['Villages', 'Technicians', 'Managers', 'OmSchedules', 'AccountingEntries', 'VillageRequestProducts']
        ]);

        $this->set('villageRequest', $villageRequest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $villageRequest = $this->VillageRequests->newEntity();
        if ($this->request->is('post')) {
            $villageRequest = $this->VillageRequests->patchEntity($villageRequest, $this->request->getData());
            if ($this->VillageRequests->save($villageRequest)) {
                $this->Flash->success(__('The village request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village request could not be saved. Please, try again.'));
        }
        $villages = $this->VillageRequests->Villages->find('list');
        $technicians = $this->VillageRequests->Technicians->find('list');
        $managers = $this->VillageRequests->Managers->find('list');
        $omSchedules = $this->VillageRequests->OmSchedules->find('list');
        $this->set(compact('villageRequest', 'villages', 'technicians', 'managers', 'omSchedules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Village Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $villageRequest = $this->VillageRequests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $villageRequest = $this->VillageRequests->patchEntity($villageRequest, $this->request->getData());
            if ($this->VillageRequests->save($villageRequest)) {
                $this->Flash->success(__('The village request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village request could not be saved. Please, try again.'));
        }
        $villages = $this->VillageRequests->Villages->find('list');
        $technicians = $this->VillageRequests->Technicians->find('list');
        $managers = $this->VillageRequests->Managers->find('list');
        $omSchedules = $this->VillageRequests->OmSchedules->find('list');
        $this->set(compact('villageRequest', 'villages', 'technicians', 'managers', 'omSchedules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $villageRequest = $this->VillageRequests->get($id);
        if ($this->VillageRequests->delete($villageRequest)) {
            $this->Flash->success(__('The village request has been deleted.'));
        } else {
            $this->Flash->error(__('The village request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
