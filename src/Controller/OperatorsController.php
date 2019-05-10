<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operators Controller
 *
 * @property \App\Model\Table\OperatorsTable $Operators
 *
 * @method \App\Model\Entity\Operator[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperatorsController extends AppController
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
        $operators = $this->paginate($this->Operators);

        $this->set(compact('operators'));
    }

    /**
     * View method
     *
     * @param string|null $id Operator id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operator = $this->Operators->get($id, [
            'contain' => ['Villages']
        ]);

        $this->set('operator', $operator);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operator = $this->Operators->newEntity();
        if ($this->request->is('post')) {
            $operator = $this->Operators->patchEntity($operator, $this->request->getData());

            foreach ($_FILES as $key => $file) {
                $operator->$key = $this->Help->upload($file);
                if(!$operator->$key && $file['error'] != 4)
                    $this->Flash->error($key." (".$file['name']." ) can not be uploaded");
            }
            
            if ($this->Operators->save($operator))
                $this->Flash->success(__('The operator has been saved.'));
            else
                $this->Flash->error(__('The operator could not be saved. Please, try again.'));

            return $this->redirect(['controller'=>'Employees','action' => 'createUser','operator']);
        }
        $villages = $this->Operators->Villages->find('list');
        $this->set(compact('operator', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operator id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operator = $this->Operators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operator_patch = $this->Operators->patchEntity($operator, $this->request->getData());

            foreach ($_FILES as $key => $file) {
                $operator_patch->$key = $this->Help->upload($file,$operator->$key);
                if(!$operator_patch->$key && $file['error'] != 4)
                    $this->Flash->error($key." (".$file['name']." ) can not be uploaded");
            }
            
            if ($this->Operators->save($operator_patch)) {
                $this->Flash->success(__('The operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operator could not be saved. Please, try again.'));
        }
        $villages = $this->Operators->Villages->find('list');
        $this->set(compact('operator', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operator id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operator = $this->Operators->get($id);
        if ($this->Operators->delete($operator)) {
            $this->Flash->success(__('The operator has been deleted.'));
        } else {
            $this->Flash->error(__('The operator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
