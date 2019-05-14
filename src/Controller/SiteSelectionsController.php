<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SiteSelections Controller
 *
 * @property \App\Model\Table\SiteSelectionsTable $SiteSelections
 *
 * @method \App\Model\Entity\SiteSelection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SiteSelectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VillageWorks', 'GramPanchayats']
        ];
        $siteSelections = $this->paginate($this->SiteSelections);

        $this->set(compact('siteSelections'));
    }

    /**
     * View method
     *
     * @param string|null $id Site Selection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$this->viewBuilder()->setLayout('pdf_layout');
        $head_title = 'Site Selection';
        $name='SiteSelection';
        $siteSelection = $this->SiteSelections->get($id, [
            'contain' => ['VillageWorks', 'GramPanchayats']
        ]);

        $this->set(compact('name','head_title','siteSelection'));
    }

    public function siteReport($village_work_id)
    {
        $siteSelection = $this->SiteSelections->find()
                            ->where(['village_work_id'=>$village_work_id])
                            ->contain(['GramPanchayats','MlaConstituencies'])
                            ->first();
        $this->set(compact('siteSelection'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $siteSelection = $this->SiteSelections->newEntity();
        if ($this->request->is('post')) {
            $siteSelection = $this->SiteSelections->patchEntity($siteSelection, $this->request->getData());
            if ($this->SiteSelections->save($siteSelection)) {
                $this->Flash->success(__('The site selection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site selection could not be saved. Please, try again.'));
        }
        $villageWorks = $this->SiteSelections->VillageWorks->find('list');
        $gramPanchayats = $this->SiteSelections->GramPanchayats->find('list');
        $this->set(compact('siteSelection', 'villageWorks', 'gramPanchayats'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Site Selection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $siteSelection = $this->SiteSelections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $siteSelection = $this->SiteSelections->patchEntity($siteSelection, $this->request->getData());
            if ($this->SiteSelections->save($siteSelection)) {
                $this->Flash->success(__('The site selection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site selection could not be saved. Please, try again.'));
        }
        $villageWorks = $this->SiteSelections->VillageWorks->find('list');
        $gramPanchayats = $this->SiteSelections->GramPanchayats->find('list');
        $this->set(compact('siteSelection', 'villageWorks', 'gramPanchayats'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Site Selection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $siteSelection = $this->SiteSelections->get($id);
        if ($this->SiteSelections->delete($siteSelection)) {
            $this->Flash->success(__('The site selection has been deleted.'));
        } else {
            $this->Flash->error(__('The site selection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
