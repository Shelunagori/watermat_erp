<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transports Controller
 *
 * @property \App\Model\Table\TransportsTable $Transports
 *
 * @method \App\Model\Entity\Transport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Plants', 'Villages']
        ];
        $transports = $this->paginate($this->Transports);

        $this->set(compact('transports'));
    }

    /**
     * View method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transport = $this->Transports->get($id, [
            'contain' => ['Plants', 'Villages']
        ]);

        $this->set('transport', $transport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transport = $this->Transports->newEntity();
        if ($this->request->is('post')) {
            $transport = $this->Transports->patchEntity($transport, $this->request->getData());
            $transport->receipt = $this->Help->upload($_FILES['receipt']);
            if ($this->Transports->save($transport)) {
                $this->Flash->success(__('The transport has been saved.'));

                return $this->redirect('');
            }
            $this->Flash->error(__('The transport could not be saved. Please, try again.'));
        }
        $plants = $this->Transports->Plants->find('list');
        $villages = $this->Transports->Villages->find('list');
        $this->set(compact('transport', 'plants', 'villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transport = $this->Transports->get($id, [
            'contain' => []
        ]);
        $image = $transport->receipt;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $transport = $this->Transports->patchEntity($transport, $this->request->getData());
            $transport->receipt = $this->Help->upload($_FILES['receipt'],$image);
            if ($this->Transports->save($transport)) {
                $this->Flash->success(__('The transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transport could not be saved. Please, try again.'));
        }
        $plants = $this->Transports->Plants->find('list');
        $villages = $this->Transports->Villages->find('list');
        $this->set(compact('transport', 'plants', 'villages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transport = $this->Transports->get($id);
        if ($this->Transports->delete($transport)) {
            $this->Flash->success(__('The transport has been deleted.'));
        } else {
            $this->Flash->error(__('The transport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
