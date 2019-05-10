<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function loginApi()
    {
        $this->viewBuilder()->setLayout('login');
        $success = false;
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $success = true;
                $message = 'Login Success';
                $login_id = $user['id'];
                $device_id = $user['device_id'];
                if($user['om'])
                {
                    $user = $this->Users->Employees->find()
                                ->select($this->Users->Employees)
                                ->where(['Employees.id'=>$user['employee_id']])
                                ->first();
                                $user->set('type','OM');
                                $user->set('login_id',$login_id);
                                $user->set('device_id',$device_id);
                                if($this->Users->OmEmployees->exists(['technician_id'=>$user['id']]))
                                    $user->set('designation','Technician');
                                if($this->Users->OmEmployees->exists(['manager_id'=>$user['id']]))
                                    $user->set('designation','Manager');

                }
                else
                {
                    if($user['employee_id'])
                    {
                        $user = $this->Users->Employees->find()
                                ->select($this->Users->Employees)
                                ->select(['designation'=>'EmployeeDesignations.name'])
                                ->contain(['EmployeeDesignations'])
                                ->where(['Employees.id'=>$user['employee_id']])
                                ->first();
                                $user->set('type','Employee');
                                $user->set('login_id',$login_id);
                                $user->set('device_id',$device_id);
                    }
                    if($user['vendor_id'])
                    {
                        $user = $this->Users->Vendors->find()
                                ->select($this->Users->Vendors)
                                ->select(['designation'=>'VendorDesignations.name'])
                                ->contain(['VendorDesignations'])
                                ->where(['Vendors.id'=>$user['vendor_id']])
                                ->first();
                                $user->set('type','Vendor');
                                $user->set('login_id',$login_id);
                                $user->set('device_id',$device_id);
                    }
                    if($user['department_officer_id'])
                    {
                        $user = $this->Users->DepartmentOfficers->find()
                                ->select($this->Users->DepartmentOfficers)
                                ->select(['designation'=>'DoPosts.name'])
                                ->contain(['DoPosts'])
                                ->where(['DepartmentOfficers.id'=>$user['department_officer_id']])
                                ->first();
                                $user->set('type','DO');
                                $user->set('login_id',$login_id);
                                $user->set('device_id',$device_id);
                    }
                }
            } 
            else {
                unset($user);
                $success = false;
                $message = 'Username or password is incorrect';
            }
        }

        $this->set(compact(['success','message','user']));
        $this->set('_serialize', ['success','message','user']);
    }

    public function otpLogin()
    {
        $this->viewBuilder()->setLayout('login');
        $success = false;
        if ($this->request->is('post')) {
            if($this->Users->exists(['username'=>$this->request->getData('username')]))
            {    
                $user = $this->Users->find()
                        ->where(['username'=>$this->request->getData('username')])->first();
                $otp = $this->Sms->sendOtp($user->username);
                if ($otp) {
                    $success = true;
                    $message = 'Login Success';
                    $login_id = $user['id'];
                    $device_id = $user['device_id'];
                    if($user['employee_id'])
                    {
                        $user = $this->Users->Employees->find()
                                ->select($this->Users->Employees)
                                ->select(['designation'=>'EmployeeDesignations.name'])
                                ->contain(['EmployeeDesignations'])
                                ->where(['Employees.id'=>$user['employee_id']])
                                ->first();
                                $user->set('type','Employee');
                    }
                    if($user['vendor_id'])
                    {
                        $user = $this->Users->Vendors->find()
                                ->select($this->Users->Vendors)
                                ->select(['designation'=>'VendorDesignations.name'])
                                ->contain(['VendorDesignations'])
                                ->where(['Vendors.id'=>$user['vendor_id']])
                                ->first();
                                $user->set('type','Vendor');
                    }
                    if($user['department_officer_id'])
                    {
                        $user = $this->Users->DepartmentOfficers->find()
                                ->select($this->Users->DepartmentOfficers)
                                ->select(['designation'=>'DoPosts.name'])
                                ->contain(['DoPosts'])
                                ->where(['DepartmentOfficers.id'=>$user['department_officer_id']])
                                ->first();
                                $user->set('type','DO');
                    }

                    $user->set('login_id',$login_id);
                    $user->set('device_id',$device_id);
                } 
                else {
                    $success = false;
                    $message = 'Unable to send OTP.';
                }
            }
            else {
                $success = false;
                $message = 'Invalid mobile number.';
            }
        }

        $this->set(compact(['success','message','user','otp']));
        $this->set('_serialize', ['success','message','user','otp']);
    }

    public function updateTocken()
    {
        $user = $this->Users->get($this->request->getData('login_id'));
        $user->device_id = $this->request->getData('device_id');
        if($this->Users->save($user))
        {
            $success = true;
            $message = 'Saved';
        } 
        else {
            $success = false;
            $message = 'Unable To Save';
        }

        $this->set(compact(['success','message']));
        $this->set('_serialize', ['success','message']);
    }

    public function myNotifications()
    {
        $notifications = $this->Users->Notifications->find()->where(['user_id'=>$this->request->getData('login_id')])->order('Notifications.id');
        if(!$notifications->isEmpty())
        {
            $success = true;
            $message = 'Data Found';
        } 
        else {
            $success = false;
            $message = 'No Data Found';
        }

        $this->set(compact(['success','message','notifications']));
        $this->set('_serialize', ['success','message','notifications']);
    }
}
