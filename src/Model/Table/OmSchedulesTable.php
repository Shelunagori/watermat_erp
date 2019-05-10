<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OmSchedules Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\OmScheduleFormsTable|\Cake\ORM\Association\HasMany $OmScheduleForms
 * @property |\Cake\ORM\Association\HasMany $VillageRequests
 *
 * @method \App\Model\Entity\OmSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\OmSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OmSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OmSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmSchedule|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OmSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OmSchedule findOrCreate($search, callable $callback = null, $options = [])
 */
class OmSchedulesTable extends Table
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

        $this->setTable('om_schedules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OmEmployees', [
            'foreignKey' => 'village_id',
            'bindingKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('OmScheduleForms', [
            'foreignKey' => 'om_schedule_id'
        ]);
        $this->hasMany('VillageRequests', [
            'foreignKey' => 'om_schedule_id'
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
            ->date('visit_date')
            ->requirePresence('visit_date', 'create')
            ->allowEmptyDate('visit_date', false);

        $validator
            ->date('visited_on')
            ->allowEmptyDate('visited_on');

        // $validator
        //     ->boolean('is_complete')
        //     ->requirePresence('is_complete', 'create')
        //     ->allowEmptyString('is_complete', false);

        // $validator
        //     ->boolean('is_verify')
        //     ->requirePresence('is_verify', 'create')
        //     ->allowEmptyString('is_verify', false);

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

        return $rules;
    }
}
