<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkScheduleRowForms Model
 *
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\BelongsTo $VillageWorks
 * @property \App\Model\Table\WorkScheduleRowsTable|\Cake\ORM\Association\BelongsTo $WorkScheduleRows
 *
 * @method \App\Model\Entity\WorkScheduleRowForm get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkScheduleRowForm findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkScheduleRowFormsTable extends Table
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

        $this->setTable('work_schedule_row_forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VillageWorks', [
            'foreignKey' => 'village_work_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('WorkScheduleRows', [
            'foreignKey' => 'work_schedule_row_id',
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
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->allowEmptyDate('start_date', false);

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->allowEmptyDate('end_date', false);

        // $validator
        //     ->scalar('image')
        //     ->requirePresence('image', 'create')
        //     ->allowEmptyFile('image', false);

        // $validator
        //     ->boolean('is_complete')
        //     ->requirePresence('is_complete', 'create')
        //     ->allowEmptyString('is_complete', false);

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
        $rules->add($rules->existsIn(['village_work_id'], 'VillageWorks'));
        $rules->add($rules->existsIn(['work_schedule_row_id'], 'WorkScheduleRows'));

        return $rules;
    }
}
