<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EmployeeDesignations']
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['EmployeeDesignations', 'BankDetails', 'ProjectEmployees', 'Users']
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user']['username'] = $data['contact_no'];
            $data['user']['password'] = "hello";
            $employee = $this->Employees->patchEntity($employee, $data);
            foreach ($_FILES as $key => $file) {
                $employee->$key = $this->Help->upload($file);
                if(!$employee->$key && $file['error'] != 4)
                    $this->Flash->error($key." (".$file['name']." ) can not be uploaded");
            }
            if ($this->Employees->save($employee))
                $this->Flash->success(__('The employee has been saved.'));
            else
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));

            return $this->redirect(['action' => 'createUser','employee']);
        }
        $employeeDesignations = $this->Employees->EmployeeDesignations->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'employeeDesignations'));
    }
    

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee_patch = $this->Employees->patchEntity($employee, $this->request->getData());

            foreach ($_FILES as $key => $file) {
                $employee_patch->$key = $this->Help->upload($file,$employee->$key);
                if(!$employee_patch->$key && $file['error'] != 4)
                    $this->Flash->error($key." (".$file['name']." ) can not be uploaded");
            }

            if ($this->Employees->save($employee_patch))
                $this->Flash->success(__('The employee has been saved.'));
            else
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));

            return $this->redirect(['action' => 'index']);
        }
        $employeeDesignations = $this->Employees->EmployeeDesignations->find('list');
        $this->set(compact('employee', 'employeeDesignations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function createUser($tab = 'employee')
    {
        $employee = $this->Employees->newEntity();
        $vendor = $this->Employees->Vendors->newEntity();
        $operator = $this->Employees->Operators->newEntity();
        $departmentOfficer = $this->Employees->DepartmentOfficers->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $employeeDesignations = $this->Employees->EmployeeDesignations->find('list');
        $vendorDesignations = $this->Employees->VendorDesignations->find('list');
        $villages = $this->Employees->Villages->find('list');

        $this->set(compact('departmentOfficer', 'projects', 'states', 'districts', 'blocks', 'divisions', 'villages', 'doPosts','employee', 'employeeDesignations', 'vendorDesignations', 'vendor', 'tab','operator'));
    }
}
