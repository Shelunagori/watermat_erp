<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
/**
 * MlaConstituencies Controller
 *
 * @property \App\Model\Table\MlaConstituenciesTable $MlaConstituencies
 *
 * @method \App\Model\Entity\MlaConstituency[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MlaConstituenciesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['view','getBillings']);
        $this->project_id = $this->session->read('project_id');

        if(!$this->project_id && $this->request->getParam('_ext') != 'json')
            return $this->redirect(['controller'=>'Users','action' => 'selectProject']);
    }
    
    public function index($id = null)
    {
        if($id)
            $mlaConstituency = $this->MlaConstituencies->get($id);
        else
            $mlaConstituency = $this->MlaConstituencies->newEntity();

        $old_image = $mlaConstituency->image;

        $this->paginate = [
            'contain' => ['Projects', 'Blocks']
        ];
        if ($this->request->query('search')) 
        { 
            $mlaConstituencie = $this->MlaConstituencies->find();
            if(!empty($this->request->query('block_id')))
            {
                $block_id = $this->request->query('block_id');
                $mlaConstituencie->where(['block_id'=>$block_id]);
                
            }
            elseif(!empty($this->request->query('name')))
            {
                $name = $this->request->query('name');
                $mlaConstituencie->where(function (QueryExpression $exp, Query $q) use($name) {
                    return $exp->like('MlaConstituencies.name', '%'.$name.'%');
                });
            }
            $mlaConstituencies = $this->paginate($mlaConstituencie);
        }
        else
        {
           $mlaConstituencies = $this->paginate($this->MlaConstituencies);
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $mlaConstituency = $this->MlaConstituencies->patchEntity($mlaConstituency, $this->request->getData());
            $mlaConstituency->project_id = $this->project_id;
            $mlaConstituency->image = $this->Help->upload($_FILES['image'],$old_image);

            if ($this->MlaConstituencies->save($mlaConstituency)) {
                $this->Flash->success(__('The mla constituency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mla constituency could not be saved. Please, try again.'));
        }

        $divisions = $this->MlaConstituencies->Blocks->find('list');
        $this->set(compact('mlaConstituency', 'mlaConstituencies', 'divisions'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mlaConstituency = $this->MlaConstituencies->get($id);
        if ($this->MlaConstituencies->delete($mlaConstituency)) {
            $this->Flash->success(__('The mla constituency has been deleted.'));
        } else {
            $this->Flash->error(__('The mla constituency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
