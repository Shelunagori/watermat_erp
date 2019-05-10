<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    public function index()
    {
        $projects = $this->paginate($this->Projects);

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

        $this->set(compact('projects','success','message'));
        $this->set('_serialize', ['success','message','projects']);
    }
}
