<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Blocks Controller
 *
 * @property \App\Model\Table\BlocksTable $Blocks
 *
 * @method \App\Model\Entity\Block[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlocksController extends AppController
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
            $block = $this->Blocks->get($id);
        else
            $block = $this->Blocks->newEntity();

        $this->paginate = [
            'contain' => ['Divisions']
        ];

        $blocks = $this->paginate($this->Blocks);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $block->image;
            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            $block->project_id = $this->project_id;
            $block->image = $this->Help->upload($_FILES['image'],$image);
            
            if ($this->Blocks->save($block)) {
                $this->Flash->success(__('The block has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
        }
        $districts = $this->Blocks->Divisions->find('list');
        $this->set(compact('block', 'blocks', 'districts'));
    }


    // public function view($id = null)
    // {
    //     $block = $this->Blocks->get($id, [
    //         'contain' => ['Divisions', 'Divisions']
    //     ]);

    //     $this->set('block', $block);
    // }

    // public function add()
    // {
    //     $block = $this->Blocks->newEntity();
    //     if ($this->request->is('post')) {
    //         $block = $this->Blocks->patchEntity($block, $this->request->getData());
    //         if ($this->Blocks->save($block)) {
    //             $this->Flash->success(__('The block has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The block could not be saved. Please, try again.'));
    //     }
    //     $districts = $this->Blocks->Divisions->find('list');
    //     $this->set(compact('block', 'districts'));
    // }

    // public function edit($id = null)
    // {
    //     $block = $this->Blocks->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $block = $this->Blocks->patchEntity($block, $this->request->getData());
    //         if ($this->Blocks->save($block)) {
    //             $this->Flash->success(__('The block has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The block could not be saved. Please, try again.'));
    //     }
    //     $districts = $this->Blocks->Divisions->find('list');
    //     $this->set(compact('block', 'districts'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $block = $this->Blocks->get($id);
        if ($this->Blocks->delete($block)) {
            $this->Flash->success(__('The block has been deleted.'));
        } else {
            $this->Flash->error(__('The block could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getBlock()
    {
        $division_id = $this->request->getData('division_id');

        $blocks = $this->Blocks->find('list')->where(['division_id'=>$division_id]);
        $this->set(compact('blocks'));
        $this->set('_serialize', ['blocks']);
    }
}
