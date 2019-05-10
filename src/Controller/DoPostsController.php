<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoPosts Controller
 *
 * @property \App\Model\Table\DoPostsTable $DoPosts
 *
 * @method \App\Model\Entity\DoPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoPostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $doPost = $this->DoPosts->get($id);
        else
            $doPost = $this->DoPosts->newEntity();

        $doPosts = $this->paginate($this->DoPosts);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $doPost = $this->DoPosts->patchEntity($doPost, $this->request->getData());
            if ($this->DoPosts->save($doPost)) {
                $this->Flash->success(__('The do post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The do post could not be saved. Please, try again.'));
        }
        $this->set(compact('doPost','doPosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Do Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doPost = $this->DoPosts->get($id, [
            'contain' => ['DepartmentOfficers']
        ]);

        $this->set('doPost', $doPost);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doPost = $this->DoPosts->newEntity();
        if ($this->request->is('post')) {
            $doPost = $this->DoPosts->patchEntity($doPost, $this->request->getData());
            if ($this->DoPosts->save($doPost)) {
                $this->Flash->success(__('The do post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The do post could not be saved. Please, try again.'));
        }
        $this->set(compact('doPost'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Do Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doPost = $this->DoPosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doPost = $this->DoPosts->patchEntity($doPost, $this->request->getData());
            if ($this->DoPosts->save($doPost)) {
                $this->Flash->success(__('The do post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The do post could not be saved. Please, try again.'));
        }
        $this->set(compact('doPost'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Do Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doPost = $this->DoPosts->get($id);
        if ($this->DoPosts->delete($doPost)) {
            $this->Flash->success(__('The do post has been deleted.'));
        } else {
            $this->Flash->error(__('The do post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
