<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
/**
 * GramPanchayats Controller
 *
 * @property \App\Model\Table\GramPanchayatsTable $GramPanchayats
 *
 * @method \App\Model\Entity\GramPanchayat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GramPanchayatsController extends AppController
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
            $gramPanchayat = $this->GramPanchayats->get($id);
        else
            $gramPanchayat = $this->GramPanchayats->newEntity();

        $old_image = $gramPanchayat->image;

        $this->paginate = [
            'contain' => ['Blocks']
        ];
        if ($this->request->query('search')) 
        { 
            $gramPanchayate = $this->GramPanchayats->find();
            if(!empty($this->request->query('block_id')))
            {
                $block_id = $this->request->query('block_id');
                $gramPanchayate->where(['block_id'=>$block_id]);
                
            }
            elseif(!empty($this->request->query('name')))
            {
                $name = $this->request->query('name');
                $gramPanchayate->where(function (QueryExpression $exp, Query $q) use($name) {
                    return $exp->like('GramPanchayats.name', '%'.$name.'%');
                });
            }
            $gramPanchayats = $this->paginate($gramPanchayate);
        }
        else
        {
           $gramPanchayats = $this->paginate($this->GramPanchayats);
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $gramPanchayat = $this->GramPanchayats->patchEntity($gramPanchayat, $this->request->getData());
            $gramPanchayat->project_id = $this->project_id;
            $gramPanchayat->image = $this->Help->upload($_FILES['image'],$old_image);
            
            if ($this->GramPanchayats->save($gramPanchayat)) {
                $this->Flash->success(__('The gram panchayat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gram panchayat could not be saved. Please, try again.'));
        }
        $blocks = $this->GramPanchayats->Blocks->find('list');
        $this->set(compact('gramPanchayat', 'gramPanchayats', 'blocks'));
    }

    /**
     * View method
     *
     * @param string|null $id Gram Panchayat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gramPanchayat = $this->GramPanchayats->get($id, [
            'contain' => ['Blocks']
        ]);

        $this->set('gramPanchayat', $gramPanchayat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gramPanchayat = $this->GramPanchayats->newEntity();
        if ($this->request->is('post')) {
            $gramPanchayat = $this->GramPanchayats->patchEntity($gramPanchayat, $this->request->getData());
            if ($this->GramPanchayats->save($gramPanchayat)) {
                $this->Flash->success(__('The gram panchayat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gram panchayat could not be saved. Please, try again.'));
        }
        $blocks = $this->GramPanchayats->Blocks->find('list');
        $this->set(compact('gramPanchayat', 'blocks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gram Panchayat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gramPanchayat = $this->GramPanchayats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gramPanchayat = $this->GramPanchayats->patchEntity($gramPanchayat, $this->request->getData());
            if ($this->GramPanchayats->save($gramPanchayat)) {
                $this->Flash->success(__('The gram panchayat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gram panchayat could not be saved. Please, try again.'));
        }
        $blocks = $this->GramPanchayats->Blocks->find('list');
        $this->set(compact('gramPanchayat', 'blocks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gram Panchayat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gramPanchayat = $this->GramPanchayats->get($id);
        if ($this->GramPanchayats->delete($gramPanchayat)) {
            $this->Flash->success(__('The gram panchayat has been deleted.'));
        } else {
            $this->Flash->error(__('The gram panchayat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
