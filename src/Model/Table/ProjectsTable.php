<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Http\Session;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ProjectEmployeesTable|\Cake\ORM\Association\HasMany $ProjectEmployees
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Log');

        $this->hasMany('ProjectEmployees', [
            'foreignKey' => 'project_id'
        ]);

        $this->hasMany('ProjectManagers', [
            'className' => 'ProjectEmployees',
            'foreignKey' => 'project_id'
        ])
        ->setConditions(['designation'=>'Manager']);

        $this->hasMany('ProjectTechnicians', [
            'className' => 'ProjectEmployees',
            'foreignKey' => 'project_id'
        ])
        ->setConditions(['designation'=>'Technician']);

        $this->hasMany('Districts', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Divisions', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Blocks', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Villages', [
            'foreignKey' => 'project_id'
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('project_number')
            ->maxLength('project_number', 50)
            ->requirePresence('project_number', 'create')
            ->allowEmptyString('project_number', false);

        return $validator;
    }
}
