<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Plants Controller
 *
 * @property \App\Model\Table\PlantsTable $Plants
 *
 * @method \App\Model\Entity\Plant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlantsController extends AppController
{
    public function plantReport($village_work_id,$work_schedule_id)
    {
        $plant = $this->Plants->PlantReceives->find()->where(['village_work_id'=>$village_work_id])->first();
        $this->set('plant', $plant);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Villages', 'Vendors']
        ];
        $plants = $this->paginate($this->Plants);

        $this->set(compact('plants'));
    }

    /**
     * View method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plant = $this->Plants->get($id, [
            'contain' => ['Villages', 'Vendors', 'AccountingEntries']
        ]);

        $this->set('plant', $plant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plant = $this->Plants->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data = $this->Help->arrayReplace($data,'godown_id',$this->request->getData('godown_id'));

            $plant = $this->Plants->patchEntity($plant, $data,['associated'=>'AccountingEntries.AccountingSerials']);
            
            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
        $villages = $this->Plants->Villages->find('list');
        $vendors = $this->Plants->Vendors->find('list');
        $products = $this->Plants->AccountingEntries->Products->find();
        $godowns = $this->Plants->AccountingEntries->Godowns->find('list')->where(['Godowns.is_main'=>1]);
        $this->set(compact('plant', 'villages', 'vendors','products','godowns'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plant = $this->Plants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plant = $this->Plants->patchEntity($plant, $this->request->getData());
            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
        $villages = $this->Plants->Villages->find('list');
        $vendors = $this->Plants->Vendors->find('list');
        $this->set(compact('plant', 'villages', 'vendors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plant = $this->Plants->get($id);
        if ($this->Plants->delete($plant)) {
            $this->Flash->success(__('The plant has been deleted.'));
        } else {
            $this->Flash->error(__('The plant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
