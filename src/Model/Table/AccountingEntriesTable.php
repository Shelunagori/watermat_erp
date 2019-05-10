<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccountingEntries Model
 *
 * @property \App\Model\Table\GodownsTable|\Cake\ORM\Association\BelongsTo $Godowns
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\VendorsTable|\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\GodownsTable|\Cake\ORM\Association\BelongsTo $ReceiveGodowns
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\PlantsTable|\Cake\ORM\Association\BelongsTo $Plants
 * @property |\Cake\ORM\Association\BelongsTo $VillageRequests
 * @property |\Cake\ORM\Association\BelongsTo $SubGodownRequests
 * @property \App\Model\Table\AccountingSerialsTable|\Cake\ORM\Association\HasMany $AccountingSerials
 *
 * @method \App\Model\Entity\AccountingEntry get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccountingEntry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AccountingEntry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccountingEntry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountingEntry|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountingEntry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccountingEntry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccountingEntry findOrCreate($search, callable $callback = null, $options = [])
 */
class AccountingEntriesTable extends Table
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

        $this->setTable('accounting_entries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Godowns', [
            'foreignKey' => 'godown_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ]);

        $this->belongsTo('ReceiveGodowns', [
            'className' => 'Godowns',
            'foreignKey' => 'receive_godown_id'
        ]);
        
        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id'
        ]);

        $this->belongsTo('Plants', [
            'foreignKey' => 'plant_id'
        ]);

        $this->belongsTo('VillageRequests', [
            'foreignKey' => 'village_request_id'
        ]);

        $this->belongsTo('SubGodownRequests', [
            'foreignKey' => 'sub_godown_request_id'
        ]);

        $this->hasMany('AccountingSerials', [
            'foreignKey' => 'accounting_entry_id'
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
            ->date('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->allowEmptyDate('transaction_date', false);

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('refer_to')
            ->requirePresence('refer_to', 'create')
            ->allowEmptyString('refer_to', false);

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
        $rules->add($rules->existsIn(['godown_id'], 'Godowns'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['receive_godown_id'], 'ReceiveGodowns'));
        $rules->add($rules->existsIn(['village_id'], 'Villages'));
        $rules->add($rules->existsIn(['plant_id'], 'Plants'));
        $rules->add($rules->existsIn(['village_request_id'], 'VillageRequests'));
        $rules->add($rules->existsIn(['sub_godown_request_id'], 'SubGodownRequests'));

        return $rules;
    }
}
