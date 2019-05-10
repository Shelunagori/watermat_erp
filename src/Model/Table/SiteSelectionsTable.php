<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteSelections Model
 *
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\BelongsTo $VillageWorks
 * @property \App\Model\Table\GramPanchayatsTable|\Cake\ORM\Association\BelongsTo $GramPanchayats
 * @property \App\Model\Table\MlaConstituenciesTable|\Cake\ORM\Association\BelongsTo $MlaConstituencies
 *
 * @method \App\Model\Entity\SiteSelection get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteSelection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteSelection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteSelection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteSelection|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteSelection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteSelection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteSelection findOrCreate($search, callable $callback = null, $options = [])
 */
class SiteSelectionsTable extends Table
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

        $this->setTable('site_selections');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VillageWorks', [
            'foreignKey' => 'village_work_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('GramPanchayats', [
            'foreignKey' => 'gram_panchayat_id'
        ]);
        $this->belongsTo('MlaConstituencies', [
            'foreignKey' => 'mla_constituency_id'
        ]);
        
        $this->belongsTo('Verifies', [
            'className' => 'Users',
            'foreignKey' => 'verified_by',
            'bindingKey' => 'id'
        ])->setConditions(['department_officer_id Is Not Null']);

        $this->belongsTo('CreateLogins', [
            'className' => 'Users',
            'foreignKey' => 'created_by',
            'bindingKey' => 'id'
        ])->setConditions(['employee_id Is Not Null']);
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
            ->date('date')
            ->allowEmptyDate('date');

        $validator
            ->scalar('gps_co_ordinates')
            ->allowEmptyString('gps_co_ordinates');

        $validator
            ->scalar('lendmark')
            ->maxLength('lendmark', 255)
            ->allowEmptyString('lendmark');

        $validator
            ->scalar('sarpanch')
            ->maxLength('sarpanch', 50)
            ->allowEmptyString('sarpanch');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 12)
            ->allowEmptyString('mobile');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('borewell_available')
            ->allowEmptyString('borewell_available');

        $validator
            ->scalar('borewell_distance')
            ->maxLength('borewell_distance', 255)
            ->allowEmptyString('borewell_distance');

        $validator
            ->scalar('borewell_unit')
            ->maxLength('borewell_unit', 50)
            ->allowEmptyString('borewell_unit');

        $validator
            ->scalar('electricity_available')
            ->allowEmptyString('electricity_available');

        $validator
            ->scalar('electricity_distance')
            ->maxLength('electricity_distance', 255)
            ->allowEmptyString('electricity_distance');

        $validator
            ->scalar('electricity_unit')
            ->maxLength('electricity_unit', 50)
            ->allowEmptyString('electricity_unit');

        $validator
            ->scalar('moter_lowered')
            ->allowEmptyString('moter_lowered');

        $validator
            ->scalar('moter_distance')
            ->maxLength('moter_distance', 255)
            ->allowEmptyString('moter_distance');

        $validator
            ->scalar('moter_unit')
            ->maxLength('moter_unit', 50)
            ->allowEmptyString('moter_unit');

        $validator
            ->scalar('raw_water_tds')
            ->maxLength('raw_water_tds', 255)
            ->allowEmptyString('raw_water_tds');

        $validator
            ->scalar('obstacle')
            ->allowEmptyString('obstacle');

        $validator
            ->scalar('image')
            ->allowEmptyFile('image');

        $validator
            ->scalar('remark')
            ->allowEmptyString('remark');

        // $validator
        //     ->boolean('is_complete')
        //     ->requirePresence('is_complete', 'create')
        //     ->allowEmptyString('is_complete', false);

        // $validator
        //     ->boolean('is_verified')
        //     ->requirePresence('is_verified', 'create')
        //     ->allowEmptyString('is_verified', false);

        // $validator
        //     ->integer('verified_by')
        //     ->allowEmptyString('verified_by');

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
        $rules->add($rules->existsIn(['village_work_id'], 'VillageWorks'));
        $rules->add($rules->existsIn(['gram_panchayat_id'], 'GramPanchayats'));
        $rules->add($rules->existsIn(['mla_constituency_id'], 'MlaConstituencies'));
        $rules->add($rules->existsIn(['verified_by'], 'Verifies'));
        $rules->add($rules->existsIn(['created_by'], 'CreateLogins'));

        return $rules;
    }
}
