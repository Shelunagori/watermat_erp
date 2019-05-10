<?php
namespace App\Controller;
use Cake\Database\Expression\IdentifierExpression;
use App\Controller\AppController;

/**
 * AccountingEntries Controller
 *
 * @property \App\Model\Table\AccountingEntriesTable $AccountingEntries
 *
 * @method \App\Model\Entity\AccountingEntry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountingEntriesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->godown_id = $this->session->read('godown_id');
    }
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Godowns', 'Products', 'Vendors', 'ReceiveGodowns', 'Villages', 'Plants'],
            'order' => ['id'=>'DESC']
        ];

        $accountingEntries = $this->AccountingEntries->find();
        $data = $this->request->getQuery();

        if(!empty($data))
        {
            if($data['godown_id'])
                $accountingEntries->where(['godown_id'=>$data['godown_id']]);

            if($data['product_id'])
                $accountingEntries->where(['product_id'=>$data['product_id']]);

            if($data['from_date'])
                $accountingEntries->where(['transaction_date >='=>date('Y-m-d',strtotime($data['from_date']))]);

            if($data['to_date'])
                $accountingEntries->where(['transaction_date <='=>date('Y-m-d',strtotime($data['to_date']))]);
        }
        
            

        $accountingEntries = $this->paginate($accountingEntries);

        $godowns = $this->AccountingEntries->Godowns->find('list');
        $products = $this->AccountingEntries->Products->find('list');

        $this->set(compact('accountingEntries','godowns','products','godown_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Accounting Entry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountingEntry = $this->AccountingEntries->get($id, [
            'contain' => ['Godowns', 'Products', 'Vendors', 'ReceiveGodowns', 'Villages', 'Plants']
        ]);

        $this->set('accountingEntry', $accountingEntry);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountingEntry = $this->AccountingEntries->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData('data');
            foreach ($data as $key => $d) {
                $data[$key]['godown_id'] = $this->request->getData('godown_id');
                $data[$key]['transaction_date'] = $this->request->getData('transaction_date');
                $data[$key]['refer_to'] = 'purchase';
                $data[$key]['status'] = 'IN';
            }
            $accountingEntry = $this->AccountingEntries->patchEntities($accountingEntry, $data);

            if ($this->AccountingEntries->saveMany($accountingEntry)) {
                $this->Flash->success(__('Products has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The Products could not be saved. Please, try again.'));
        }
        $godowns = $this->AccountingEntries->Godowns->find('list')->where(['is_main'=>1]);
        $products = $this->AccountingEntries->Products->find('all');
        $vendors = $this->AccountingEntries->Vendors->find('list');
        $receiveGodowns = $this->AccountingEntries->ReceiveGodowns->find('list');
        $villages = $this->AccountingEntries->Villages->find('list');
        $plants = $this->AccountingEntries->Plants->find('list');
        $this->set(compact('accountingEntry', 'godowns', 'products', 'vendors', 'receiveGodowns', 'villages', 'plants'));
    }

    public function subGodownTransfer($sub_godown_request_id = null)
    {
        $accountingEntry = $this->AccountingEntries->newEntity();
        if ($this->request->is('post')) {
            $IN_data = $this->request->getData('data');
            $OUT_data = $this->request->getData('data');
            
            foreach ($OUT_data as $key => $d) {
                $OUT_data[$key]['godown_id'] = $this->request->getData('godown_id');
                $OUT_data[$key]['receive_godown_id'] = $this->request->getData('receive_godown_id');
                $OUT_data[$key]['transaction_date'] = $this->request->getData('transaction_date');
                $OUT_data[$key]['refer_to'] = 'godown';
                $OUT_data[$key]['status'] = 'OUT';
                $sub_godown_request_id ? $OUT_data[$key]['sub_godown_request_id'] = $sub_godown_request_id : '';
            }

            foreach ($IN_data as $key => $d) {
                $IN_data[$key]['godown_id'] = $this->request->getData('receive_godown_id');
                $IN_data[$key]['transaction_date'] = $this->request->getData('transaction_date');
                $IN_data[$key]['refer_to'] = 'godown';
                $IN_data[$key]['status'] = 'IN';
                $sub_godown_request_id ? $IN_data[$key]['sub_godown_request_id'] = $sub_godown_request_id : '';
            }
            $data = array_merge($OUT_data,$IN_data);
            $data = $this->AccountingEntries->patchEntities($accountingEntry, $data);

            if ($this->AccountingEntries->saveMany($data)) {
                $this->Flash->success(__('Products has been saved.'));

                return $this->redirect('');
            }
            pr($data);exit;
            $this->Flash->error(__('The Products could not be saved. Please, try again.'));
        }
        $godowns = $this->AccountingEntries->Godowns->find('list')->where(['Godowns.is_main'=>1]);
        $products = $this->AccountingEntries->Products->find('all');
        $receiveGodowns = $this->AccountingEntries->ReceiveGodowns->find('list')->where(['ReceiveGodowns.is_main'=>0]);
        
        $this->set(compact('accountingEntry', 'godowns', 'products', 'receiveGodowns'));
    }

    public function mainGodownTransfer()
    {
        $accountingEntry = $this->AccountingEntries->newEntity();
        if ($this->request->is('post')) {
            $IN_data = $this->request->getData('data');
            $OUT_data = $this->request->getData('data');
            
            foreach ($OUT_data as $key => $d) {
                $OUT_data[$key]['godown_id'] = $this->request->getData('godown_id');
                $OUT_data[$key]['receive_godown_id'] = $this->request->getData('receive_godown_id');
                $OUT_data[$key]['transaction_date'] = $this->request->getData('transaction_date');
                $OUT_data[$key]['refer_to'] = 'godown';
                $OUT_data[$key]['status'] = 'OUT';
            }

            foreach ($IN_data as $key => $d) {
                $IN_data[$key]['godown_id'] = $this->request->getData('receive_godown_id');
                $IN_data[$key]['transaction_date'] = $this->request->getData('transaction_date');
                $IN_data[$key]['refer_to'] = 'godown';
                $IN_data[$key]['status'] = 'IN';
            }
            $data = array_merge($OUT_data,$IN_data);
            $data = $this->AccountingEntries->patchEntities($accountingEntry, $data);

            if ($this->AccountingEntries->saveMany($data)) {
                $this->Flash->success(__('Products has been saved.'));

                return $this->redirect('');
            }
            
            $this->Flash->error(__('The Products could not be saved. Please, try again.'));
        }
        $godowns = $this->AccountingEntries->Godowns->find('list')->where(['Godowns.is_main'=>0]);
        $products = $this->AccountingEntries->Products->find('all');
        $receiveGodowns = $this->AccountingEntries->ReceiveGodowns->find('list')->where(['ReceiveGodowns.is_main'=>1]);
        
        $this->set(compact('accountingEntry', 'godowns', 'products', 'receiveGodowns'));
    }

    public function selectGodown()
    {
        $this->viewBuilder()->setLayout('login');
        $godowns = $this->AccountingEntries->Godowns->find('list')->where(['Godowns.is_main'=>0]);
        if ($this->request->is('post')) {
            $this->session->write('godown_id',$this->request->getData('godown_id'));
            $this->redirect( $this->session->read('refer')[0] );
        }
        $this->set(compact(['godowns']));
    }

    public function villageTransfer($village_request_id = null)
    {
        $accountingEntry = $this->AccountingEntries->newEntity();
        $godown_id = $this->godown_id;

        if ($this->request->is('post')) {

            $data = $this->request->getData('data');
            
            foreach ($data as $key => $d) {
                $data[$key]['village_id'] = $this->request->getData('village_id');
                $data[$key]['godown_id'] = $this->request->getData('godown_id');
                $data[$key]['transaction_date'] = $this->request->getData('transaction_date');
                $data[$key]['refer_to'] = 'village';
                $data[$key]['status'] = 'OUT';
                $village_request_id ? $data[$key]['village_request_id'] = $village_request_id : '';
            }

            $data = $this->AccountingEntries->patchEntities($accountingEntry, $data);

            if ($this->AccountingEntries->saveMany($data)) {
                $this->Flash->success(__('Products has been saved.'));

                return $this->redirect('');
            }

            $this->Flash->error(__('The Products could not be saved. Please, try again.'));
        }
        
        $godowns = $this->AccountingEntries->Godowns->find('list')->where(['Godowns.is_main'=>0]);
        $products = $this->AccountingEntries->Products->find('all');
        $receiveGodowns = $this->AccountingEntries->ReceiveGodowns->find('list');

        $villages = $this->AccountingEntries->Godowns->GodownVillages
                    ->find('list',['keyField'=>'id','valueField'=>'name'])
                    ->select(['id'=>'GodownVillages.village_id','name'=>'Villages.name'])
                    ->contain(['Villages'])->where(['GodownVillages.godown_id'=>$godown_id]);

        $this->set(compact('accountingEntry', 'godowns', 'products', 'villages', 'godown_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accounting Entry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountingEntry = $this->AccountingEntries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountingEntry = $this->AccountingEntries->patchEntity($accountingEntry, $this->request->getData());
            if ($this->AccountingEntries->save($accountingEntry)) {
                $this->Flash->success(__('The accounting entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accounting entry could not be saved. Please, try again.'));
        }
        $godowns = $this->AccountingEntries->Godowns->find('list');
        $products = $this->AccountingEntries->Products->find('list');
        $vendors = $this->AccountingEntries->Vendors->find('list');
        $receiveGodowns = $this->AccountingEntries->ReceiveGodowns->find('list');
        $villages = $this->AccountingEntries->Villages->find('list');
        $plants = $this->AccountingEntries->Plants->find('list');
        $this->set(compact('accountingEntry', 'godowns', 'products', 'vendors', 'receiveGodowns', 'villages', 'plants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accounting Entry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountingEntry = $this->AccountingEntries->get($id);
        if ($this->AccountingEntries->delete($accountingEntry)) {
            $this->Flash->success(__('The accounting entry has been deleted.'));
        } else {
            $this->Flash->error(__('The accounting entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getAvailable()
    {
        $id = $this->request->getData('product_id');
        $godown_id = $this->request->getData('godown_id');

        $available_product_serial = $this->AccountingEntries->AccountingSerials->find();
        $IN = $available_product_serial->newExpr()
        ->addCase(
            $available_product_serial->newExpr()->add(['status' => 'IN']),
            1,
            'integer'
        );

        $OUT = $available_product_serial->newExpr()
        ->addCase(
            $available_product_serial->newExpr()->add(['status' => 'OUT']),
            1,
            'integer'
        );

        $available_product_serial->select(['s_no'=>'AccountingSerials.serial_no','brand_name'=>'AccountingSerials.brand_name','purchase'=>'AccountingSerials.purchase_date','expiry'=>'AccountingSerials.expiry_date','vendor'=>'Vendors.name','vendor_id'=>'Vendors.id','qty'=>'AccountingEntries.quantity'])
                ->select([
                'in' => $available_product_serial->func()->count($IN),
                'out' => $available_product_serial->func()->count($OUT)
            ])
        ->innerJoinWith('AccountingEntries')
        ->where(['AccountingEntries.product_id'=>$id,'AccountingEntries.godown_id'=>$godown_id])
        ->contain(['Vendors'])
        ->group(['serial_no'])
        ->having(['`in` > `out`']);

        if($available_product_serial->isEmpty())
            $success = 0;
        else
            $success = 1;

        $this->set(compact(['success','available_product_serial']));
        $this->set('_serialize',['success','available_product_serial']);
    }

    public function checkStock()
    {
        $id = $this->request->getData('product_id');
        $godown_id = $this->request->getData('godown_id');
        
        $query = $this->AccountingEntries->find();
        $available = $query->newExpr()
            ->addCase(
                [$query->newExpr()->eq('status', 'IN')],
                [new IdentifierExpression('quantity'), new IdentifierExpression('quantity * -1')],
                ['string','string']
            );

        $data = $query->select([
            'available' => $query->func()->sum($available)
        ])->where(['product_id'=>$id,'godown_id'=>$godown_id])->first();

        if($data->available)
            $response = $data->available;
        else
            $response = 0;

        $this->set(compact(['response']));
        $this->set('_serialize',['response']);
    }

    public function addProductRequest($godown_id = null)
    {
        $product_request = $this->AccountingEntries->SubGodownRequests->newEntity();
        $godown_id = $this->session->read('godown_id');

        if ($this->request->is('post')) {

            $data = $this->AccountingEntries->SubGodownRequests->patchEntity($product_request, $this->request->getData());
            $data->godown_id = $godown_id;

            if ($this->AccountingEntries->SubGodownRequests->save($data)) {
                $this->Flash->success(__('Request Submited.'));

                return $this->redirect('');
            }

            $this->Flash->error(__('Request could not be submit. Please, try again.'));
        }
        $products = $this->AccountingEntries->Products->find('list');

        $this->set(compact('product_request', 'products', 'godown_id'));
    }

    public function godownRequest()
    {
        $godownRequests = $this->AccountingEntries->SubGodownRequests->find()->where()
                        ->contain(['SubGodownRequestProducts'=>function($q)
                        { 
                            return $q->select(['product'=>'Products.name'])
                                    ->select($this->AccountingEntries->SubGodownRequests->SubGodownRequestProducts)
                                    ->contain(['Products']);
                            
                        }])
                        ->where(['status'=>'pending'])
                        ->contain(['Godowns']);

        $this->set(compact('godown_id', 'godownRequests'));
    }

    public function stockReport($godown_id = null)
    {
        $stocks = $this->AccountingEntries->Products->find();
        $available = $stocks->newExpr()
            ->addCase(
                [$stocks->newExpr()->eq('AccountingEntries.status', 'IN')],
                [new IdentifierExpression('quantity'), new IdentifierExpression('quantity * -1')],
                ['string','string']
            );
        $stocks->select($this->AccountingEntries->Products)
                ->select(['quantity' => $stocks->func()->sum($available) ])
                ->innerJoinWith('AccountingEntries')
                ->group('Products.id');

        if($godown_id)
            $stocks->where(['AccountingEntries.godown_id'=>$godown_id]);

        $stocks = $this->paginate($stocks);
        $godowns = $this->AccountingEntries->Godowns->find('list');
        $this->set(compact('godown_id', 'stocks','godowns'));
    }

    public function markRequestSent($id)
    {
        $godownRequests = $this->AccountingEntries->SubGodownRequests->get($id);
        $godownRequests->status = 'sent';

        if($this->AccountingEntries->SubGodownRequests->save($godownRequests))
            $success = true;
        else
            $success = false;

        echo $success;exit;
    }
}
