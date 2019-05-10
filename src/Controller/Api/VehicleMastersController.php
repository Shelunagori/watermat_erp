<?php
namespace App\Controller\Api;

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
    public function index($id = null)
    {
        $vehicleMasters = $this->VehicleMasters->find();

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

        $this->set(compact('success','message','vehicleMasters'));
        $this->set('_serialize', ['success','message','vehicleMasters']);
    }
}
