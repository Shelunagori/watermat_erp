<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
/**
 * Villages Controller
 *
 * @property \App\Model\Table\VillagesTable $Villages
 *
 * @method \App\Model\Entity\Village[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['view']);
        $this->project_id = $this->session->read('project_id');
        if(!$this->project_id && !$this->request->getParam('_ext') == 'json')
            return $this->redirect(['controller'=>'Users','action' => 'selectProject']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Blocks']
        ];
        //$this->Villages->find()->first();
        if ($this->request->query('search')) 
        { 
            $village = $this->Villages->find();
            if(!empty($this->request->query('block_id')))
            {
                $block_id = $this->request->query('block_id');
                $village->where(['block_id'=>$block_id]);
                
            }
            if(!empty($this->request->query('name')))
            {
                $name = $this->request->query('name');
                $village->where(function (QueryExpression $exp, Query $q) use($name) {
                    return $exp->like('Villages.name', '%'.$name.'%');
                });
            }
            $villages = $this->paginate($village);
        }
        else
        {
           $villages = $this->paginate($this->Villages);
        }

        $blocks = $this->Villages->Blocks->find('list');
        $this->set(compact('villages','blocks','block_id','name'));
    }
    public function villageReport()
    {
        $villages = $this->Villages->find()->contain(['Blocks']);

        $this->set(compact('villages'));
    }

    /**
     * View method
     *
     * @param string|null $id Village id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $id = $this->request->getQuery('village_id');
        $this->viewBuilder()->setLayout('pdf');
        $head_title = 'Site Selection';
        $name='SiteSelection.pdf';

        $village = $this->Villages->get($id, [
            'contain' => [
                'Blocks'=>['Divisions'=>'Districts'],
                'SiteWorks'=>[
                    'SiteSelections'=>['MlaConstituencies','GramPanchayats']
                ],
                'DoVillages'=>function($q){
                    return $q->select(['id','village_id','post'=>'DoPosts.name','name'=>'DepartmentOfficers.name','email'=>'DepartmentOfficers.email','mobile'=>'DepartmentOfficers.contact_no'])
                        ->contain(['DepartmentOfficers','DoPosts']);
                }
            ]
        ]);

        // pr($village->toArray());exit;
        $this->set(compact('name','head_title','village'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $village = $this->Villages->newEntity();

        if ($this->request->is('post')) 
        {

            $data = $this->request->getData();

            foreach ($data['do_villages'] as $key => $value) {
                if(empty($value['department_officer_id']))
                    unset($data['do_villages'][$key]);
            }
            foreach ($data['employee_villages'] as $key => $value) {
                if(empty($value['employee_id']))
                    unset($data['employee_villages'][$key]);
            }
            foreach ($data['vendor_villages'] as $key => $value) {
                if(empty($value['vendor_id']))
                    unset($data['vendor_villages'][$key]);
            }

            $village = $this->Villages->patchEntity($village, $data);
            $village->project_id = $this->project_id;
            $village->image = $this->Help->upload($_FILES['image']);


            if ($this->Villages->save($village)) {
                $this->Flash->success(__('The village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //pr($village);exit;
            $this->Flash->error(__('The village could not be saved. Please, try again.'));
        }

        $divisions = $this->Villages->Blocks->find('list');

        $civilVendors = $this->Villages->VendorVillages->CivilVendors->find('list');
        $shelterVendors = $this->Villages->VendorVillages->ShelterVendors->find('list');
        $icVendors = $this->Villages->VendorVillages->ICVendors->find('list');

        $doPosts = $this->Villages->DoPosts->find('list');
        $departmentOfficers = $this->Villages->DoVillages->DepartmentOfficers->find('list');

        $employeePosts = ['Manager'=>'Manager','Technician'=>'Technician'];
        $employees = $this->Villages->EmployeeVillages->Employees->find('list');

        $this->set(compact('village', 'divisions', 'doPosts', 'departmentOfficers', 'employeePosts', 'employees', 'civilVendors', 'shelterVendors', 'icVendors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Village id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $village = $this->Villages->get($id, [
            'contain' => ['VendorVillages','EmployeeVillages','DoVillages']
        ]);
        $old_image = $village->image;
        if ($this->request->is(['post','patch','put'])) 
        {

            $data = $this->request->getData();

            foreach ($data['do_villages'] as $key => $value) {
                if(empty($value['department_officer_id']))
                    unset($data['do_villages'][$key]);
            }
            foreach ($data['employee_villages'] as $key => $value) {
                if(empty($value['employee_id']))
                    unset($data['employee_villages'][$key]);
            }
            foreach ($data['vendor_villages'] as $key => $value) {
                if(empty($value['vendor_id']))
                    unset($data['vendor_villages'][$key]);
            }

            $village = $this->Villages->patchEntity($village, $data);
            $village->project_id = $this->project_id;
            $village->image = $this->Help->upload($_FILES['image'],$old_image);

            if ($this->Villages->save($village)) {
                $this->Flash->success(__('The village has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //pr($village);exit;
            $this->Flash->error(__('The village could not be saved. Please, try again.'));
        }
      
        $divisions = $this->Villages->Blocks->find('list');

        $civilVendors = $this->Villages->VendorVillages->CivilVendors->find('list');
        $shelterVendors = $this->Villages->VendorVillages->ShelterVendors->find('list');
        $icVendors = $this->Villages->VendorVillages->ICVendors->find('list');

        $doPosts = $this->Villages->DoPosts->find('list');
        $departmentOfficers = $this->Villages->DoVillages->DepartmentOfficers->find('list');

        $employeePosts = ['Manager'=>'Manager','Technician'=>'Technician'];
        $employees = $this->Villages->EmployeeVillages->Employees->find('list');

        $this->set(compact('village', 'divisions', 'doPosts', 'departmentOfficers', 'employeePosts', 'employees', 'civilVendors', 'shelterVendors', 'icVendors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $village = $this->Villages->get($id);
        if ($this->Villages->delete($village)) {
            $this->Flash->success(__('The village has been deleted.'));
        } else {
            $this->Flash->error(__('The village could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addEmployee()
    {
        $states = $this->Villages->States->Find('list');

        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            foreach ($data as $key => $value)
                if($value && $key != 'employee_id' && $key != 'designation')
                {
                    if($key == 'village_id')
                        $key = 'Villages.id';
                    $where[$key] = $value;
                }

            $villages = $this->Villages->States->Find()->select(['id'=>'Villages.id'])
                        ->innerJoinWith('Districts',function($q){
                                return $q->innerJoinWith('Divisions',function($q){
                                    return $q->innerJoinWith('Blocks',function($q){
                                        return $q->innerJoinWith('Villages');
                                    });
                                });
                            })
                        ->where($where);
            foreach ($villages as $key => $village) 
            {
                if(!$this->Villages->EmployeeVillages->exists(['village_id'=>$village->id,'designation'=>$data['designation'],'employee_id'=>$data['employee_id']]))
                {
                    $employee_village = $this->Villages->EmployeeVillages->newEntity();
                    $employee_village->village_id = $village->id;
                    $employee_village->designation = $data['designation'];
                    $employee_village->employee_id = $data['employee_id'];

                    $this->Villages->EmployeeVillages->save($employee_village);
                }
            }
            $user = $this->Villages->EmployeeVillages->Employees->Users->find()->where(['employee_id'=>$data['employee_id']])->first();
            $user->om = false;
            $this->Villages->EmployeeVillages->Employees->Users->save($user);
            $this->Flash->success('Saved');
            $this->redirect('');
        }

        $employeePosts = ['Manager'=>'Manager','Technician'=>'Technician'];
        $employees = $this->Villages->EmployeeVillages->Employees->find('list')->contain(['Users'])->where(['Users.om'=>0,'Employees.work_location'=>'Field']);

        $village = $this->Villages->newEntity();
        $this->set(compact(['states','village','employeePosts','employees']));
    }

    public function addVendor()
    {
        $states = $this->Villages->States->Find('list');

        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            foreach ($data as $key => $value)
                if($value && $key != 'vendor_id' && $key != 'vendor_designation_id')
                {
                    if($key == 'village_id')
                        $key = 'Villages.id';
                    $where[$key] = $value;
                }

            $villages = $this->Villages->States->Find()->select(['id'=>'Villages.id'])
                        ->innerJoinWith('Districts',function($q){
                                return $q->innerJoinWith('Divisions',function($q){
                                    return $q->innerJoinWith('Blocks',function($q){
                                        return $q->innerJoinWith('Villages');
                                    });
                                });
                            })
                        ->where($where);
            foreach ($villages as $key => $village) 
            {
                if($this->Villages->VendorVillages->exists(['village_id'=>$village->id,'vendor_designation_id'=>$data['vendor_designation_id']]))
                {
                    $vendor_village = $this->Villages->VendorVillages->find()->where(['village_id'=>$village->id,'vendor_designation_id'=>$data['vendor_designation_id']])->first();
                    $vendor_village->vendor_id = $data['vendor_id'];
                }
                else
                {
                    $vendor_village = $this->Villages->EmployeeVillages->newEntity();
                    $vendor_village->village_id = $village->id;
                    $vendor_village->vendor_designation_id = $data['vendor_designation_id'];
                    $vendor_village->vendor_id = $data['vendor_id'];
                }
                $this->Villages->VendorVillages->save($vendor_village);
            }
            $this->Flash->success('Saved');
            $this->redirect('');
        }

        $VendorDesignations = $this->Villages->VendorVillages->Vendors->VendorDesignations->find('list');
        $vendors = $this->Villages->VendorVillages->Vendors->find('list');

        $village = $this->Villages->newEntity();
        $this->set(compact(['states','village','VendorDesignations','vendors']));
    }

    public function addDo()
    {
        $states = $this->Villages->States->Find('list');

        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            foreach ($data as $key => $value)
                if($value && $key != 'department_officer_id' && $key != 'do_post_id')
                {
                    if($key == 'village_id')
                        $key = 'Villages.id';
                    $where[$key] = $value;
                }

            $villages = $this->Villages->States->Find()->select(['id'=>'Villages.id'])
                        ->innerJoinWith('Districts',function($q){
                                return $q->innerJoinWith('Divisions',function($q){
                                    return $q->innerJoinWith('Blocks',function($q){
                                        return $q->innerJoinWith('Villages');
                                    });
                                });
                            })
                        ->where($where);
            foreach ($villages as $key => $village) 
            {
                if($this->Villages->DoVillages->exists(['village_id'=>$village->id,'do_post_id'=>$data['do_post_id']]))
                {
                    $do_village = $this->Villages->DoVillages->find()->where(['village_id'=>$village->id,'do_post_id'=>$data['do_post_id']])->first();
                    $do_village->department_officer_id = $data['department_officer_id'];
                }
                else
                {
                    $do_village = $this->Villages->DoVillages->newEntity();
                    $do_village->village_id = $village->id;
                    $do_village->do_post_id = $data['do_post_id'];
                    $do_village->department_officer_id = $data['department_officer_id'];
                }
                $this->Villages->DoVillages->save($do_village);
            }
            $this->Flash->success('Saved');
            $this->redirect('');
        }

        $doPosts = $this->Villages->DoPosts->find('list');
        $departmentOfficers = $this->Villages->DoVillages->DepartmentOfficers->find('list');

        $village = $this->Villages->newEntity();
        $this->set(compact(['states','village','doPosts','departmentOfficers']));
    }

    public function addOm()
    {
        $states = $this->Villages->States->Find('list');

        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            foreach ($data as $key => $value)
                if($value && $key != 'employee_id' && $key != 'designation')
                {
                    if($key == 'village_id')
                        $key = 'Villages.id';
                    $where[$key] = $value;
                }

            $villages = $this->Villages->States->Find()->select(['id'=>'Villages.id'])
                        ->innerJoinWith('Districts',function($q){
                                return $q->innerJoinWith('Divisions',function($q){
                                    return $q->innerJoinWith('Blocks',function($q){
                                        return $q->innerJoinWith('Villages');
                                    });
                                });
                            })
                        ->where($where);

            foreach ($villages as $key => $village) 
            {
                if($this->Villages->OmEmployees->exists(['village_id'=>$village->id]))
                {
                    $dd = $data['designation'];
                    $om_employee = $this->Villages->OmEmployees->find()->where(['village_id'=>$village->id])->first();
                    $om_employee->$dd = $data['employee_id'];
                }
                else
                {
                    $om_employee = $this->Villages->OmEmployees->newEntity();
                    $om_employee->village_id = $village->id;
                    $om_employee->$data['designation'] = $data['employee_id'];
                }
                $this->Villages->OmEmployees->save($om_employee);
            }
            $this->Flash->success('Saved');
            $user = $this->Villages->EmployeeVillages->Employees->Users->find()->where(['employee_id'=>$data['employee_id']])->first();
            $user->om = 1;
            $this->Villages->EmployeeVillages->Employees->Users->save($user);

            return $this->redirect(['action' => 'addOm']);
        }

        $employeePosts = ['manager_id'=>'Manager','technician_id'=>'Technician'];
        $employees = $this->Villages->EmployeeVillages->Employees->find('list')->where(['work_location'=>'Field']);

        $village = $this->Villages->newEntity();
        $this->set(compact(['states','village','employeePosts','employees']));
    }

    public function deleteUser($id = null,$model=null)
    {
        $village = $this->Villages->$model->get($id);
        $village->is_deleted = 1;
        if ($this->Villages->$model->save($village)) {
            $success = true;
        } else {
            $success = false;
        }
        $this->set(compact(['success','message']));
        $this->set('_serialize', ['success','message']);
    }

    public function getVillage()
    {
        $block_id = $this->request->getData('block_id');

        $villages = $this->Villages->find('list')->where(['block_id'=>$block_id]);
        $this->set(compact('villages'));
        $this->set('_serialize', ['villages']);
    }

    public function setSiteSelection()
    {
        $village = $this->Villages->newEntity();
        $villages = $this->Villages->find('list');
      
        if ($this->request->query('search')) 
        { 
            $villageWork = $this->Villages->VillageWorks->find()->contain(['Villages']);
            if(!empty($this->request->query('village_id')))
            {
                $village_id = $this->request->query('village_id');
                $villageWork->where(['village_id'=>$village_id]);
                
            }
            elseif(!empty($this->request->query('schedule_date')))
            {
                $schedule_date = date('Y-m-d',strtotime($this->request->query('schedule_date')));
                $villageWork->where(['schedule_date'=>$schedule_date]);
            }
            $villageWorks = $this->paginate($villageWork);
        }
        else
        {
           $villageWorks = $this->paginate($this->Villages->VillageWorks->find()->contain(['Villages']));
        }
        if($this->request->is('post'))
        {
            if(!$this->Villages->VillageWorks->exists(['village_id'=>$this->request->getData('village_id')]))
            {
                $work_scheduls = $this->Villages->VillageWorks->WorkSchedules->find();

                foreach ($work_scheduls as $key => $work) {
                    
                    if($key == 0)
                        $data[$key]['schedule_date'] = $this->request->getData('schedule_date');

                    $data[$key]['village_id'] = $this->request->getData('village_id');
                    $data[$key]['work_schedule_id'] = $work->id;
                }

                $village_works = $this->Villages->VillageWorks->newEntities($data);

                if($this->Villages->VillageWorks->saveMany($village_works))
                {
                    foreach ($village_works as $key => $v) {
                        if($v->work_schedule_id == 11)
                            $village_work_id = $v->id;
                    }
                    $village_work = $this->Villages->VillageWorks->Billings->BillingQuestions->find()->select(['billing_question_id'=>'id','answer'=>"'No'",'date'=>"''",'village_work_id'=>"'$village_work_id'"]);
                    $array = json_decode(json_encode($village_work), true);
                    $billing = $this->Villages->VillageWorks->Billings->newEntities($array);
                    $billing = $this->Villages->VillageWorks->Billings->saveMany($billing);
                    $this->Flash->success(__('The Data has been saved.'));

                    return $this->redirect(['action' => 'setSiteSelection']);
                }
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
            }
            else
            {
                $this->Flash->error(__('Allready Done'));
            }
        }
		
		if(!empty($this->request->query('schedule_date')))
		{
			$schedule_date = date('d-m-Y',strtotime($this->request->query('schedule_date')));			
		}

        $this->set(compact('village', 'villages','villageWorks','village_id','schedule_date'));
    }
}
