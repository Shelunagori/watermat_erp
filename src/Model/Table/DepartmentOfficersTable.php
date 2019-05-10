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
 * DepartmentOfficers Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\DoPostsTable|\Cake\ORM\Association\BelongsTo $DoPosts
 * @property \App\Model\Table\DoVillagesTable|\Cake\ORM\Association\HasMany $DoVillages
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\DepartmentOfficer get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentOfficer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentOfficer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentOfficer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentOfficer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentOfficer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentOfficer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentOfficer findOrCreate($search, callable $callback = null, $options = [])
 */
class DepartmentOfficersTable extends Table
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

        $this->setTable('department_officers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DoPosts', [
            'foreignKey' => 'do_post_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('DoVillages', [
            'foreignKey' => 'department_officer_id'
        ]);
        $this->hasOne('Users', [
            'foreignKey' => 'department_officer_id'
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
            ->scalar('contact_no')
            ->maxLength('contact_no', 10)
            ->allowEmptyString('contact_no');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->date('dob')
            ->allowEmptyDate('dob');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['do_post_id'], 'DoPosts'));

        return $rules;
    }
}
