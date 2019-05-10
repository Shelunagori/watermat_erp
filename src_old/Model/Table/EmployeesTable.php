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
 * Employees Model
 *
 * @property \App\Model\Table\EmployeeDesignationsTable|\Cake\ORM\Association\BelongsTo $EmployeeDesignations
 * @property \App\Model\Table\BanksTable|\Cake\ORM\Association\BelongsTo $Banks
 * @property \App\Model\Table\BankDetailsTable|\Cake\ORM\Association\HasMany $BankDetails
 * @property \App\Model\Table\ProjectEmployeesTable|\Cake\ORM\Association\HasMany $ProjectEmployees
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('EmployeeDesignations', [
            'foreignKey' => 'employee_designation_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProjectEmployees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasOne('Users', [
            'foreignKey' => 'employee_id'
        ]);

        $this->belongsTo('Vendors');
        $this->belongsTo('VendorDesignations');
        $this->belongsTo('DepartmentOfficers');
        $this->belongsTo('Projects');
        $this->belongsTo('States');
        $this->belongsTo('Districts');
        $this->belongsTo('Blocks');
        $this->belongsTo('Divisions');
        $this->belongsTo('Villages');
        $this->belongsTo('Operators');
        $this->belongsTo('DoPosts');
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
            ->date('date_of_joining')
            ->requirePresence('date_of_joining', 'create')
            ->allowEmptyDate('date_of_joining', false);

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 10)
            ->allowEmptyString('contact_no');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('employee_code')
            ->maxLength('employee_code', 255)
            ->requirePresence('employee_code', 'create')
            ->allowEmptyString('employee_code', false);

        $validator
            ->scalar('latitude')
            ->maxLength('latitude', 255)
            ->allowEmptyString('latitude');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 255)
            ->allowEmptyString('longitude');

        $validator
            ->scalar('grade')
            ->maxLength('grade', 255)
            ->allowEmptyString('grade');

        $validator
            ->date('dob')
            ->allowEmptyDate('dob');

        $validator
            ->scalar('work_location')
            ->requirePresence('work_location', 'create')
            ->allowEmptyString('work_location', false);

        $validator
            ->scalar('sub_location')
            ->maxLength('sub_location', 50)
            ->allowEmptyString('sub_location');

        $validator
            ->scalar('pf')
            ->maxLength('pf', 100)
            ->allowEmptyString('pf');

        $validator
            ->scalar('kyc')
            ->maxLength('kyc', 100)
            ->allowEmptyString('kyc');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', false);

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('account_holder_name')
            ->maxLength('account_holder_name', 255)
            ->allowEmptyString('account_holder_name');

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

        $validator
            ->scalar('adhar_card')
            ->allowEmptyString('adhar_card');

        $validator
            ->scalar('dl')
            ->allowEmptyString('dl');

        $validator
            ->scalar('pan_card')
            ->allowEmptyString('pan_card');

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
        $rules->add($rules->existsIn(['employee_designation_id'], 'EmployeeDesignations'));

        return $rules;
    }
}
