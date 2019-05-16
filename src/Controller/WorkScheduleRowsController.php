<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
/**
 * WorkScheduleRows Controller
 *
 * @property \App\Model\Table\WorkScheduleRowsTable $WorkScheduleRows
 *
 * @method \App\Model\Entity\WorkScheduleRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkScheduleRowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $workScheduleRow = $this->WorkScheduleRows->get($id);
        else
            $workScheduleRow = $this->WorkScheduleRows->newEntity();
        
        $this->paginate = [
            'contain' => ['WorkSchedules']
        ];
        if ($this->request->query('search')) 
        { 
            $workScheduleRo = $this->WorkScheduleRows->find();
            if(!empty($this->request->query('work_schedule_id')))
            {
                $work_schedule_id = $this->request->query('work_schedule_id');
                $workScheduleRo->where(['work_schedule_id'=>$work_schedule_id]);
                
            }
            elseif(!empty($this->request->query('name')))
            {
                $name = $this->request->query('name');
                $workScheduleRo->where(function (QueryExpression $exp, Query $q) use($name) {
                    return $exp->like('WorkScheduleRows.name', '%'.$name.'%');
                });
            }
            $workScheduleRows = $this->paginate($workScheduleRo);
        }
        else
        {
           $workScheduleRows = $this->paginate($this->WorkScheduleRows);
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $workScheduleRow = $this->WorkScheduleRows->patchEntity($workScheduleRow, $this->request->getData());
            if ($this->WorkScheduleRows->save($workScheduleRow)) {
                $this->Flash->success(__('The work schedule row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work schedule row could not be saved. Please, try again.'));
        }
        $workSchedules = $this->WorkScheduleRows->WorkSchedules->find('list');

        $this->set(compact('workScheduleRows', 'workScheduleRow', 'workSchedules'));
    }

    /**
     * View method
     *
     * @param string|null $id Work Schedule Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workScheduleRow = $this->WorkScheduleRows->get($id, [
            'contain' => ['WorkSchedules']
        ]);

        $this->set('workScheduleRow', $workScheduleRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workScheduleRow = $this->WorkScheduleRows->newEntity();
        if ($this->request->is('post')) {
            $workScheduleRow = $this->WorkScheduleRows->patchEntity($workScheduleRow, $this->request->getData());
            if ($this->WorkScheduleRows->save($workScheduleRow)) {
                $this->Flash->success(__('The work schedule row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work schedule row could not be saved. Please, try again.'));
        }
        $workSchedules = $this->WorkScheduleRows->WorkSchedules->find('list');
        $this->set(compact('workScheduleRow', 'workSchedules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Schedule Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workScheduleRow = $this->WorkScheduleRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workScheduleRow = $this->WorkScheduleRows->patchEntity($workScheduleRow, $this->request->getData());
            if ($this->WorkScheduleRows->save($workScheduleRow)) {
                $this->Flash->success(__('The work schedule row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work schedule row could not be saved. Please, try again.'));
        }
        $workSchedules = $this->WorkScheduleRows->WorkSchedules->find('list');
        $this->set(compact('workScheduleRow', 'workSchedules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Schedule Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workScheduleRow = $this->WorkScheduleRows->get($id);
        if ($this->WorkScheduleRows->delete($workScheduleRow)) {
            $this->Flash->success(__('The work schedule row has been deleted.'));
        } else {
            $this->Flash->error(__('The work schedule row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
