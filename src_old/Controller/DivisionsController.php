<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Divisions Controller
 *
 * @property \App\Model\Table\DivisionsTable $Divisions
 *
 * @method \App\Model\Entity\Division[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DivisionsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->project_id = $this->session->read('project_id');

        if(!$this->project_id && $this->request->getParam('_ext') != 'json')
            return $this->redirect(['controller'=>'Users','action' => 'selectProject']);
    }


    public function index($id=null)
    {
        if($id)
            $division = $this->Divisions->get($id);
        else
            $division = $this->Divisions->newEntity();

        $this->paginate = [
            'contain' => ['Districts']
        ];
        $divisions = $this->paginate($this->Divisions);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $division->image;
            $division = $this->Divisions->patchEntity($division, $this->request->getData());
            $division->project_id = $this->project_id;
            $division->image = $this->Help->upload($_FILES['image'],$image);
            
            if ($this->Divisions->save($division)) {
                $this->Flash->success(__('The division has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The division could not be saved. Please, try again.'));
        }
        $blocks = $this->Divisions->Districts->find('list');
        $this->set(compact('division', 'divisions', 'blocks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Division id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $division = $this->Divisions->get($id);
        if ($this->Divisions->delete($division)) {
            $this->Flash->success(__('The division has been deleted.'));
        } else {
            $this->Flash->error(__('The division could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getDivision()
    {
        $district_id = $this->request->getData('district_id');

        $divisions = $this->Divisions->find('list')->where(['district_id'=>$district_id]);
        $this->set(compact('divisions'));
        $this->set('_serialize', ['divisions']);
    }
}
