<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * SiteSelections Controller
 *
 * @property \App\Model\Table\SiteSelectionsTable $SiteSelections
 *
 * @method \App\Model\Entity\SiteSelection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SiteSelectionsController extends AppController
{
    public function subminSiteSelection()
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data = $this->request->getData();

            if(array_key_exists('id',$data))
                if($data['id'])
                    $siteSelection = $this->SiteSelections->get($data['id']);
                else
                    $siteSelection = $this->SiteSelections->newEntity();
            else
                $siteSelection = $this->SiteSelections->newEntity();

            if($siteSelection->isNew() && $this->SiteSelections->exists(['village_work_id'=>$data['village_work_id']]))
            {
                $success = false;
                $message = 'site selection has already done.';
            }
            else
            {
                $data = array_filter($data, function($value) { return $value !== ''; });

                $siteSelections = $this->SiteSelections->patchEntity($siteSelection, $data);

                if($siteSelections->isNew())
                    $siteSelections->created_by = $data['login_id'];
                else
                    $siteSelections->edited_by = $data['login_id'];

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
                    $siteSelections->image = implode(',',$address);
                }

                if(array_key_exists('form',$data))
                {
                    $address = [];
                    foreach ($data['form'] as $key => $value) {
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
                    if(!empty($address))
                        $siteSelections->form = implode(',',$address);
                }

                if ($this->SiteSelections->save($siteSelections)) {
                    $success = true;
                    $message = 'The site selection has been saved.';

                        if(array_key_exists('is_complete',$data))
                        {
                            if($data['is_complete'])
                            {
                                $village_work = $this->SiteSelections->VillageWorks->get($siteSelections['village_work_id']);
                                $village_work->complete_date = date('Y-m-d');
                                $village_work->is_complete = 1;

                                $this->SiteSelections->VillageWorks->save($village_work);

                                $next_work = $this->SiteSelections->VillageWorks->find()->where(['village_id'=>$village_work->village_id,'work_schedule_id'=>2])->first();

                                $days = $this->SiteSelections->VillageWorks->WorkSchedules->get(2)->days;
                                $next_work->schedule_date = date('Y-m-d',strtotime('+'.$days.' day'));
                                $this->SiteSelections->VillageWorks->save($next_work);

                                //send notification to Department Officers
                                $village_work = $this->SiteSelections->VillageWorks->get($siteSelections['village_work_id'],['contain'=>['Villages','WorkSchedules']]);

                                $dos = $this->SiteSelections->VillageWorks->Villages->DoVillages->find()->select(['device_id'=>'Users.id'])
                                            ->where(['village_id'=>$village_work->village_id])
                                            ->innerJoinWith('DepartmentOfficers',function($q){
                                                return $q->innerJoinWith('Users');
                                            });
                                foreach ($dos as $key => $emp)
                                    $device_ids[] = $emp->device_id;

                                $msg = "Site Selection of ".$village_work->village->name." has been completed. Please verify it.";

                                $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$village_work->id,'department_officer');

                                //send notification to Civil Vendor
                                $vendors = $this->SiteSelections->VillageWorks->Villages->VendorVillages->find()->select(['device_id'=>'Users.id'])
                                    ->where(['village_id'=>$village_work->village_id,'VendorVillages.vendor_designation_id'=>1])
                                    ->innerJoinWith('Vendors',function($q){
                                        return $q->innerJoinWith('Users');
                                    });

                                unset($device_ids);

                                foreach ($vendors as $key => $emp)
                                    $device_ids[] = $emp->device_id;

                                $msg = "Site Selection of ".$village_work->village->name." has been completed. You can start Civil work.";

                                $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$next_work->id,'civil_vendor');
                            }
                        }

                        if($siteSelections['verified_by'] > 0)
                        {
                            $village_work = $this->SiteSelections->VillageWorks->get($siteSelections['village_work_id']);
                            $village_work->is_verified = 1;
                            $this->SiteSelections->VillageWorks->save($village_work);

                            //send notification to Employee
                            $village_work = $this->SiteSelections->VillageWorks->get($siteSelections->village_work_id,['contain'=>['Villages','WorkSchedules']]);
                            $employees = $this->SiteSelections->VillageWorks->Villages->EmployeeVillages->find()->select(['device_id'=>'Users.id'])
                                        ->where(['village_id'=>$village_work->village_id])
                                        ->innerJoinWith('Employees',function($q){
                                            return $q->innerJoinWith('Users');
                                        });
                            foreach ($employees as $key => $emp)
                                $device_ids[] = $emp->device_id;

                            $msg = "Site Selection of ".$village_work->village->name." has been approved";

                            $this->Help->sendNotification($device_ids,$msg,$village_work->village->id,$village_work->village->project_id,$village_work->id,'site_work');
                        }
                }
                else
                {
                    $siteSelections = $siteSelections->getErrors();
                    $success = false;
                    $message = 'The site selection could not be saved. Please, try again.';
                }
            }
        }

        $this->set(compact(['success','message','siteSelections','error']));
        $this->set('_serialize', ['success','message','siteSelections','error']);
    }
}
