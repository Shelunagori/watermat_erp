<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Billings Controller
 *
 * @property \App\Model\Table\BillingsTable $Billings
 *
 * @method \App\Model\Entity\Billing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillingsController extends AppController
{
    public function billingReport($village_work_id,$work_schedule_id,$village_id)
    {
        $billings = $this->Billings->find()
                        ->contain(['BillingQuestions'])
                        ->where(['village_work_id'=>$village_work_id]);
       
        $this->set('billings', $billings);
    }
}
