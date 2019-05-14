<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shelters Controller
 *
 * @property \App\Model\Table\SheltersTable $Shelters
 *
 * @method \App\Model\Entity\Shelter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SheltersController extends AppController
{
    public function shelterReport($village_work_id,$work_schedule_id)
    {
        $shelter = $this->Shelters->find()->where(['village_work_id'=>$village_work_id])->first();
        $this->set('shelter', $shelter);
    }
    
}
