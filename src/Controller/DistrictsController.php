<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Districts Controller
 *
 * @property \App\Model\Table\DistrictsTable $Districts
 *
 * @method \App\Model\Entity\District[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DistrictsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->project_id = $this->session->read('project_id');

        if(!$this->project_id && !$this->request->getParam('_ext') == 'json')
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
            $district = $this->Districts->get($id, ['contain' => ['States']]);
        else
            $district = $this->Districts->newEntity();

        $old_image = $district->image;

        $this->paginate = [
            'contain' => ['States']
        ];

        $districts = $this->paginate($this->Districts->find()->select(['id','name','state'=>'States.name']));

        if ($this->request->is(['patch', 'post', 'put'])) {
            $district = $this->Districts->patchEntity($district, $this->request->getData());
            $district->project_id = $this->project_id;
            $district->image = $this->Help->upload($_FILES['image'],$old_image);
            
            if ($this->Districts->save($district)) {
                $this->Flash->success(__('The district has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The district could not be saved. Please, try again.'));
        }
        $states = $this->Districts->States->find('list');
        $this->set(compact('district','districts', 'states'));
    }
    public function districtReport($project_id)
    {
        //$project_id = $this->request->queryData('project_id');
        $districts = $this->Districts->find()->where(['project_id'=>$project_id]);
        $this->set(compact('districts'));
    }
    /**
     * View method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $district = $this->Districts->get($id, [
    //         'contain' => ['States', 'Blocks']
    //     ]);

    //     $this->set('district', $district);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $district = $this->Districts->newEntity();
    //     if ($this->request->is('post')) {
    //         $district = $this->Districts->patchEntity($district, $this->request->getData());
    //         if ($this->Districts->save($district)) {
    //             $this->Flash->success(__('The district has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The district could not be saved. Please, try again.'));
    //     }
    //     $states = $this->Districts->States->find('list', ['limit' => 200]);
    //     $this->set(compact('district', 'states'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $district = $this->Districts->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $district = $this->Districts->patchEntity($district, $this->request->getData());
    //         if ($this->Districts->save($district)) {
    //             $this->Flash->success(__('The district has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The district could not be saved. Please, try again.'));
    //     }
    //     $states = $this->Districts->States->find('list', ['limit' => 200]);
    //     $this->set(compact('district', 'states'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $district = $this->Districts->get($id);
        if ($this->Districts->delete($district)) {
            $this->Flash->success(__('The district has been deleted.'));
        } else {
            $this->Flash->error(__('The district could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getDistrict()
    {
        $state_id = $this->request->getData('state_id');

        $districts = $this->Districts->find('list')->where(['state_id'=>$state_id]);
        $this->set(compact('districts'));
        $this->set('_serialize', ['districts']);
    }
}
