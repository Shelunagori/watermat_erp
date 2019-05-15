<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WorkSchedules Controller
 *
 * @property \App\Model\Table\WorkSchedulesTable $WorkSchedules
 *
 * @method \App\Model\Entity\WorkSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkSchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $workSchedules = $this->paginate($this->WorkSchedules);

        $this->set(compact('workSchedules'));
    }

    /**
     * View method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workSchedule = $this->WorkSchedules->get($id, [
            'contain' => ['Villages']
        ]);

        $this->set('workSchedule', $workSchedule);
    }
    public function scheduleReport($project_id,$village_id)
    {
        $workSchedules = $this->WorkSchedules->find()
                        ->contain(['VillageWorkReports'=>function($q)use($village_id){
                            return $q->where(['VillageWorkReports.village_id'=>$village_id]);
                        }])
                        ->order(['WorkSchedules.id'=>'ASC']);
        $this->set(compact('workSchedules'));
    }
    public function civilReport($village_work_id,$work_schedule_id)
    {
        $workSchedule = $this->WorkSchedules->get($work_schedule_id,[
                            'contain' => ['WorkScheduleRows'=>['WorkSatisfactions']]
                        ]);
        $this->set(compact('workSchedule'));
    }
    public function installationReport($village_work_id,$work_schedule_id)
    {
        $workSchedule = $this->WorkSchedules->get($work_schedule_id,[
                            'contain' => ['WorkScheduleRows'=>['WorkSatisfactions']]
                        ]);
        //pr($workSchedule->toArray()); exit;
        $this->set(compact('workSchedule'));
    }
    public function commissioningReport($village_work_id,$work_schedule_id)
    {
        $workSchedule = $this->WorkSchedules->get($work_schedule_id,[
                            'contain' => ['WorkScheduleRows'=>['WorkSatisfactions']]
                        ]);
        //pr($workSchedule->toArray()); exit;
        $this->set(compact('workSchedule'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workSchedule = $this->WorkSchedules->newEntity();
        if ($this->request->is('post')) {
            $workSchedule = $this->WorkSchedules->patchEntity($workSchedule, $this->request->getData());
            if ($this->WorkSchedules->save($workSchedule)) {
                $this->Flash->success(__('The work schedule has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The work schedule could not be saved. Please, try again.'));
        }
        $this->set(compact('workSchedule'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workSchedule = $this->WorkSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workSchedule = $this->WorkSchedules->patchEntity($workSchedule, $this->request->getData());
            if ($this->WorkSchedules->save($workSchedule))
                $response = 1;
            else
                $response = 0;
        }
        $this->set(compact('workSchedule','response'));
        $this->set('_serialize', ['response']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workSchedule = $this->WorkSchedules->get($id);
        if ($this->WorkSchedules->delete($workSchedule)) {
            $this->Flash->success(__('The work schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The work schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
