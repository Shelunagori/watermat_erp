<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OmEmployees Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Technicians
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Managers
 *
 * @method \App\Model\Entity\OmEmployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\OmEmployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OmEmployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OmEmployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmEmployee|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmEmployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OmEmployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OmEmployee findOrCreate($search, callable $callback = null, $options = [])
 */
class OmEmployeesTable extends Table
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

        $this->setTable('om_employees');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Technicians', [
            'className' => 'Employees',
            'foreignKey' => 'technician_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['Technicians.work_location'=>'Field']);
        
        $this->belongsTo('Managers', [
            'className' => 'Employees',
            'foreignKey' => 'manager_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['Managers.work_location'=>'Field']);

        $this->belongsTo('OmSchedules',[
            'foreignKey' => 'village_id',
            'bindingKey' => 'village_id'
        ]);
        $this->belongsTo('OmScheduleMasters',[
            'foreignKey' => 'village_id',
            'bindingKey' => 'village_id'
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
        $rules->add($rules->existsIn(['technician_id'], 'Technicians'));
        $rules->add($rules->existsIn(['manager_id'], 'Managers'));

        return $rules;
    }
}
