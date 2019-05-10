<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function productList()
    {
        $products = $this->Products->find()->select(['id'=>'Products.id','name'=>'Products.name','unit'=>'Units.name'])->contain(['Units']);
        if($products)
        {
            $success = true;
            $message = "products Found";
        }
        else
        {
            $success = false;
            $message = "No product Found";
        }

        $this->set(compact(['success','message','products']));
        $this->set('_serialize', ['success','message','products']);
    }
}
