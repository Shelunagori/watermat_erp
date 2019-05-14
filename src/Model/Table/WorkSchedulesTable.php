<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkSchedules Model
 *
 * @property |\Cake\ORM\Association\HasMany $VillageWorks
 * @property |\Cake\ORM\Association\HasMany $WorkScheduleRows
 *
 * @method \App\Model\Entity\WorkSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkSchedule|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkSchedule findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkSchedulesTable extends Table
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

        $this->setTable('work_schedules');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('VillageWorks', [
            'foreignKey' => 'work_schedule_id'
        ]);
        $this->hasOne('VillageWorkReports', [
            'className' =>'VillageWorks',
            'foreignKey' => 'work_schedule_id'
        ]);
        $this->hasMany('WorkScheduleRows', [
            'foreignKey' => 'work_schedule_id'
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

        $validator
            ->integer('days')
            ->allowEmptyString('days');

        $validator
            ->scalar('model')
            ->maxLength('model', 50)
            ->allowEmptyString('model');

        return $validator;
    }
}
