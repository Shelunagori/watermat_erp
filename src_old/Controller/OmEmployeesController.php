<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OmEmployees Controller
 *
 * @property \App\Model\Table\OmEmployeesTable $OmEmployees
 *
 * @method \App\Model\Entity\OmEmployee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OmEmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Villages', 'Technicians', 'Managers']
        ];
        $omEmployees = $this->paginate($this->OmEmployees);

        $this->set(compact('omEmployees'));
    }

    /**
     * View method
     *
     * @param string|null $id Om Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $omEmployee = $this->OmEmployees->get($id, [
            'contain' => ['Villages', 'Technicians', 'Managers']
        ]);

        $this->set('omEmployee', $omEmployee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $omEmployee = $this->OmEmployees->newEntity();
        if ($this->request->is('post')) {
            $omEmployee = $this->OmEmployees->patchEntity($omEmployee, $this->request->getData());
            if ($this->OmEmployees->save($omEmployee)) {
                $this->Flash->success(__('The om employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The om employee could not be saved. Please, try again.'));
        }
        $villages = $this->OmEmployees->Villages->find('list');
        $technicians = $this->OmEmployees->Technicians->find('list');
        $managers = $this->OmEmployees->Managers->find('list');
        $this->set(compact('omEmployee', 'villages', 'technicians', 'managers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Om Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $omEmployee = $this->OmEmployees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $omEmployee = $this->OmEmployees->patchEntity($omEmployee, $this->request->getData());
            if ($this->OmEmployees->save($omEmployee)) {
                $this->Flash->success(__('The om employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The om employee could not be saved. Please, try again.'));
        }
        $villages = $this->OmEmployees->Villages->find('list');
        $technicians = $this->OmEmployees->Technicians->find('list');
        $managers = $this->OmEmployees->Managers->find('list');
        $this->set(compact('omEmployee', 'villages', 'technicians', 'managers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Om Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $omEmployee = $this->OmEmployees->get($id);
        if ($this->OmEmployees->delete($omEmployee)) {
            $this->Flash->success(__('The om employee has been deleted.'));
        } else {
            $this->Flash->error(__('The om employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function omSchedule()
    {
        $omEmployee = $this->OmEmployees->OmSchedules->newEntity();
        if ($this->request->is('post')) 
        {
            $data = $this->request->getData('data');
            //pr($data);exit;

            foreach ($data as $key => $value) {
                
                if($this->OmEmployees->OmSchedules->exists(['village_id'=>$value['village_id']]))
                    $omSchedule = $this->OmEmployees->OmSchedules->find()->where(['village_id'=>$value['village_id']])->last();
                else
                    $omSchedule = $this->OmEmployees->OmSchedules->newEntity();
                
                $omSchedule = $this->OmEmployees->OmSchedules->patchEntity($omSchedule,$value);

                if($this->OmEmployees->OmScheduleMasters->exists(['village_id'=>$value['village_id']]))
                    $omScheduleMaster = $this->OmEmployees->OmScheduleMasters->find()->where(['village_id'=>$value['village_id']])->last();
                else
                    $omScheduleMaster = $this->OmEmployees->OmScheduleMasters->newEntity();

                $omScheduleMaster = $this->OmEmployees->OmScheduleMasters->patchEntity($omScheduleMaster,$value);

                $this->OmEmployees->OmSchedules->save($omSchedule);
                $this->OmEmployees->OmScheduleMasters->save($omScheduleMaster);
            }
            return $this->redirect('');
        }

        $technicians = $this->OmEmployees->Technicians->find('list');
        $this->set(compact('omEmployee', 'technicians'));
    }

    public function getVillages()
    {
        $id = $this->request->getData('id');
        $response = $this->OmEmployees->find()
            ->select(['id'=>'Villages.id','name'=>'Villages.name','days'=>'OmScheduleMasters.days'])
            ->innerJoinWith('Villages')
            ->leftJoinWith('OmScheduleMasters')
            ->where(['OmEmployees.technician_id'=>$id]);
        if(!empty($response->toArray()))
        {
            foreach ($response as $key => $value) {
                $data = $this->OmEmployees->OmSchedules->find()->where(['village_id'=>$value->id])->order(['id'=>'DESC'])->limit(1);
                if(!empty($data->toArray()))
                    $value->set('visit_date',date('d-M-Y',strtotime($data->first()->visit_date)));
                else
                    $value->set('visit_date','');
            }
            $success = 1;
        }
        else
            $success = 0;

        $this->set(compact('success','response'));
        $this->set('_serialize',['success','response']);
    }
}
