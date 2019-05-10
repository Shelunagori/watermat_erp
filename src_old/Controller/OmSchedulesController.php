<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OmSchedules Controller
 *
 * @property \App\Model\Table\OmSchedulesTable $OmSchedules
 *
 * @method \App\Model\Entity\OmSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OmSchedulesController extends AppController
{

    /**
    * Index method
    *
    * @return \Cake\Http\Response|void
    */
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Villages']
        ];
        $omSchedules = $this->paginate($this->OmSchedules);

        $this->set(compact('omSchedules'));
    }

    /**
     * View method
     *
     * @param string|null $id Om Schedule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $omSchedule = $this->OmSchedules->get($id, [
            'contain' => ['Villages']
        ]);

        $this->set('omSchedule', $omSchedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $omSchedule = $this->OmSchedules->newEntity();
        if ($this->request->is('post')) {
            $omSchedule = $this->OmSchedules->patchEntity($omSchedule, $this->request->getData());
            if ($this->OmSchedules->save($omSchedule)) {
                $this->Flash->success(__('The om schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The om schedule could not be saved. Please, try again.'));
        }
        $villages = $this->OmSchedules->Villages->find('list');
        $this->set(compact('omSchedule', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Om Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $omSchedule = $this->OmSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $omSchedule = $this->OmSchedules->patchEntity($omSchedule, $this->request->getData());
            if ($this->OmSchedules->save($omSchedule)) {
                $this->Flash->success(__('The om schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The om schedule could not be saved. Please, try again.'));
        }
        $villages = $this->OmSchedules->Villages->find('list');
        $this->set(compact('omSchedule', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Om Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $omSchedule = $this->OmSchedules->get($id);
        if ($this->OmSchedules->delete($omSchedule)) {
            $this->Flash->success(__('The om schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The om schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
