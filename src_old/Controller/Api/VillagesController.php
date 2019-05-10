<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Villages Controller
 *
 * @property \App\Model\Table\VillagesTable $Villages
 *
 * @method \App\Model\Entity\Village[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillagesController extends AppController
{
    public function getVillages()
    {
        if(1)
        {
            $data = $this->request->getData();

            if($data['user_type'] == 'Employee')
            {
                $villages = $this->Villages->EmployeeVillages->find('all')
                ->select(['id'=>'EmployeeVillages.village_id','name'=>'Villages.name'])
                ->where(['employee_id'=>$data['id'],'Villages.project_id'=>$data['project_id']])
                ->contain(['Villages'])->distinct(['EmployeeVillages.village_id']);
            }
            
            if($data['user_type'] == 'Vendor')
            {
                $villages = $this->Villages->VendorVillages->find('all')
                ->select(['id'=>'VendorVillages.village_id','name'=>'Villages.name'])
                ->where(['vendor_id'=>$data['id'],'Villages.project_id'=>$data['project_id']])
                ->contain(['Villages'])->distinct(['VendorVillages.village_id']);
            }

            if($data['user_type'] == 'DO')
            {
                $villages = $this->Villages->DoVillages->find('all')
                ->select(['id'=>'DoVillages.village_id','name'=>'Villages.name'])
                ->where(['department_officer_id'=>$data['id'],'Villages.project_id'=>$data['project_id']])
                ->contain(['Villages'])->distinct(['DoVillages.village_id']);
            }
        }

        if(!$villages->isEmpty())
        {
            $success = true;
            $message = "Villages Found";
        }
        else
        {
            $success = false;
            $message = "No Village Found";
        }

        $this->set(compact(['success','message','villages']));
        $this->set('_serialize', ['success','message','villages']);
    }

    public function allVillages()
    {
        $villages = $this->Villages->find()->select(['id','name']);
        $project_id = $this->request->getData('project_id');

        if($project_id)
            $villages->where(['project_id'=>$project_id]);

        if(!$villages->isEmpty())
        {
            $success = true;
            $message = "Villages Found";
        }
        else
        {
            $success = false;
            $message = "No Village Found";
        }

        $this->set(compact(['success','message','villages']));
        $this->set('_serialize', ['success','message','villages']);
    }

    public function villageWork()
    {
        $village_id = $this->request->getData('village_id');

        if($village_id)
        {
            $village = $this->Villages->find()
            ->select(['Villages.id','Villages.name','project'=>'Projects.name'])
            ->where(['Villages.id'=>$village_id])
            ->contain(['Projects','VillageWorks'=>function($q){
                return $q->select(['id','village_id','step'=>'WorkSchedules.name','schedule_date','complete_date','is_complete','is_verified'])
                        ->contain(['WorkSchedules']);
            }])
            ->first();

            if($village)
            {
                $success = true;
                $message = "Data Found";
            }
            else
            {
                $success = false;
                $message = "No Data Found";
            }
        }

        $this->set(compact(['success','message','village']));
        $this->set('_serialize', ['success','message','village']);
    }

    public function checkWork()
    {
        $village_work_id = $this->request->getData('village_work_id');

        if($village_work_id)
        {
            $data = $this->Villages->VillageWorks->find()
            ->select(['VillageWorks.id','model'=>'WorkSchedules.model'])
            ->where(['VillageWorks.id'=>$village_work_id])
            ->contain(['WorkSchedules'])
            ->first();
            $model = $data->model;

            $village_work = $this->Villages->VillageWorks->$model->find()->where(['village_work_id'=>$data->id])->first();

            if($village_work)
            {
                $success = true;
                $message = "Work Found";
            }
            else
            {
                $success = false;
                $message = "No Work Found";
            }
        }

        $this->set(compact(['success','message','village_work']));
        $this->set('_serialize', ['success','message','village_work']);
    }

    public function getPanchayats()
    {
        $village_id = $this->request->getData('village_id');

        if($village_id)
        {
            $village = $this->Villages->get($village_id);

            $panchayats = $this->Villages->Blocks->GramPanchayats->find()
            ->select(['id','name'])
            ->where(['block_id'=>$village->block_id,'project_id'=>$village->project_id]);

            $mla = $this->Villages->Blocks->MlaConstituencies->find()
            ->select(['id','name'])
            ->where(['block_id'=>$village->block_id,'project_id'=>$village->project_id]);

            if($panchayats)
            {
                $success = true;
                $message = "Work Found";
            }
            else
            {
                $success = false;
                $message = "No Work Found";
            }
        }

        $this->set(compact(['success','message','panchayats','mla']));
        $this->set('_serialize', ['success','message','panchayats','mla']);
    }

    public function getSteps()
    {
        $village_work_id = $this->request->getData('village_work_id');

        if($village_work_id)
        {
            $village_work = $this->Villages->VillageWorks->get($village_work_id);

            $work_schedule_rows = $this->Villages->VillageWorks->WorkSchedules->WorkScheduleRows->find();

            $is_complete = $work_schedule_rows->newExpr()
            ->addCase(
                [$work_schedule_rows->newExpr()->add(['WorkScheduleRowForms.id IS Null'])],
                [0,1],
                ['boolean','boolean']
            );

            $is_verified = $work_schedule_rows->newExpr()
            ->addCase(
                [$work_schedule_rows->newExpr()->add(['WorkVerifications.id IS Null'])],
                [0,1],
                ['boolean','boolean']
            );

            $is_satisfied = $work_schedule_rows->newExpr()
            ->addCase(
                [$work_schedule_rows->newExpr()->eq('WorkVerifications.is_satisfied',1)],
                [true,false],
                ['boolean','boolean']
            );

            $work_schedule_rows->select(['id','name','is_complete'=>$is_complete,'is_verified'=>$is_verified,'is_satisfied'=>$is_satisfied])
                                ->leftJoinWith('WorkScheduleRowForms',function($q)use($village_work_id){
                                    return $q->where(['WorkScheduleRowForms.village_work_id'=>$village_work_id]);
                                })
                                ->leftJoinWith('WorkVerifications',function($q)use($village_work_id){
                                    return $q->where(['WorkVerifications.village_work_id'=>$village_work_id]);
                                })
                                ->where(['work_schedule_id'=>$village_work->work_schedule_id]);

            if($work_schedule_rows)
            {
                $success = true;
                $message = "Work Found";
            }
            else
            {
                $success = false;
                $message = "No Work Found";
            }
        }

        $this->set(compact(['success','message','work_schedule_rows']));
        $this->set('_serialize', ['success','message','work_schedule_rows']);
    }

    public function submitSteps()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();

            if(!$this->Villages->VillageWorks->WorkScheduleRowForms->exists(['village_work_id'=>$data['village_work_id'],'work_schedule_row_id'=>$data['work_schedule_row_id']]))
            {
                $schedule_row_form = $this->Villages->VillageWorks->WorkScheduleRowForms->newEntity();
                $address = [];

                $data = array_filter($data, function($value) { return $value !== ''; });

                $schedule_row_form = $this->Villages->VillageWorks->WorkScheduleRowForms->patchEntity($schedule_row_form, $data);

                if(array_key_exists('image',$data))
                {
                    foreach ($data['image'] as $key => $value) {
                        if($value['error'] == 0)
                        {
                            $response = json_decode($this->Help->uploadOnly($value));
                            if($response->success)
                            {
                                $address[] = $response->address;
                            }
                            else
                                $error[] = $response->message;
                        }
                    }
                }

                if(!empty($address))
                    $schedule_row_form->image = implode(',',$address);
                else
                    $schedule_row_form->image = '';

                $schedule_row_form->created_by = $data['login_id'];
                
                if ($this->Villages->VillageWorks->WorkScheduleRowForms->save($schedule_row_form)) {
                    $success = true;
                    $message = 'Step has been submited.';

                    //send notification
                    $village_work = $this->Villages->VillageWorks->get($schedule_row_form->village_work_id,['contain'=>['Villages','WorkSchedules']]);

                    $employees = $this->Villages->EmployeeVillages->find()->select(['device_id'=>'Users.id'])
                                ->where(['village_id'=>$village_work->village_id])
                                ->innerJoinWith('Employees',function($q){
                                    return $q->innerJoinWith('Users');
                                });
                    foreach ($employees as $key => $emp)
                        $device_ids[] = $emp->device_id;

                    $msg = $village_work->work_schedule->name." has a completed work in village ".$village_work->village->name.". Please verify it.";

                    $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$schedule_row_form->village_work_id,$village_work->work_schedule->name.'_work');
                }
                else
                {
                    $schedule_row_form = $schedule_row_form->getErrors();
                    $success = false;
                    $message = 'Step could not be submited. Please, try again.';
                }
            }
            else
            {
                $success = false;
                $message = 'Step is already completed.';
            }
        }

        $this->set(compact(['success','message','schedule_row_form']));
        $this->set('_serialize', ['success','message','schedule_row_form']);
    }

    public function verifySteps()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $work_verification = $this->Villages->VillageWorks->WorkVerifications->newEntity();
            $data = array_filter($data, function($value) { return $value !== ''; });
            $work_verification = $this->Villages->VillageWorks->WorkVerifications->patchEntity($work_verification, $data);
            $address = [];

            if(array_key_exists('image',$data))
            {
                foreach ($data['image'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
            }

            if(!empty($address))
                $work_verification->image = implode(',',$address);
            else
                $work_verification->image = '';

            $work_verification->created_by = $data['login_id'];
            
            if ($this->Villages->VillageWorks->WorkVerifications->save($work_verification)) {
                $success = true;
                $message = 'Verified.';
                $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);

                $steps = $this->Villages->VillageWorks->WorkSchedules->WorkScheduleRows->find()->where(['work_schedule_id'=>$village_work->work_schedule_id])->count();
                $filled = $this->Villages->VillageWorks->WorkScheduleRowForms->find()->where(['village_work_id'=>$village_work->id])->count();
                $verified = $this->Villages->VillageWorks->WorkVerifications->find()->where(['village_work_id'=>$village_work->id])->count();

                if(($steps == $filled) && ($steps == $verified))
                {
                    $village_work->is_verified = 1;
                    $this->Villages->VillageWorks->save($village_work);
                }
            }
            else
            {
                $work_verification = $work_verification->getErrors();
                $success = false;
                $message = 'Unable to verify';
            }
        }

        $this->set(compact(['success','message','work_verification']));
        $this->set('_serialize', ['success','message','work_verification']);
    }

    public function submitCivil()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            if(!$this->Villages->VillageWorks->Civils->exists(['village_work_id'=>$this->request->getData('village_work_id')]))
            {
                $data = $this->request->getData();
                $data = array_filter($data, function($value) { return $value !== ''; });

                $civil = $this->Villages->VillageWorks->Civils->newEntity();
                $civil = $this->Villages->VillageWorks->Civils->patchEntity($civil, $data);
                $address = [];

                if(array_key_exists('image',$data))
                {
                    foreach ($data['image'] as $key => $value) {
                        if($value['error'] == 0)
                        {
                            $response = json_decode($this->Help->uploadOnly($value));
                            if($response->success)
                            {
                                $address[] = $response->address;
                            }
                            else
                                $error[] = $response->message;
                        }
                    }
                }

                if(!empty($address))
                    $civil->image = implode(',',$address);
                else
                    $civil->image = '';
                $address = [];

                if(array_key_exists('pdf',$data))
                {
                    foreach ($data['pdf'] as $key => $value) {
                        if($value['error'] == 0)
                        {
                            $response = json_decode($this->Help->uploadOnly($value));
                            if($response->success)
                            {
                                $address[] = $response->address;
                            }
                            else
                                $error[] = $response->message;
                        }
                    }
                }

                if(!empty($address))
                    $civil->pdf = implode(',',$address);
                else
                    $civil->pdf = '';

                $civil->created_by = $data['login_id'];
                
                if ($this->Villages->VillageWorks->Civils->save($civil)) 
                {
                    $success = true;
                    $message = 'Saved.';

                    // Mark Civil Work complete in village works
                    $village_work = $this->Villages->VillageWorks->get($civil->village_work_id);
                    $village_work->complete_date = date('Y-m-d');
                    $village_work->is_complete = 1;

                    $this->Villages->VillageWorks->save($village_work);

                    // update next work in village work
                    $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>3])->first();

                    $days = $this->Villages->VillageWorks->WorkSchedules->get(3)->days;
                    $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                    $this->Villages->VillageWorks->save($next_work);


                    //send notification to shelter vendor
                    $village_work = $this->Villages->VillageWorks->get($civil->village_work_id,['contain'=>['Villages','WorkSchedules']]);
                    $employees = $this->Villages->VendorVillages->find()->select(['device_id'=>'Users.id'])
                                ->where(['village_id'=>$village_work->village_id,'Vendors.vendor_designation_id'=>5])
                                ->innerJoinWith('Vendors',function($q){
                                    return $q->innerJoinWith('Users');
                                });
                    foreach ($employees as $key => $emp)
                        $device_ids[] = $emp->device_id;

                    $msg = "Civil work has been completed in village ".$village_work->village->name.". You can start shelter work.";

                    $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$next_work->id,'shelter_vendor');
                }
                else
                {
                    $civil = $civil->getErrors();
                    $success = false;
                    $message = 'Unable to save';
                }
            }
            else
            {
                $success = false;
                $message = 'Work is already completed.';
            }
        }

        $this->set(compact(['success','message','civil']));
        $this->set('_serialize', ['success','message','civil']);
    }

    public function submitShelter()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });
            
            if(array_key_exists('id',$data))
                if($data['id'])
                    $shelter_old = $this->Villages->VillageWorks->Shelters->get($data['id']);
                else
                    $shelter_old = $this->Villages->VillageWorks->Shelters->newEntity();
            else
                $shelter_old = $this->Villages->VillageWorks->Shelters->newEntity();
            
            $image_address = $shelter_old->image;
            $pdf_address = $shelter_old->pdf;

            $shelter = $this->Villages->VillageWorks->Shelters->patchEntity($shelter_old, $data);

            if($shelter->isNew())
                $shelter->created_by = $data['login_id'];
            else
                $shelter->edited_by = $data['login_id'];

            if(array_key_exists('image',$data))
            {
                $address = [];
                foreach ($data['image'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
                $image_address = implode(',', $address);
            }
            $shelter->image = $image_address;

            if(array_key_exists('pdf',$data))
            {
                $address = [];
                foreach ($data['pdf'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
                $pdf_address = implode(',', $address);
            }
            $shelter->pdf = $pdf_address;

            $image_address = $shelter_old->verify_image;
            if(array_key_exists('verify_image',$data))
            {
                $address = [];
                foreach ($data['verify_image'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
                $image_address = implode(',', $address);
            }
            $shelter->verify_image = $image_address;

            if(array_key_exists('invoice_image',$data))
                $shelter->invoice_image = $this->Help->upload($data['invoice_image'],$shelter_old->invoice_image);
            
            if ($this->Villages->VillageWorks->Shelters->save($shelter)) {
                $success = true;
                $message = 'Saved.';

                if(array_key_exists('is_complete',$data))
                    if($data['is_complete'])
                    {
                        // Mark shelter complete
                        $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);
                        $village_work->complete_date = date('Y-m-d');
                        $village_work->is_complete = 1;

                        $this->Villages->VillageWorks->save($village_work);

                        // Start New Work
                        $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>4])->first();

                        $days = $this->Villages->VillageWorks->WorkSchedules->get(4)->days;
                        $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                        $this->Villages->VillageWorks->save($next_work);


                        //send notification to Employee
                        $village_work = $this->Villages->VillageWorks->get($shelter->village_work_id,['contain'=>['Villages','WorkSchedules']]);
                        $employees = $this->Villages->EmployeeVillages->find()->select(['device_id'=>'Users.id'])
                                    ->where(['village_id'=>$village_work->village_id])
                                    ->innerJoinWith('Employees',function($q){
                                        return $q->innerJoinWith('Users');
                                    });
                        foreach ($employees as $key => $emp)
                            $device_ids[] = $emp->device_id;

                        $msg = "Shelter work has been completed in village ".$village_work->village->name.". Please Verify It.";

                        $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$village_work->id,'shelter_work');
                    }

                if(array_key_exists('verified_by',$data))
                    if($data['verified_by'] > 0)
                    {
                        $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);
                        $village_work->is_verified = 1;
                        $this->Villages->VillageWorks->save($village_work);
                    }
            }
            else
            {
                $shelter = $shelter->getErrors();
                $success = false;
                $message = 'Unable to save';
            }
        }

        $this->set(compact(['success','message','shelter']));
        $this->set('_serialize', ['success','message','shelter']);
    }

    public function submitGlowSignBoard()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });

            if(!$this->Villages->VillageWorks->GlowSignBoards->exists(['village_work_id'=>$data['village_work_id']]))
            {
                $glow_sign_board = $this->Villages->VillageWorks->GlowSignBoards->newEntity();
                $glow_sign_board = $this->Villages->VillageWorks->GlowSignBoards->patchEntity($glow_sign_board, $data);
                $address = [];

                if(array_key_exists('image',$data))
                {
                    foreach ($data['image'] as $key => $value) {
                        if($value['error'] == 0)
                        {
                            $response = json_decode($this->Help->uploadOnly($value));
                            if($response->success)
                            {
                                $address[] = $response->address;
                            }
                            else
                                $error[] = $response->message;
                        }
                    }
                }
                
                if(!empty($address))
                    $glow_sign_board->image = implode(',',$address);
                else
                    $glow_sign_board->image = '';
                
                if ($this->Villages->VillageWorks->GlowSignBoards->save($glow_sign_board)) {
                    $success = true;
                    $message = 'Saved.';

                    $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);
                    $village_work->complete_date = date('Y-m-d');
                    $village_work->is_complete = 1;
                    $village_work->is_verified = 1;

                    $this->Villages->VillageWorks->save($village_work);

                    $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>7])->first();

                    $days = $this->Villages->VillageWorks->WorkSchedules->get(7)->days;
                    $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                    $this->Villages->VillageWorks->save($next_work);
                    
                    //send notification to I&C Vendor
                    $village_work = $this->Villages->VillageWorks->get($glow_sign_board->village_work_id,['contain'=>['Villages','WorkSchedules']]);

                    $employees = $this->Villages->VendorVillages->find()->select(['device_id'=>'Users.id'])
                                ->where(['village_id'=>$village_work->village_id,'Vendors.vendor_designation_id'=>3])
                                ->innerJoinWith('Vendors',function($q){
                                    return $q->innerJoinWith('Users');
                                });
                    foreach ($employees as $key => $emp)
                        $device_ids[] = $emp->device_id;

                    $msg = "Glow Sign Board has been completed in village ".$village_work->village->name.". Please Complete Installations and Commissioning Step.";

                    $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$next_work->id,'installation_vendor');
                }
                else
                {
                    $glow_sign_board = $glow_sign_board->getErrors();
                    $success = false;
                    $message = 'Unable to save';
                }
            }
            else
            {
                $success = false;
                $message = 'Already Filled';
            }
        }

        $this->set(compact(['success','message','glow_sign_board']));
        $this->set('_serialize', ['success','message','glow_sign_board']);
    }

    public function submitInstallation()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });

            $installation = $this->Villages->VillageWorks->Installations->newEntity();
            $installation = $this->Villages->VillageWorks->Installations->patchEntity($installation, $data);
            $installation->created_by = $data['login_id'];
            $address = [];

            if(array_key_exists('image',$data))
            {
                foreach ($data['image'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
            }

            if(!empty($address))
                $installation->image = implode(',',$address);
            else
                $installation->image = '';
            $address = [];

            if(array_key_exists('pdf',$data))
            {
                foreach ($data['pdf'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
            }

            if(!empty($address))
                $installation->pdf = implode(',',$address);
            else
                $installation->pdf = '';
            
            if ($this->Villages->VillageWorks->Installations->save($installation)) {
                $success = true;
                $message = 'Saved.';

                $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);
                $village_work->complete_date = date('Y-m-d');
                $village_work->is_complete = 1;

                $this->Villages->VillageWorks->save($village_work);

                $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>8])->first();

                $days = $this->Villages->VillageWorks->WorkSchedules->get(8)->days;
                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                $this->Villages->VillageWorks->save($next_work);
            }
            else
            {
                $installation = $installation->getErrors();
                $success = false;
                $message = 'Unable to save';
            }
        }

        $this->set(compact(['success','message','installation']));
        $this->set('_serialize', ['success','message','installation']);
    }

    public function submitCommissioning()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });

            $commissionings = $this->Villages->VillageWorks->Commissionings->newEntity();
            $commissionings = $this->Villages->VillageWorks->Commissionings->patchEntity($commissionings, $data);
            $commissionings->created_by = $data['login_id'];
            $address = [];

            if(array_key_exists('image',$data))
            {
                foreach ($data['image'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
            }

            if(!empty($address))
                $commissionings->image = implode(',',$address);
            else
                $commissionings->image = '';
            $address = [];

            if(array_key_exists('pdf',$data))
            {
                foreach ($data['pdf'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
            }

            if(!empty($address))
                $commissionings->pdf = implode(',',$address);
            else
                $commissionings->pdf = '';
            
            if ($this->Villages->VillageWorks->Commissionings->save($commissionings)) {
                $success = true;
                $message = 'Saved.';

                $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);
                $village_work->complete_date = date('Y-m-d');
                $village_work->is_complete = 1;

                $this->Villages->VillageWorks->save($village_work);

                $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>9])->first();
                $days = $this->Villages->VillageWorks->WorkSchedules->get(9)->days;
                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                $this->Villages->VillageWorks->save($next_work);

                $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>10])->first();
                $days = $this->Villages->VillageWorks->WorkSchedules->get(10)->days;
                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                $this->Villages->VillageWorks->save($next_work);

                $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>11])->first();
                $days = $this->Villages->VillageWorks->WorkSchedules->get(11)->days;
                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                $this->Villages->VillageWorks->save($next_work);
            }
            else
            {
                $commissionings = $commissionings->getErrors();
                $success = false;
                $message = 'Unable to save';
            }
        }

        $this->set(compact(['success','message','commissionings']));
        $this->set('_serialize', ['success','message','commissionings']);
    }

    public function submitPlant()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();
            $data = array_filter($data, function($value) { return $value !== ''; });

            $plant = $this->Villages->VillageWorks->PlantReceives->newEntity();
            $plant = $this->Villages->VillageWorks->PlantReceives->patchEntity($plant, $data);
            $plant->created_by = $data['login_id'];
            $address = [];

            if(array_key_exists('image',$data))
            {
                foreach ($data['image'] as $key => $value) {
                    if($value['error'] == 0)
                    {
                        $response = json_decode($this->Help->uploadOnly($value));
                        if($response->success)
                        {
                            $address[] = $response->address;
                        }
                        else
                            $error[] = $response->message;
                    }
                }
            }

            if(!empty($address))
                $plant->image = implode(',',$address);
            else
                $plant->image = '';
            
            if ($this->Villages->VillageWorks->PlantReceives->save($plant)) {
                $success = true;
                $message = 'Saved.';

                $village_work = $this->Villages->VillageWorks->get($data['village_work_id']);
                $village_work->complete_date = date('Y-m-d');
                $village_work->is_complete = 1;
                $village_work->is_verified = 1;

                $this->Villages->VillageWorks->save($village_work);

                $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>5])->first();

                $days = $this->Villages->VillageWorks->WorkSchedules->get(5)->days;
                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                $this->Villages->VillageWorks->save($next_work);
            }
            else
            {
                $plant = $plant->getErrors();
                $success = false;
                $message = 'Unable to save';
            }
        }

        $this->set(compact(['success','message','plant']));
        $this->set('_serialize', ['success','message','plant']);
    }

    public function submitTank()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = json_decode($this->request->getData('data'),true);
            $images = $this->request->getData('image');

            // pr($images);

            foreach ($data as $key => $d)
            {
                if(array_key_exists($key,$images))
                {
                        if($images[$key]['error'] == 0)
                        {
                            $response = json_decode($this->Help->uploadOnly($images[$key]));
                            if($response->success)
                            {
                                $data[$key]['image'] = $response->address;
                            }
                            else
                                $data[$key]['image'] = '';
                        }
                }
            }

            // pr($data);exit;

            $tanks = $this->Villages->VillageWorks->TankReceives->newEntities($data);

            foreach ($tanks as $key => $tank)
                $tank->created_by = $data[$key]['login_id'];
            
            if ($this->Villages->VillageWorks->TankReceives->saveMany($tanks)) {
                $success = true;
                $message = 'Saved.';

                $village_work = $this->Villages->VillageWorks->get($data[0]['village_work_id']);
                $village_work->complete_date = date('Y-m-d');
                $village_work->is_complete = 1;
                $village_work->is_verified = 1;

                $this->Villages->VillageWorks->save($village_work);

                $next_work = $this->Villages->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>6])->first();

                $days = $this->Villages->VillageWorks->WorkSchedules->get(6)->days;
                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                $this->Villages->VillageWorks->save($next_work);
            }
            else
            {
                $success = false;
                $message = 'Unable to save';
            }
        }

        $this->set(compact(['success','message','tanks']));
        $this->set('_serialize', ['success','message','tanks']);
    }

    public function submitBilling()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData('data');
            $data = json_decode($data,true);
            
            $billing = $this->Villages->VillageWorks->Billings->find()->where(['village_work_id'=>$data[0]['village_work_id']]);
            $billing = $this->Villages->VillageWorks->Billings->patchEntities($billing, $data);
            
            if ($this->Villages->VillageWorks->Billings->saveMany($billing)) {
                $success = true;
                $message = 'Saved.';

                // $village_work = $this->Villages->VillageWorks->get($data[0]['village_work_id']);
                // $village_work->complete_date = date('Y-m-d');
                // $village_work->is_complete = 1;
                // $village_work->is_verified = 1;
                // $this->Villages->VillageWorks->save($village_work);
            }
            else
            {
                print_r($billing);exit;
                $success = false;
                $message = 'Unable to save';
            }
        }

        $this->set(compact(['success','message','billing']));
        $this->set('_serialize', ['success','message','billing']);
    }

    public function getBillings()
    {
        $billings = $this->Villages->VillageWorks->Billings->find()
                    ->select($this->Villages->VillageWorks->Billings)
                    ->select(['question'=>'BillingQuestions.name'])
                    ->where(['village_work_id'=>$this->request->getData('village_work_id')])
                    ->contain(['BillingQuestions']);
        // pr($billings->toArray());exit;
        if (!empty($billings->toArray())) {
            $success = true;
            $message = 'Data Found.';
        }
        else
        {
            $success = false;
            $message = 'No Data Found.';
        }

        $this->set(compact(['success','message','billings']));
        $this->set('_serialize', ['success','message','billings']);
    }

    public function TankSize()
    {
        $data = $this->request->getData();

        $size = $this->Villages->VillageWorks->TankReceives->TankSizes->find('all')->select(['name']);

        if($size)
        {
            $success = true;
            $message = "size Found";
        }
        else
        {
            $success = false;
            $message = "No size Found";
        }

        $this->set(compact(['success','message','size']));
        $this->set('_serialize', ['success','message','size']);
    }    

    public function villageOfficers()
    {
        $data = $this->request->getData();

        $officers = $this->Villages->DoVillages->find('all')
            ->select(['id','post'=>'DoPosts.name','name'=>'DepartmentOfficers.name','email'=>'DepartmentOfficers.email','mobile'=>'DepartmentOfficers.contact_no'])
            ->where(['village_id'=>$data['village_id']])
            ->contain(['DepartmentOfficers','DoPosts']);

        if($officers)
        {
            $success = true;
            $message = "Officers Found";
        }
        else
        {
            $success = false;
            $message = "No Officers Found";
        }

        $this->set(compact(['success','message','officers']));
        $this->set('_serialize', ['success','message','officers']);
    }

    public function version()
    {
        $versions = $this->Villages->ApiVersions->find('all')->last();
        $product_count = $this->Villages->VillageRequests->VillageRequestProducts->Products->find()->count();
        $village_count = $this->Villages->find()->count();
        if($versions)
        {
            $success = true;
            $message = "versions Found";
        }
        else
        {
            $success = false;
            $message = "No versions Found";
        }

        $this->set(compact(['success','message','versions','product_count','village_count']));
        $this->set('_serialize', ['success','message','versions','product_count','village_count']);
    }

    public function villageEmployees()
    {
        $village_employees = $this->Villages->EmployeeVillages->find()
                                ->select(['name'=>'Employees.name','post'=>'EmployeeVillages.designation','mobile'=>'Employees.contact_no','email'=>'Employees.email'])
                                ->where(['EmployeeVillages.village_id'=>$this->request->getData('village_id')])
                                ->contain(['Villages','Employees']);
        if($village_employees)
        {
            $success = true;
            $message = "village employees Found";
        }
        else
        {
            $success = false;
            $message = "No village employees Found";
        }

        $this->set(compact(['success','message','village_employees']));
        $this->set('_serialize', ['success','message','village_employees']);
    }

    public function tanksView()
    {
        $village_work_id = $this->request->getData('village_work_id');

        if($village_work_id)
        {
            $village_work = $this->Villages->VillageWorks->TankReceives->find()->where(['village_work_id'=>$village_work_id]);

            if(!$village_work->isEmpty())
            {
                $success = true;
                $message = "Tank Found";
            }
            else
            {
                $success = false;
                $message = "No Tank Found";
            }
        }

        $this->set(compact(['success','message','village_work']));
        $this->set('_serialize', ['success','message','village_work']);
    }

}
