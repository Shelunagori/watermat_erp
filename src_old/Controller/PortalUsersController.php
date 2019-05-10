<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PortalUsers Controller
 *
 * @property \App\Model\Table\PortalUsersTable $PortalUsers
 *
 * @method \App\Model\Entity\PortalUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PortalUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Portals', 'Users'=>'Employees']
        ];
        $portalUsers = $this->paginate($this->PortalUsers);

        $this->set(compact('portalUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Portal User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $portalUser = $this->PortalUsers->get($id, [
            'contain' => ['Portals', 'Users']
        ]);

        $this->set('portalUser', $portalUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $portalUser = $this->PortalUsers->newEntity();
        if ($this->request->is('post')) {
            $portalUser = $this->PortalUsers->patchEntity($portalUser, $this->request->getData());
            if ($this->PortalUsers->save($portalUser)) {
                $this->Flash->success(__('The portal user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The portal user could not be saved. Please, try again.'));
        }
        $portals = $this->PortalUsers->Portals->find('list');
        $users = $this->PortalUsers->Users->find('list',['keyField'=>'id','valueField'=>'name'])
                    ->select(['id'=>'Users.id','name'=>'Employees.name'])
                    ->where(['employee_id IS Not Null'])
                    ->contain(['Employees']);
        $this->set(compact('portalUser', 'portals', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Portal User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $portalUser = $this->PortalUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $portalUser = $this->PortalUsers->patchEntity($portalUser, $this->request->getData());
            if ($this->PortalUsers->save($portalUser)) {
                $this->Flash->success(__('The portal user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The portal user could not be saved. Please, try again.'));
        }
        $portals = $this->PortalUsers->Portals->find('list');
        $users = $this->PortalUsers->Users->find('list');
        $this->set(compact('portalUser', 'portals', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Portal User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $portalUser = $this->PortalUsers->get($id);
        if ($this->PortalUsers->delete($portalUser)) {
            $this->Flash->success(__('The portal user has been deleted.'));
        } else {
            $this->Flash->error(__('The portal user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
