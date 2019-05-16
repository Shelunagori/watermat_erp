<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
/**
 * DepartmentOfficers Controller
 *
 * @property \App\Model\Table\DepartmentOfficersTable $DepartmentOfficers
 *
 * @method \App\Model\Entity\DepartmentOfficer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentOfficersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->project_id = $this->session->read('project_id');

        if(!$this->project_id)
            return $this->redirect(['controller'=>'Users','action' => 'selectProject']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $departmentOfficer = $this->DepartmentOfficers->get($id);
        else
            $departmentOfficer = $this->DepartmentOfficers->newEntity();
        
        $this->paginate = [
            'contain' => ['Projects', 'DoPosts']
        ];
        if ($this->request->query('search')) 
        { 
            $departmentOfficere = $this->DepartmentOfficers->find();
            if(!empty($this->request->query('do_post_id')))
            {
                $do_post_id = $this->request->query('do_post_id');
                $departmentOfficere->where(['do_post_id'=>$do_post_id]);
                
            }
            if(!empty($this->request->query('name')))
            {
                $name = $this->request->query('name');
                $departmentOfficere->where(function (QueryExpression $exp, Query $q) use($name) {
                    return $exp->like('DepartmentOfficers.name', '%'.$name.'%');
                });
            }
            if(!empty($this->request->query('contact_no')))
            {
                $contact_no = $this->request->query('contact_no');
                $departmentOfficere->where(function (QueryExpression $exp, Query $q) use($contact_no) {
                    return $exp->like('DepartmentOfficers.contact_no', '%'.$contact_no.'%');
                });
            }
            $departmentOfficers = $this->paginate($departmentOfficere);
        }
        else
        {
           $departmentOfficers = $this->paginate($this->DepartmentOfficers);
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $departmentOfficer->image;
            $departmentOfficer = $this->DepartmentOfficers->patchEntity($departmentOfficer, $this->request->getData());
            $departmentOfficer->project_id = $this->project_id;
            $departmentOfficer->image = $this->Help->upload($_FILES['image'],$image);
            
            $new = $departmentOfficer->isNew();
            if ($this->DepartmentOfficers->save($departmentOfficer)) {
                if($new)
                {
                    $user = $this->DepartmentOfficers->Users->newEntity();
                    $user->username = $departmentOfficer->contact_no;
                    $user->department_officer_id = $departmentOfficer->id;
                    $user->password = 'hello';
                    $this->DepartmentOfficers->Users->save($user);
                }
                $this->Flash->success(__('The department officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department officer could not be saved. Please, try again.'));
        }

        $projects = $this->DepartmentOfficers->Projects->find('list');
        $doPosts = $this->DepartmentOfficers->DoPosts->find('list');
        $this->set(compact('departmentOfficer', 'departmentOfficers', 'projects', 'doPosts','do_post_id','name','contact_no'));
    }

    /**
     * View method
     *
     * @param string|null $id Department Officer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentOfficer = $this->DepartmentOfficers->get($id, [
            'contain' => ['Projects', 'DoPosts', 'DoVillages', 'Users']
        ]);

        $this->set('departmentOfficer', $departmentOfficer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departmentOfficer = $this->DepartmentOfficers->newEntity();
        if ($this->request->is('post')) {
            $departmentOfficer = $this->DepartmentOfficers->patchEntity($departmentOfficer, $this->request->getData());
            if ($this->DepartmentOfficers->save($departmentOfficer)) {
                $this->Flash->success(__('The department officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department officer could not be saved. Please, try again.'));
        }
        $projects = $this->DepartmentOfficers->Projects->find('list');
        $doPosts = $this->DepartmentOfficers->DoPosts->find('list');
        $this->set(compact('departmentOfficer', 'projects', 'doPosts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Department Officer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmentOfficer = $this->DepartmentOfficers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentOfficer = $this->DepartmentOfficers->patchEntity($departmentOfficer, $this->request->getData());
            if ($this->DepartmentOfficers->save($departmentOfficer)) {
                $this->Flash->success(__('The department officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department officer could not be saved. Please, try again.'));
        }
        $projects = $this->DepartmentOfficers->Projects->find('list');
        $doPosts = $this->DepartmentOfficers->DoPosts->find('list');
        $this->set(compact('departmentOfficer', 'projects', 'doPosts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Department Officer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentOfficer = $this->DepartmentOfficers->get($id);
        if ($this->DepartmentOfficers->delete($departmentOfficer)) {
            $this->Flash->success(__('The department officer has been deleted.'));
        } else {
            $this->Flash->error(__('The department officer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getDos()
    {
        $dos = $this->DepartmentOfficers->find('list')->where(['do_post_id'=>$this->request->getData('do_post')]);
        $this->set(compact('dos'));
        $this->set('_serialize', ['dos']);
    }
}
