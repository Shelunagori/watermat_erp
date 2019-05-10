<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * PunchAttendances Controller
 *
 * @property \App\Model\Table\PunchAttendancesTable $PunchAttendances
 *
 * @method \App\Model\Entity\PunchAttendance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PunchAttendancesController extends AppController
{
    public function view()
    {
        $id = $this->request->getData('user_id');
        $punchAttendance = $this->PunchAttendances->find()
                            ->select($this->PunchAttendances)
                            ->select(['total'=>'cast(distance*price_pr_km as decimal(10,2))'])
                            ->where(['user_id'=>$id]);

        if (!$punchAttendance->isEmpty())
        {
            $success = true;
            $message = "Data Found";
        }
        else
        {
            $success = false;
            $message = "No Data Found";
        }

        $this->set(compact('success','message','punchAttendance'));
        $this->set('_serialize', ['success','message','punchAttendance']);
    }

    public function add()
    {
        $punchAttendance = $this->PunchAttendances->newEntity();
        if ($this->request->is('post')) {
            
            $punchAttendance = $this->PunchAttendances->patchEntity($punchAttendance, $this->request->getData());

            if ($this->PunchAttendances->save($punchAttendance))
            {
                $success = true;
                $message = "submitted";
            }
            else
            {
                $punchAttendance = $punchAttendance->errors();
                $success = false;
                $message = "error";
            }
        }

        $this->set(compact('success','message','punchAttendance'));
        $this->set('_serialize', ['success','message','punchAttendance']);
    }
}
