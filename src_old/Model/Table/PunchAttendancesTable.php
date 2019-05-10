<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PunchAttendances Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PunchAttendance get($primaryKey, $options = [])
 * @method \App\Model\Entity\PunchAttendance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PunchAttendance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PunchAttendance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PunchAttendance|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PunchAttendance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PunchAttendance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PunchAttendance findOrCreate($search, callable $callback = null, $options = [])
 */
class PunchAttendancesTable extends Table
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

        $this->setTable('punch_attendances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('start_points')
            ->requirePresence('start_points', 'create')
            ->allowEmptyString('start_points', false);

        $validator
            ->scalar('end_points')
            ->requirePresence('end_points', 'create')
            ->allowEmptyString('end_points', false);

        $validator
            ->decimal('distance')
            ->requirePresence('distance', 'create')
            ->allowEmptyString('distance', false);

        $validator
            ->scalar('vehicle')
            ->maxLength('vehicle', 50)
            ->requirePresence('vehicle', 'create')
            ->allowEmptyString('vehicle', false);

        $validator
            ->decimal('price_pr_km')
            ->requirePresence('price_pr_km', 'create')
            ->allowEmptyString('price_pr_km', false);

        $validator
            ->scalar('travel_from')
            ->maxLength('travel_from', 50)
            ->allowEmptyString('travel_from');

        $validator
            ->scalar('travel_to')
            ->maxLength('travel_to', 50)
            ->allowEmptyString('travel_to');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('reason')
            ->allowEmptyString('reason');

        $validator
            ->numeric('total_amount')
            ->allowEmptyString('total_amount');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
