<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeeDesignations Controller
 *
 * @property \App\Model\Table\EmployeeDesignationsTable $EmployeeDesignations
 *
 * @method \App\Model\Entity\EmployeeDesignation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeDesignationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $employeeDesignation = $this->EmployeeDesignations->get($id);
        else
            $employeeDesignation = $this->EmployeeDesignations->newEntity();

        $employeeDesignations = $this->paginate($this->EmployeeDesignations);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeDesignation = $this->EmployeeDesignations->patchEntity($employeeDesignation, $this->request->getData());
            if ($this->EmployeeDesignations->save($employeeDesignation)) {
                $this->Flash->success(__('The employee designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee designation could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeDesignations','employeeDesignation'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Designation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeDesignation = $this->EmployeeDesignations->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('employeeDesignation', $employeeDesignation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeDesignation = $this->EmployeeDesignations->newEntity();
        if ($this->request->is('post')) {
            $employeeDesignation = $this->EmployeeDesignations->patchEntity($employeeDesignation, $this->request->getData());
            if ($this->EmployeeDesignations->save($employeeDesignation)) {
                $this->Flash->success(__('The employee designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee designation could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeDesignation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Designation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeDesignation = $this->EmployeeDesignations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeDesignation = $this->EmployeeDesignations->patchEntity($employeeDesignation, $this->request->getData());
            if ($this->EmployeeDesignations->save($employeeDesignation)) {
                $this->Flash->success(__('The employee designation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee designation could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeDesignation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Designation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeDesignation = $this->EmployeeDesignations->get($id);
        if ($this->EmployeeDesignations->delete($employeeDesignation)) {
            $this->Flash->success(__('The employee designation has been deleted.'));
        } else {
            $this->Flash->error(__('The employee designation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
