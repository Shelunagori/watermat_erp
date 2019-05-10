<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function dashboard()
    {
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Vendors']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->Users->get($id);
    //     if ($this->Users->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function login()
    {
        if($this->Auth->user('id'))
            return $this->redirect(['action'=>'dashboard']);
        
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $refer = ['one','two'];
                $this->session->write('refer',$refer);
                $data = $this->Users->get($user['id'],[
                            'contain'=> ['PortalUsers'=>function($q){
                                return $q->select(['ids'=>'GROUP_CONCAT(portal_id)','user_id']);
                            }]
                        ]);
                // pr($data->toArray());exit;
                $this->Auth->setUser($data);

                // if(!$this->session->read('project_id'))
                //     return $this->redirect(['controller'=>'Users','action'=>'selectProject']);
                
                if(@$_GET['redirect'])
                    return $this->redirect($this->Auth->redirectUrl());
                else
                    return $this->redirect(['controller'=>'Users','action'=>'dashboard']);
            } else {
                $this->Flash->auth(__('Username or password is incorrect'));
            }
        }
    }

    public function logout()
    {
        $this->session->destroy();
        $this->session->delete('menus');
        return $this->redirect($this->Auth->logout());
    }

    public function selectProject()
    {
        $this->viewBuilder()->setLayout('login');
        $projects = $this->Users->Projects->find('list');
        if ($this->request->is('post')) {
            $this->session->write('project_id',$this->request->getData('project_id'));
            return $this->redirect(['action'=>'dashboard']);
        }
        $this->set(compact(['projects']));
    }
}
