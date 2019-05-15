<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plants Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\VendorsTable|\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\AccountingEntriesTable|\Cake\ORM\Association\HasMany $AccountingEntries
 *
 * @method \App\Model\Entity\Plant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plant|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plant findOrCreate($search, callable $callback = null, $options = [])
 */
class PlantsTable extends Table
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

        $this->setTable('plants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'Left'
        ]);
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id'
        ])
        ->setConditions(['vendor_designation_id'=>2]);
        
        $this->hasMany('AccountingEntries', [
            'foreignKey' => 'plant_id'
        ]);

        $this->hasMany('Transports', [
            'foreignKey' => 'plant_id'
        ]);
        $this->belongsTo('PlantReceives');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('complete_date')
            ->allowEmptyDate('complete_date');

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
        $rules->add($rules->existsIn(['village_id'], 'Villages'));
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));

        return $rules;
    }

    public function beforeMarshal($event, $data, $options)
    {
        @$data['name'] ? $data['name'] = strtoupper($data['name']) : '';
    }
}
