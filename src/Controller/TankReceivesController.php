<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TankReceives Controller
 *
 * @property \App\Model\Table\TankReceivesTable $TankReceives
 *
 * @method \App\Model\Entity\TankReceife[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TankReceivesController extends AppController
{
    public function tankReport($village_work_id,$work_schedule_id)
    {
        $tank = $this->TankReceives->find()->where(['village_work_id'=>$village_work_id])->first();
        $this->set('tank', $tank);
    }

}
