<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Godowns Controller
 *
 * @property \App\Model\Table\GodownsTable $Godowns
 *
 * @method \App\Model\Entity\Godown[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GodownsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $godown = $this->Godowns->get($id);
        else
            $godown = $this->Godowns->newEntity();

        $this->paginate = [
            'contain' => ['Employees']
        ];
        
        $godowns = $this->paginate($this->Godowns);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $godown = $this->Godowns->patchEntity($godown, $this->request->getData());
            if ($this->Godowns->save($godown)) {
                $this->Flash->success(__('The godown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The godown could not be saved. Please, try again.'));
        }
        $employees = $this->Godowns->Employees->find('list');
        $this->set(compact('godowns', 'godown', 'employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Godown id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $godown = $this->Godowns->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('godown', $godown);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $godown = $this->Godowns->newEntity();
        if ($this->request->is('post')) {
            $godown = $this->Godowns->patchEntity($godown, $this->request->getData());
            if ($this->Godowns->save($godown)) {
                $this->Flash->success(__('The godown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The godown could not be saved. Please, try again.'));
        }
        $employees = $this->Godowns->Employees->find('list');
        $this->set(compact('godown', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Godown id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $godown = $this->Godowns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $godown = $this->Godowns->patchEntity($godown, $this->request->getData());
            if ($this->Godowns->save($godown)) {
                $this->Flash->success(__('The godown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The godown could not be saved. Please, try again.'));
        }
        $employees = $this->Godowns->Employees->find('list');
        $this->set(compact('godown', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Godown id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $godown = $this->Godowns->get($id);
        if ($this->Godowns->delete($godown)) {
            $this->Flash->success(__('The godown has been deleted.'));
        } else {
            $this->Flash->error(__('The godown could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function villageRequest($godown_id = null)
    {
        $employees = $this->Godowns->Employees->find('list');
        $godown_id = $this->session->read('godown_id');
        $villages = $this->Godowns->GodownVillages->find()->where(['godown_id'=>$godown_id]);
        if(!$villages->isEmpty())
        {
            foreach ($villages as $key => $village)
                $village_ids[] = $village->village_id;
            $villageRequests = $this->Godowns->VillageRequests->find()->where(['village_id IN'=>$village_ids])
                                ->contain(['Villages','VillageRequestProducts'=>function($q)
                                { 
                                    return $q->select(['product'=>'Products.name'])
                                            ->select($this->Godowns->VillageRequests->VillageRequestProducts)
                                            ->contain(['Products']);
                                    
                                }])
                                ->where(['status'=>'pending']);
        }
        $this->set(compact('godown_id', 'villageRequests'));
    }

    public function markRequestSent($id)
    {
        $villageRequest = $this->Godowns->VillageRequests->get($id);
        $villageRequest->status = 'sent';

        if($this->Godowns->VillageRequests->save($villageRequest))
            $success = true;
        else
            $success = false;

        echo $success;exit;
    }
}
