<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OmScheduleForms Model
 *
 * @property \App\Model\Table\OmSchedulesTable|\Cake\ORM\Association\BelongsTo $OmSchedules
 *
 * @method \App\Model\Entity\OmScheduleForm get($primaryKey, $options = [])
 * @method \App\Model\Entity\OmScheduleForm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OmScheduleForm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OmScheduleForm|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmScheduleForm|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmScheduleForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OmScheduleForm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OmScheduleForm findOrCreate($search, callable $callback = null, $options = [])
 */
class OmScheduleFormsTable extends Table
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

        $this->setTable('om_schedule_forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('OmSchedules', [
            'foreignKey' => 'om_schedule_id',
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
            ->scalar('plant_status')
            ->requirePresence('plant_status', 'create')
            ->allowEmptyString('plant_status', false);

        $validator
            ->scalar('plant_service')
            ->requirePresence('plant_service', 'create')
            ->allowEmptyString('plant_service', false);

        $validator
            ->scalar('reason')
            ->allowEmptyString('reason');

        $validator
            ->decimal('treated_water_flow')
            ->requirePresence('treated_water_flow', 'create')
            ->allowEmptyString('treated_water_flow', false);

        $validator
            ->scalar('twf_image')
            ->requirePresence('twf_image', 'create')
            ->allowEmptyFile('twf_image', false);

        $validator
            ->decimal('reject_flow')
            ->requirePresence('reject_flow', 'create')
            ->allowEmptyString('reject_flow', false);

        $validator
            ->scalar('reject_image')
            ->requirePresence('reject_image', 'create')
            ->allowEmptyFile('reject_image', false);

        $validator
            ->scalar('dosing')
            ->requirePresence('dosing', 'create')
            ->allowEmptyString('dosing', false);

        $validator
            ->integer('card_issued')
            ->requirePresence('card_issued', 'create')
            ->allowEmptyString('card_issued', false);

        $validator
            ->decimal('card_amount')
            ->requirePresence('card_amount', 'create')
            ->allowEmptyString('card_amount', false);

        $validator
            ->decimal('recharge')
            ->requirePresence('recharge', 'create')
            ->allowEmptyString('recharge', false);

        $validator
            ->integer('card_operator')
            ->requirePresence('card_operator', 'create')
            ->allowEmptyString('card_operator', false);

        $validator
            ->decimal('amount_collected')
            ->requirePresence('amount_collected', 'create')
            ->allowEmptyString('amount_collected', false);

        $validator
            ->decimal('amount_operator')
            ->requirePresence('amount_operator', 'create')
            ->allowEmptyString('amount_operator', false);

        $validator
            ->integer('ro_meter_reading')
            ->requirePresence('ro_meter_reading', 'create')
            ->allowEmptyString('ro_meter_reading', false);

        $validator
            ->scalar('ro_image')
            ->requirePresence('ro_image', 'create')
            ->allowEmptyFile('ro_image', false);

        $validator
            ->scalar('remark')
            ->allowEmptyString('remark');

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
        $rules->add($rules->existsIn(['om_schedule_id'], 'OmSchedules'));

        return $rules;
    }
}
