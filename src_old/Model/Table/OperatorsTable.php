<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Operators Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\IncentivePlansTable|\Cake\ORM\Association\BelongsTo $IncentivePlans
 *
 * @method \App\Model\Entity\Operator get($primaryKey, $options = [])
 * @method \App\Model\Entity\Operator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Operator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Operator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operator|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Operator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Operator findOrCreate($search, callable $callback = null, $options = [])
 */
class OperatorsTable extends Table
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

        $this->setTable('operators');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        // $this->belongsTo('IncentivePlans', [
        //     'foreignKey' => 'incentive_plan_id'
        // ]);
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
            ->scalar('father_name')
            ->maxLength('father_name', 255)
            ->requirePresence('father_name', 'create')
            ->allowEmptyString('father_name', false);

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 10)
            ->allowEmptyString('contact_no');

        $validator
            ->scalar('qualification')
            ->maxLength('qualification', 255)
            ->allowEmptyString('qualification');

        $validator
            ->scalar('aadhar_number')
            ->maxLength('aadhar_number', 12)
            ->requirePresence('aadhar_number', 'create')
            ->allowEmptyString('aadhar_number', false);

        $validator
            ->scalar('pan_number')
            ->maxLength('pan_number', 10)
            ->allowEmptyString('pan_number');

        $validator
            ->date('date_of_appointment')
            ->requirePresence('date_of_appointment', 'create')
            ->allowEmptyDate('date_of_appointment', false);

        $validator
            ->date('salary_paid_upto')
            ->allowEmptyDate('salary_paid_upto');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', false);

        $validator
            ->scalar('id_proof')
            ->allowEmptyString('id_proof');

        $validator
            ->scalar('account_holder_name')
            ->maxLength('account_holder_name', 255)
            ->allowEmptyString('account_holder_name');

        $validator
            ->scalar('bank')
            ->maxLength('bank', 255)
            ->allowEmptyString('bank');

        $validator
            ->scalar('account_no')
            ->maxLength('account_no', 255)
            ->allowEmptyString('account_no');

        $validator
            ->scalar('ifsc_code')
            ->maxLength('ifsc_code', 11)
            ->allowEmptyString('ifsc_code');

        $validator
            ->scalar('branch')
            ->maxLength('branch', 255)
            ->allowEmptyString('branch');

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
        // $rules->add($rules->existsIn(['incentive_plan_id'], 'IncentivePlans'));

        return $rules;
    }
}
