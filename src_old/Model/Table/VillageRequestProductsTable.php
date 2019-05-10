<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageRequestProducts Model
 *
 * @property \App\Model\Table\VillageRequestsTable|\Cake\ORM\Association\BelongsTo $VillageRequests
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\VillageRequestProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageRequestProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageRequestProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageRequestProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageRequestProduct|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageRequestProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageRequestProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageRequestProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageRequestProductsTable extends Table
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

        $this->setTable('village_request_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VillageRequests', [
            'foreignKey' => 'village_request_id',
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
        $rules->add($rules->existsIn(['village_request_id'], 'VillageRequests'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
