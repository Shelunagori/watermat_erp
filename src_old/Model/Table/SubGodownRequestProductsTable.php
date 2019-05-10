<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubGodownRequestProducts Model
 *
 * @property \App\Model\Table\SubGodownRequestsTable|\Cake\ORM\Association\BelongsTo $SubGodownRequests
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\SubGodownRequestProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubGodownRequestProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class SubGodownRequestProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Log');

        $this->setTable('sub_godown_request_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SubGodownRequests', [
            'foreignKey' => 'sub_godown_request_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        $validator
            ->decimal('om_quantity')
            ->allowEmptyString('om_quantity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sub_godown_request_id'], 'SubGodownRequests'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
