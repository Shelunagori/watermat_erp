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
 * Vendors Model
 *
 * @property \App\Model\Table\VendorDesignationsTable|\Cake\ORM\Association\BelongsTo $VendorDesignations
 * @property \App\Model\Table\BankDetailsTable|\Cake\ORM\Association\HasMany $BankDetails
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Vendor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vendor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vendor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vendor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vendor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vendor findOrCreate($search, callable $callback = null, $options = [])
 */
class VendorsTable extends Table
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

        $this->setTable('vendors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('VendorDesignations', [
            'foreignKey' => 'vendor_designation_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BankDetails', [
            'foreignKey' => 'vendor_id'
        ]);
        $this->hasOne('Users', [
            'foreignKey' => 'vendor_id'
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
            ->date('date_of_joining')
            ->requirePresence('date_of_joining', 'create')
            ->allowEmptyDate('date_of_joining', false);

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 10)
            ->allowEmptyString('contact_no');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->scalar('gst_no')
            ->maxLength('gst_no', 255)
            ->requirePresence('gst_no', 'create')
            ->allowEmptyString('gst_no', false);

        $validator
            ->scalar('pan_no')
            ->maxLength('pan_no', 12)
            ->allowEmptyString('pan_no');

        $validator
            ->scalar('contact_person')
            ->maxLength('contact_person', 255)
            ->allowEmptyString('contact_person');

        $validator
            ->scalar('contact_person_image')
            ->allowEmptyFile('contact_person_image');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

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

        $validator
            ->scalar('f_c_r_certificate')
            ->allowEmptyString('f_c_r_certificate');

        $validator
            ->scalar('pf_registration_certificate')
            ->allowEmptyString('pf_registration_certificate');

        $validator
            ->scalar('esic_registration_certificate')
            ->allowEmptyString('esic_registration_certificate');

        $validator
            ->scalar('id_proof')
            ->allowEmptyString('id_proof');

        $validator
            ->scalar('payment_term')
            ->allowEmptyString('payment_term');

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
        $rules->add($rules->existsIn(['vendor_designation_id'], 'VendorDesignations'));

        return $rules;
    }
}
