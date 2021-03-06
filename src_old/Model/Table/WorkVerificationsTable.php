<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkVerifications Model
 *
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\BelongsTo $VillageWorks
 * @property \App\Model\Table\WorkScheduleRowsTable|\Cake\ORM\Association\BelongsTo $WorkScheduleRows
 *
 * @method \App\Model\Entity\WorkVerification get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkVerification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkVerification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkVerification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkVerification|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkVerification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkVerification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkVerification findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkVerificationsTable extends Table
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

        $this->setTable('work_verifications');
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
            ->boolean('is_satisfied')
            ->requirePresence('is_satisfied', 'create')
            ->allowEmptyString('is_satisfied', false);

        $validator
            ->scalar('image')
            ->allowEmptyFile('image');

        $validator
            ->scalar('remarks')
            ->allowEmptyString('remarks');

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
