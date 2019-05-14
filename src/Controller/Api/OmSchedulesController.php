<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * OmSchedules Controller
 *
 * @property \App\Model\Table\OmSchedulesTable $OmSchedules
 *
 * @method \App\Model\Entity\OmSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OmSchedulesController extends AppController
{
    public function villageVisit()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();

            if($this->OmSchedules->OmScheduleForms->exists(['om_schedule_id'=>$data['om_schedule_id']]))
                $om_form = $this->OmSchedules->OmScheduleForms->find()->where(['om_schedule_id'=>$data['om_schedule_id']])->first();
            else
                $om_form = $this->OmSchedules->OmScheduleForms->newEntity();

            //$data = array_filter($data, function($value) { return $value !== ''; });

            $omScheduleForms = $this->OmSchedules->OmScheduleForms->patchEntity($om_form, $data);
            $new = $om_form->isNew();
            if($new)
                $omScheduleForms->created_by = $data['login_id'];
            else
                $omScheduleForms->edited_by = $data['login_id'];

            foreach ($_FILES as $key => $value) {
                if($value['error'] == 0)
                {
                    $response = json_decode($this->Help->uploadOnly($value));
                    if($response->success)
                        $omScheduleForms->$key = $response->address;
                    else
                    {
                        $omScheduleForms->$key = '';
                        $error[] = $response->message;
                    }
                }
            }

            if($this->OmSchedules->OmScheduleForms->save($omScheduleForms)) {
                $success = true;
                $message = 'The village visit has been saved.';

                    if(array_key_exists('request', $data))
                        if(!empty($data['request']))
                        {
                            // Save Requested Material
                            $om_schedule = $this->OmSchedules->get($data['om_schedule_id'],['contain'=>['OmEmployees']]);
                            $village_request['om_schedule_id'] = $om_schedule->id;
                            $village_request['village_id'] = $om_schedule->om_employee->village_id;
                            $village_request['manager_id'] = $om_schedule->om_employee->manager_id;
                            $village_request['technician_id'] = $om_schedule->om_employee->technician_id;
                            $village_request['village_request_products'] = $data['request'];

                            $this->OmSchedules->VillageRequests->save($this->OmSchedules->VillageRequests->newEntity($village_request));
                        }

                    $omSchedule = $this->OmSchedules->get($data['om_schedule_id']);
                    $village = $this->OmSchedules->Villages->get($omSchedule->village_id);
                    $omSchedule->is_complete = 1;

                    if($new)
                    {
                        $omSchedule->visited_on = date('Y-m-d');
                        //send notification to managers
                        $managers = $this->OmSchedules->Villages->OmEmployees->find()->select(['device_id'=>'Users.id'])
                            ->where(['village_id'=>$village->id])
                            ->innerJoinWith('Managers',function($q){
                                return $q->innerJoinWith('Users');
                            });

                        $device_ids = [];

                        foreach ($managers as $key => $emp)
                            $device_ids[] = $emp->device_id;

                        $msg = $village->name." is visited today. Please verify it.";

                        $this->Help->sendNotification($device_ids,$msg,$village->id,0,0,'village_visit');
                    }

                    if(array_key_exists('remark',$data))
                    {
                        $omSchedule->is_verify = 1;
                        //send notification to technician
                        $technicians = $this->OmSchedules->Villages->OmEmployees->find()->select(['device_id'=>'Users.id'])
                            ->where(['village_id'=>$village->id])
                            ->innerJoinWith('Technicians',function($q){
                                return $q->innerJoinWith('Users');
                            });

                        unset($device_ids);

                        foreach ($technicians as $key => $emp)
                            $device_ids[] = $emp->device_id;

                        $msg = $village->name."'s visit has been verified.";

                        $this->Help->sendNotification($device_ids,$msg,$village->id,0,0,'village_visit');
                    }

                    if(array_key_exists('comment',$data))
                    {
                        //send notification to technician
                        $technicians = $this->OmSchedules->Villages->OmEmployees->find()->select(['device_id'=>'Users.id'])
                            ->where(['village_id'=>$village->id])
                            ->innerJoinWith('Technicians',function($q){
                                return $q->innerJoinWith('Users');
                            });

                        unset($device_ids);

                        foreach ($technicians as $key => $emp)
                            $device_ids[] = $emp->device_id;

                        $msg = "Manager commented on ".$village->name."'s visit.";

                        $this->Help->sendNotification($device_ids,$msg,$village->id,0,0,'village_visit');
                    }

                    $this->OmSchedules->save($omSchedule);

                    //new entry of next village visit
                    if($new)
                    {
                        $days = $this->OmSchedules->Villages->OmScheduleMasters->find()->where(['village_id'=>$omSchedule->village_id])->first()->days;

                        $newOmSchedule = $this->OmSchedules->newEntity();
                        $newOmSchedule->village_id = $omSchedule->village_id;
                        $newOmSchedule->visit_date = date('Y-m-d', strtotime("+".$days." day"));
                        $newOmSchedule->created_by = 0;
                        $this->OmSchedules->save($newOmSchedule);
                    }
            }
            else
            {
                $omScheduleForms = $omScheduleForms->getErrors();
                $success = false;
                $message = 'The village visit could not be saved. Please, try again.';
            }
        }

        $this->set(compact(['success','message','omScheduleForms']));
        $this->set('_serialize', ['success','message','omScheduleForms']);
    }

    public function omVillages()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });
            $success = false;

            $om_villages = $this->OmSchedules->find()
            ->select($this->OmSchedules)
            ->select(['village'=>'Villages.name'])
            ->innerJoinWith('OmEmployees')
            ->contain(['Villages']);

            if(array_key_exists('village_id', $data))
                $om_villages->where(['Villages.id'=>$data['village_id']]);

            if(array_key_exists('manager_id', $data))
            {
                $om_villages->select(['arrenge'=>"if(OmSchedules.is_verify,2,if(OmSchedules.is_complete,1,3))"]);
                $om_villages->where(['manager_id'=>$data['manager_id']]);
            }
            else
            {
                $om_villages->select(['arrenge'=>"if(OmSchedules.is_verify,3,if(OmSchedules.is_complete,2,1))"]);
                $om_villages->where(['technician_id'=>$data['technician_id']]);
            }

            if(array_key_exists('page', $data))
            {
                $om_villages->limit(20);
                $om_villages->offset(($data['page']-1)*20);
            }

            $om_villages->order('arrenge');

            if(!empty($om_villages->toArray()))
            {
                $message = "Data Found";
                $success = true;
            }
            else
                $message = "Data Not Found";
        }
        $this->set(compact(['success','message','om_villages']));
        $this->set('_serialize', ['success','message','om_villages']);
    }


    public function getVillageVisit()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $success = false;
            $data = $this->request->getData();

            $omSchedule = $this->OmSchedules->get($data['om_schedule_id']);
            

            $village = $this->OmSchedules->Villages->find()
                    ->select(['village'=>'Villages.name','block'=>'Blocks.name'])
                    ->contain(['Blocks'])
                    ->where(['Villages.id'=>$omSchedule->village_id]);
                    
            $total_card = $this->OmSchedules->find()
                        ->select(['total'=>"SUM(OmScheduleForms.card_issued)"])
                        ->where(['village_id'=>$omSchedule->village_id,'OmSchedules.id <'=>$omSchedule->id])
                        ->innerJoinWith('OmScheduleForms')->first()->total;
            
            $old_form = $this->OmSchedules->find()
                    ->where(['village_id'=>$omSchedule->village_id,'OmSchedules.id <'=>$omSchedule->id])
                    ->order(['OmSchedules.id'=>'DESC'])->contain(['OmScheduleForms'])->first()->om_schedule_form;
                            
            if($this->OmSchedules->OmScheduleForms->exists(['om_schedule_id'=>$data['om_schedule_id']]))
            {
                $om_form = $this->OmSchedules->OmScheduleForms->find()->where(['om_schedule_id'=>$data['om_schedule_id']])->first();
                $message = "Data Found";
                $success = true;
            }
            else
                $message = "Data Not Found";

            $this->set(compact(['success','message','om_form','village','old_form','total_card']));
            $this->set('_serialize', ['success','message','om_form','village','old_form','total_card']);
        }
    }

    public function villageRequest()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $success = false;
            $village_request = $this->OmSchedules->VillageRequests->find()
            ->select(['village'=>'Villages.name'])
            ->select($this->OmSchedules->VillageRequests)
            ->contain(['OmSchedules'=>['Villages'=>['OmEmployees']],
                        'VillageRequestProducts'=>function($q)
                        { 
                            return $q->select(['product'=>'Products.name'])
                                    ->select($this->OmSchedules->VillageRequests->VillageRequestProducts)
                                    ->contain(['Products']);
                            
                        }
                    ])
            ->where(['OmEmployees.manager_id'=>$this->request->getData('manager_id'),'status'=>'unapproved']);

            if(!empty($village_request->toArray()))
            {
                $message = "Data Found";
                $success = true;
            }
            else
                $message = "Data Not Found";
        }
        $this->set(compact(['success','message','village_request']));
        $this->set('_serialize', ['success','message','village_request']);
    }

    public function approveVillageRequest()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $village_request = $this->OmSchedules->VillageRequests->get($this->request->getData('id'),['contain'=>['VillageRequestProducts']]);

            $success = false;
            $village_request = $this->OmSchedules->VillageRequests->patchEntity($village_request,$this->request->getData());

            
            if($this->OmSchedules->VillageRequests->save($village_request))
            {
                $message = "Data Found";
                $success = true;
            }
            else
                $message = "Data Not Found";
        }
        $this->set(compact(['success','message','village_request']));
        $this->set('_serialize', ['success','message','village_request']);
    }
    
 	public function omVillageListPending()
	{
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });
            $success = false;

            $om_villages = $this->OmSchedules->find()
            ->select($this->OmSchedules)
            ->select(['village'=>'Villages.name'])
			->where(['is_verify' =>0,'is_complete'=>0])
            ->innerJoinWith('OmEmployees')
            ->contain(['Villages'])->order(['visit_date' =>'DESC']);
 
            if(array_key_exists('village_id', $data))
                $om_villages->where(['Villages.id'=>$data['village_id']]);

            if(array_key_exists('manager_id', $data))
            {
               $om_villages->where(['manager_id'=>$data['manager_id']]);
            }
            else
            {
               $om_villages->where(['technician_id'=>$data['technician_id']]);
            }

            if(array_key_exists('page', $data))
            {
                $om_villages->limit(20);
                $om_villages->offset(($data['page']-1)*20);
            }

            if(!empty($om_villages->toArray()))
            {
                $message = "Data Found";
                $success = true;
            }
            else
                $message = "Data Not Found";
        }
        $this->set(compact(['success','message','om_villages']));
        $this->set('_serialize', ['success','message','om_villages']);		
	}    
    
}
