<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Villages Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\DivisionsTable|\Cake\ORM\Association\BelongsTo $Divisions
 * @property \App\Model\Table\DoVillagesTable|\Cake\ORM\Association\HasMany $DoVillages
 * @property \App\Model\Table\EmployeeVillagesTable|\Cake\ORM\Association\HasMany $EmployeeVillages
 * @property |\Cake\ORM\Association\HasMany $OmEmployees
 * @property |\Cake\ORM\Association\HasMany $OmScheduleMasters
 * @property |\Cake\ORM\Association\HasMany $OmSchedules
 * @property \App\Model\Table\VendorVillagesTable|\Cake\ORM\Association\HasMany $VendorVillages
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\HasMany $VillageWorks
 *
 * @method \App\Model\Entity\Village get($primaryKey, $options = [])
 * @method \App\Model\Entity\Village newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Village[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Village|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Village|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Village patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Village[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Village findOrCreate($search, callable $callback = null, $options = [])
 */
class VillagesTable extends Table
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

        $this->setTable('villages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Blocks', [
            'foreignKey' => 'block_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('DoVillages', [
            'foreignKey' => 'village_id'
        ]);

        $this->hasMany('EmployeeVillages', [
            'foreignKey' => 'village_id'
        ]);
        
        $this->hasMany('OmEmployees', [
            'foreignKey' => 'village_id'
        ]);

        $this->hasOne('OmEmployees', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('GodownVillages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('OmScheduleMasters', [
            'foreignKey' => 'village_id'
        ]);

        $this->hasMany('OmSchedules', [
            'foreignKey' => 'village_id'
        ]);

        $this->hasMany('VendorVillages', [
            'foreignKey' => 'village_id',
            'saveStrategy' =>'replace'
        ]);

        $this->hasMany('VillageWorks', [
            'foreignKey' => 'village_id'
        ]);

        $this->hasOne('SiteWorks', [
            'className' => 'VillageWorks',
            'foreignKey' => 'village_id'
        ])
        ->setConditions(['SiteWorks.work_schedule_id'=>1]);

        $this->hasOne('Operators', [
            'foreignKey' => 'village_id'
        ]);

        $this->hasMany('VillageRequests', [
            'foreignKey' => 'village_id'
        ]);
        
        $this->belongsTo('States');
        $this->belongsTo('DoPosts');
        $this->belongsTo('ApiVersions');
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->integer('population')
            ->requirePresence('population', 'create')
            ->allowEmptyString('population', false);

        $validator
            ->scalar('no_household')
            ->maxLength('no_household', 255)
            ->allowEmptyString('no_household');

        $validator
            ->scalar('latitude')
            ->maxLength('latitude', 255)
            ->allowEmptyString('latitude');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 255)
            ->allowEmptyString('longitude');

        $validator
            ->scalar('customer_care')
            ->maxLength('customer_care', 10)
            ->allowEmptyString('customer_care');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', false);

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['block_id'], 'Blocks'));

        return $rules;
    }
}
