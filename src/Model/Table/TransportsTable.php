<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transports Model
 *
 * @property \App\Model\Table\PlantsTable|\Cake\ORM\Association\BelongsTo $Plants
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 *
 * @method \App\Model\Entity\Transport get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transport|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transport findOrCreate($search, callable $callback = null, $options = [])
 */
class TransportsTable extends Table
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

        $this->setTable('transports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Plants', [
            'foreignKey' => 'plant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
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
            ->scalar('vendor_name')
            ->maxLength('vendor_name', 255)
            ->requirePresence('vendor_name', 'create')
            ->allowEmptyString('vendor_name', false);

        $validator
            ->date('dispatch_date')
            ->requirePresence('dispatch_date', 'create')
            ->allowEmptyDate('dispatch_date', false);

        $validator
            ->date('expected_delivery_date')
            ->requirePresence('expected_delivery_date', 'create')
            ->allowEmptyDate('expected_delivery_date', false);

        $validator
            ->scalar('vehicle')
            ->maxLength('vehicle', 50)
            ->requirePresence('vehicle', 'create')
            ->allowEmptyString('vehicle', false);

        $validator
            ->scalar('driver_name')
            ->maxLength('driver_name', 50)
            ->requirePresence('driver_name', 'create')
            ->allowEmptyString('driver_name', false);

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 10)
            ->requirePresence('contact_no', 'create')
            ->allowEmptyString('contact_no', false);

        $validator
            ->scalar('vehicle_number')
            ->maxLength('vehicle_number', 15)
            ->requirePresence('vehicle_number', 'create')
            ->allowEmptyString('vehicle_number', false);

        $validator
            ->scalar('bill_no')
            ->maxLength('bill_no', 50)
            ->requirePresence('bill_no', 'create')
            ->allowEmptyString('bill_no', false);

        $validator
            ->scalar('receipt')
            ->requirePresence('receipt', 'create')
            ->allowEmptyString('receipt', false);

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
        $rules->add($rules->existsIn(['plant_id'], 'Plants'));
        $rules->add($rules->existsIn(['village_id'], 'Villages'));

        return $rules;
    }
}
