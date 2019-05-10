<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageRequests Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\TechniciansTable|\Cake\ORM\Association\BelongsTo $Technicians
 * @property \App\Model\Table\ManagersTable|\Cake\ORM\Association\BelongsTo $Managers
 * @property \App\Model\Table\OmSchedulesTable|\Cake\ORM\Association\BelongsTo $OmSchedules
 * @property \App\Model\Table\AccountingEntriesTable|\Cake\ORM\Association\HasMany $AccountingEntries
 * @property \App\Model\Table\VillageRequestProductsTable|\Cake\ORM\Association\HasMany $VillageRequestProducts
 *
 * @method \App\Model\Entity\VillageRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageRequest|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageRequest findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageRequestsTable extends Table
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

        $this->setTable('village_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Technicians', [
            'foreignKey' => 'technician_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OmSchedules', [
            'foreignKey' => 'om_schedule_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('AccountingEntries', [
            'foreignKey' => 'village_request_id'
        ]);

        $this->hasMany('VillageRequestProducts', [
            'foreignKey' => 'village_request_id'
        ])
        ->setConditions(['or'=>[['om_quantity IS NULL'],['om_quantity >'=>0]]]);
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
        $rules->add($rules->existsIn(['om_schedule_id'], 'OmSchedules'));

        return $rules;
    }
}
