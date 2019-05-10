<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoVillages Controller
 *
 * @property \App\Model\Table\DoVillagesTable $DoVillages
 *
 * @method \App\Model\Entity\DoVillage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoVillagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DepartmentOfficers', 'Villages']
        ];
        $doVillages = $this->paginate($this->DoVillages);

        $this->set(compact('doVillages'));
    }

    /**
     * View method
     *
     * @param string|null $id Do Village id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doVillage = $this->DoVillages->get($id, [
            'contain' => ['DepartmentOfficers', 'Villages']
        ]);

        $this->set('doVillage', $doVillage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doVillage = $this->DoVillages->newEntity();
        if ($this->request->is('post')) {
            $doVillage = $this->DoVillages->patchEntity($doVillage, $this->request->getData());
            if ($this->DoVillages->save($doVillage)) {
                $this->Flash->success(__('The do village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The do village could not be saved. Please, try again.'));
        }
        $departmentOfficers = $this->DoVillages->DepartmentOfficers->find('list');
        $villages = $this->DoVillages->Villages->find('list');
        $this->set(compact('doVillage', 'departmentOfficers', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Do Village id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doVillage = $this->DoVillages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doVillage = $this->DoVillages->patchEntity($doVillage, $this->request->getData());
            if ($this->DoVillages->save($doVillage)) {
                $this->Flash->success(__('The do village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The do village could not be saved. Please, try again.'));
        }
        $departmentOfficers = $this->DoVillages->DepartmentOfficers->find('list');
        $villages = $this->DoVillages->Villages->find('list');
        $this->set(compact('doVillage', 'departmentOfficers', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Do Village id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doVillage = $this->DoVillages->get($id);
        if ($this->DoVillages->delete($doVillage)) {
            $this->Flash->success(__('The do village has been deleted.'));
        } else {
            $this->Flash->error(__('The do village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
