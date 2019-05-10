<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Plants Controller
 *
 * @property \App\Model\Table\PlantsTable $Plants
 *
 * @method \App\Model\Entity\Plant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlantsController extends AppController
{
    public function myPlants()
    {
        $vendor_id = $this->request->getData('vendor_id');

        if($vendor_id)
        {
            $plants = $this->Plants->find()->where(['vendor_id'=>$vendor_id])
            ->contain(['AccountingEntries'=>function($q){
                return $q->select(['plant_id','product'=>'Products.name','unit'=>'Units.name','quantity'=>'AccountingEntries.quantity','serial_no'=>'AccountingSerials.serial_no','purchase_date'=>'AccountingSerials.purchase_date','expiry_date'=>'AccountingSerials.expiry_date','make'=>'AccountingSerials.brand_name'])->leftJoinWith('AccountingSerials')->contain(['Products'=>'Units']);
            }])
            ->order('complete_date');

            if($plants)
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

        $this->set(compact(['success','message','plants']));
        $this->set('_serialize', ['success','message','plants']);
    }

    public function plantComplete()
    {
        $id = $this->request->getData('plant_id');
        $data = $this->request->getData();

        if($id)
        {
            $plant = $this->Plants->get($id);
            $plant->complete_date = date('Y-m-d');
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

            if($this->Plants->save($plant))
            {
                $success = true;
                $message = "Saved";
            }
            else
            {
                $success = false;
                $message = "Unable to save";
            }
        }

        $this->set(compact(['success','message','plant']));
        $this->set('_serialize', ['success','message','plant']);
    }

}
