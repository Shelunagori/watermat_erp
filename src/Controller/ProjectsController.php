<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $project = $this->Projects->get($id,['contain'=>['ProjectEmployees']]);
        else
            $project = $this->Projects->newEntity();

        if ($this->request->query('search')) 
        { 
            $projecte = $this->Projects->find();
            if(!empty($this->request->query('name')))
            {
                $name = $this->request->query('name');
                $projecte->where(function (QueryExpression $exp, Query $q) use($name) {
                    return $exp->like('Projects.name', '%'.$name.'%');
                });
            }
            if(!empty($this->request->query('project_number')))
            {
                $project_number = $this->request->query('project_number');
                $projecte->where(function (QueryExpression $exp, Query $q) use($project_number) {
                    return $exp->like('Projects.project_number', '%'.$project_number.'%');
                });
            }
            $projects = $this->paginate($projecte);
        }
        else
        {
           $projects = $this->paginate($this->Projects);
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }

        $employees = $this->Projects->ProjectEmployees->Employees->find('list')->where(['work_location'=>'Field']);
        $designation = ['Manager'=>'Manager','Technician'=>'Technician'];

        if(!empty($projects->toArray()))
        {
            $success = true;
            $message = "Projects Found";
        }
        else
        {
            $success = false;
            $message = "No Project Found";
        }

        $this->set(compact('name','project_number','project','projects','employees','id','success','message','designation'));
        $this->set('_serialize', ['success','message','projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['ProjectEmployees']
        ]);

        $this->set('project', $project);
    }
    public function report()
    {
        $districts = $this->Projects->Districts->find()->contain(['Projects'=>function($q){
            return $q->select(['Projects.id']);
        }]);
        $divisions = $this->Projects->Divisions->find()->contain(['Projects'=>function($q){
            return $q->select(['Projects.id']);
        }]);
        $blocks = $this->Projects->Blocks->find()->contain(['Projects'=>function($q){
            return $q->select(['Projects.id']);
        }]);
        $villages = $this->Projects->Villages->find()->contain(['Projects'=>function($q){
            return $q->select(['Projects.id']);
        }]);
        $this->set(compact('districts','divisions','blocks','villages'));
    }
    public function projectReport()
    {
        $projects = $this->Projects->find();
        $this->set('projects', $projects);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteProjectEmployees($id = null)
    {
        $id = $this->request->getData('id');

        $projectEmployee = $this->Projects->ProjectEmployees->get($id);

        if ($this->Projects->ProjectEmployees->delete($projectEmployee)) {
            echo 'The record has been deleted.'; exit;
        } else {
            echo 'The record could not be deleted. Please, try again.'; exit;
        }
    }
}
