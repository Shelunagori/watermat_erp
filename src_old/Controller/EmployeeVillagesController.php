<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeeVillages Controller
 *
 * @property \App\Model\Table\EmployeeVillagesTable $EmployeeVillages
 *
 * @method \App\Model\Entity\EmployeeVillage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeVillagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Villages']
        ];
        $employeeVillages = $this->paginate($this->EmployeeVillages);

        $this->set(compact('employeeVillages'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Village id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeVillage = $this->EmployeeVillages->get($id, [
            'contain' => ['Employees', 'Villages']
        ]);

        $this->set('employeeVillage', $employeeVillage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeVillage = $this->EmployeeVillages->newEntity();
        if ($this->request->is('post')) {
            $employeeVillage = $this->EmployeeVillages->patchEntity($employeeVillage, $this->request->getData());
            if ($this->EmployeeVillages->save($employeeVillage)) {
                $this->Flash->success(__('The employee village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee village could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeVillages->Employees->find('list');
        $villages = $this->EmployeeVillages->Villages->find('list');
        $this->set(compact('employeeVillage', 'employees', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Village id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeVillage = $this->EmployeeVillages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeVillage = $this->EmployeeVillages->patchEntity($employeeVillage, $this->request->getData());
            if ($this->EmployeeVillages->save($employeeVillage)) {
                $this->Flash->success(__('The employee village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee village could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeVillages->Employees->find('list');
        $villages = $this->EmployeeVillages->Villages->find('list');
        $this->set(compact('employeeVillage', 'employees', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Village id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeVillage = $this->EmployeeVillages->get($id);
        if ($this->EmployeeVillages->delete($employeeVillage)) {
            $this->Flash->success(__('The employee village has been deleted.'));
        } else {
            $this->Flash->error(__('The employee village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
