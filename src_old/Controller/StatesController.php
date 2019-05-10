<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * States Controller
 *
 * @property \App\Model\Table\StatesTable $States
 *
 * @method \App\Model\Entity\State[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatesController extends AppController
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
            $state = $this->States->get($id);
        else
            $state = $this->States->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $state->image;
            $state = $this->States->patchEntity($state, $this->request->getData());
            $state->project_id = $this->project_id;
            $state->image = $this->Help->upload($_FILES['image'],$image);
            
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
        }

        $states = $this->paginate($this->States->find()->select(['id','name']));

        $this->set(compact('state','states'));
    }

    /**
     * View method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $state = $this->States->get($id, [
    //         'contain' => ['Districts']
    //     ]);

    //     $this->set('state', $state);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $state = $this->States->newEntity();
    //     if ($this->request->is('post')) {
    //         $state = $this->States->patchEntity($state, $this->request->getData());
    //         if ($this->States->save($state)) {
    //             $this->Flash->success(__('The state has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The state could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('state'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $state = $this->States->get($id);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $state = $this->States->patchEntity($state, $this->request->getData());
    //         if ($this->States->save($state)) {
    //             $this->Flash->success(__('The state has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The state could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('state'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $state = $this->States->get($id);
        if ($this->States->delete($state)) {
            $this->Flash->success(__('The state has been deleted.'));
        } else {
            $this->Flash->error(__('The state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
