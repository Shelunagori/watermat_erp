<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccountingSerials Model
 *
 * @property \App\Model\Table\AccountingEntriesTable|\Cake\ORM\Association\BelongsTo $AccountingEntries
 * @property |\Cake\ORM\Association\BelongsTo $Vendors
 *
 * @method \App\Model\Entity\AccountingSerial get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccountingSerial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AccountingSerial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccountingSerial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountingSerial|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccountingSerial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccountingSerial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccountingSerial findOrCreate($search, callable $callback = null, $options = [])
 */
class AccountingSerialsTable extends Table
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

        $this->setTable('accounting_serials');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AccountingEntries', [
            'foreignKey' => 'accounting_entry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
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
            ->scalar('serial_no')
            ->maxLength('serial_no', 50)
            ->requirePresence('serial_no', 'create')
            ->allowEmptyString('serial_no', false);

        $validator
            ->date('purchase_date')
            ->allowEmptyDate('purchase_date');

        $validator
            ->date('expiry_date')
            ->allowEmptyDate('expiry_date');

        $validator
            ->scalar('brand_name')
            ->maxLength('brand_name', 50)
            ->allowEmptyString('brand_name');

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
        $rules->add($rules->existsIn(['accounting_entry_id'], 'AccountingEntries'));
        // $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));

        return $rules;
    }
}
