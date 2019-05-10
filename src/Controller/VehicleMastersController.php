<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VehicleMasters Controller
 *
 * @property \App\Model\Table\VehicleMastersTable $VehicleMasters
 *
 * @method \App\Model\Entity\VehicleMaster[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VehicleMastersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if($id)
            $vehicleMaster = $this->VehicleMasters->get($id);
        else
            $vehicleMaster = $this->VehicleMasters->newEntity();

        $vehicleMasters = $this->paginate($this->VehicleMasters);

        if (!$vehicleMasters->isEmpty())
        {
            $success = true;
            $message = "Data Found";
        }
        else
        {
            $success = false;
            $message = "No Data Found";
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicleMaster = $this->VehicleMasters->patchEntity($vehicleMaster, $this->request->getData());
            if ($this->VehicleMasters->save($vehicleMaster)) {
                $this->Flash->success(__('The vehicle master has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicle master could not be saved. Please, try again.'));
        }

        $this->set(compact('success','message','vehicleMaster','vehicleMasters'));

        $this->set('_serialize', ['success','message','vehicleMasters']);

    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicle Master id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicleMaster = $this->VehicleMasters->get($id);
        if ($this->VehicleMasters->delete($vehicleMaster)) {
            $this->Flash->success(__('The vehicle master has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicle master could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
