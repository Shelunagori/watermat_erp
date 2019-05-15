<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkScheduleRows Model
 *
 * @property \App\Model\Table\WorkSchedulesTable|\Cake\ORM\Association\BelongsTo $WorkSchedules
 * @property |\Cake\ORM\Association\HasMany $WorkScheduleRowForms
 * @property |\Cake\ORM\Association\HasMany $WorkVerifications
 *
 * @method \App\Model\Entity\WorkScheduleRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkScheduleRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkScheduleRow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkScheduleRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRow findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkScheduleRowsTable extends Table
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

        $this->setTable('work_schedule_rows');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('WorkSchedules', [
            'foreignKey' => 'work_schedule_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('WorkScheduleRowForms', [
            'foreignKey' => 'work_schedule_row_id'
        ]);
        $this->hasMany('WorkVerifications', [
            'foreignKey' => 'work_schedule_row_id'
        ]);
        $this->hasOne('WorkSatisfactions', [
            'className' => 'WorkVerifications',
            'foreignKey' => 'work_schedule_row_id'
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

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
        $rules->add($rules->existsIn(['work_schedule_id'], 'WorkSchedules'));

        return $rules;
    }
}
