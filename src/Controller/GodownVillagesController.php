<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GodownVillages Controller
 *
 * @property \App\Model\Table\GodownVillagesTable $GodownVillages
 *
 * @method \App\Model\Entity\GodownVillage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GodownVillagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Godowns', 'Villages']
        ];
        $godownVillages = $this->paginate($this->GodownVillages);

        $this->set(compact('godownVillages'));
    }

    /**
     * View method
     *
     * @param string|null $id Godown Village id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $godownVillage = $this->GodownVillages->get($id, [
            'contain' => ['Godowns', 'Villages']
        ]);

        $this->set('godownVillage', $godownVillage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $godownVillage = $this->GodownVillages->newEntity();

        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            foreach ($data as $key => $value)
                if($value && $key != 'godown_id')
                {
                    if($key == 'village_id')
                        $key = 'Villages.id';
                    $where[$key] = $value;
                }

            $villages = $this->GodownVillages->States->Find()->select(['id'=>'Villages.id'])
                        ->innerJoinWith('Districts',function($q){
                                return $q->innerJoinWith('Blocks',function($q){
                                    return $q->innerJoinWith('Divisions',function($q){
                                        return $q->innerJoinWith('Villages');
                                    });
                                });
                            })
                        ->where($where);
            foreach ($villages as $key => $village) 
            {
                if($this->GodownVillages->exists(['village_id'=>$village->id]))
                {
                    $godown_village = $this->GodownVillages->find()->where(['village_id'=>$village->id])->first();
                    $godown_village->godown_id = $data['godown_id'];
                }
                else
                {
                    $godown_village = $this->GodownVillages->newEntity();
                    $godown_village->village_id = $village->id;
                    $godown_village->godown_id = $data['godown_id'];
                }
                $this->GodownVillages->save($godown_village);
            }
            $this->Flash->success('Saved');
            $this->redirect('');
        }
        
        $godowns = $this->GodownVillages->Godowns->find('list');
        $states = $this->GodownVillages->States->find('list');
        $this->set(compact('godownVillage', 'godowns', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Godown Village id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $godownVillage = $this->GodownVillages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $godownVillage = $this->GodownVillages->patchEntity($godownVillage, $this->request->getData());
            if ($this->GodownVillages->save($godownVillage)) {
                $this->Flash->success(__('The godown village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The godown village could not be saved. Please, try again.'));
        }
        $godowns = $this->GodownVillages->Godowns->find('list');
        $villages = $this->GodownVillages->Villages->find('list');
        $this->set(compact('godownVillage', 'godowns', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Godown Village id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $godownVillage = $this->GodownVillages->get($id);
        if ($this->GodownVillages->delete($godownVillage)) {
            $this->Flash->success(__('The godown village has been deleted.'));
        } else {
            $this->Flash->error(__('The godown village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
