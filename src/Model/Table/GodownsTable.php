<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Godowns Model
 *
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\Godown get($primaryKey, $options = [])
 * @method \App\Model\Entity\Godown newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Godown[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Godown|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Godown|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Godown patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Godown[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Godown findOrCreate($search, callable $callback = null, $options = [])
 */
class GodownsTable extends Table
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

        $this->setTable('godowns');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('VillageRequests');
        $this->belongsTo('SubGodownRequests');

        $this->hasMany('GodownVillages', [
            'foreignKey' => 'employee_id'
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
            ->integer('employee_id')
            ->allowEmptyString('employee_id', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->requirePresence('state', 'create')
            ->allowEmptyString('state', false);

        $validator
            ->scalar('district')
            ->maxLength('district', 100)
            ->requirePresence('district', 'create')
            ->allowEmptyString('district', false);

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->requirePresence('city', 'create')
            ->allowEmptyString('city', false);

        $validator
            ->scalar('area')
            ->maxLength('area', 100)
            ->requirePresence('area', 'create')
            ->allowEmptyString('area', false);

        $validator
            ->boolean('is_main')
            ->requirePresence('is_main', 'create')
            ->allowEmptyString('is_main', false);

        $validator
            ->scalar('image')
            ->allowEmptyFile('image');

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
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
