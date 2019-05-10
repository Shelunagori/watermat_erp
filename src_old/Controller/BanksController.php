<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Banks Controller
 *
 * @property \App\Model\Table\BanksTable $Banks
 *
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BanksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $bank = $this->Banks->get($id);
        else
            $bank = $this->Banks->newEntity();

        $banks = $this->paginate($this->Banks);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $bank = $this->Banks->patchEntity($bank, $this->request->getData());
            if ($this->Banks->save($bank)) {
                $this->Flash->success(__('The bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank could not be saved. Please, try again.'));
        }

        $this->set(compact('bank','banks'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $bank = $this->Banks->get($id, [
    //         'contain' => ['BankDetails']
    //     ]);

    //     $this->set('bank', $bank);
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $bank = $this->Banks->newEntity();
    //     if ($this->request->is('post')) {
    //         $bank = $this->Banks->patchEntity($bank, $this->request->getData());
    //         if ($this->Banks->save($bank)) {
    //             $this->Flash->success(__('The bank has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The bank could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('bank'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Bank id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $bank = $this->Banks->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $bank = $this->Banks->patchEntity($bank, $this->request->getData());
    //         if ($this->Banks->save($bank)) {
    //             $this->Flash->success(__('The bank has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The bank could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('bank'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bank = $this->Banks->get($id);
        if ($this->Banks->delete($bank)) {
            $this->Flash->success(__('The bank has been deleted.'));
        } else {
            $this->Flash->error(__('The bank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
