<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageWorks Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 * @property \App\Model\Table\WorkSchedulesTable|\Cake\ORM\Association\BelongsTo $WorkSchedules
 * @property \App\Model\Table\CivilsTable|\Cake\ORM\Association\HasMany $Civils
 * @property \App\Model\Table\CommissioningsTable|\Cake\ORM\Association\HasMany $Commissionings
 * @property \App\Model\Table\GlowSignBoardsTable|\Cake\ORM\Association\HasMany $GlowSignBoards
 * @property \App\Model\Table\InstallationsTable|\Cake\ORM\Association\HasMany $Installations
 * @property \App\Model\Table\PlantReceivesTable|\Cake\ORM\Association\HasMany $PlantReceives
 * @property \App\Model\Table\SheltersTable|\Cake\ORM\Association\HasMany $Shelters
 * @property \App\Model\Table\SiteSelectionsTable|\Cake\ORM\Association\HasMany $SiteSelections
 * @property |\Cake\ORM\Association\HasMany $TankReceives
 * @property \App\Model\Table\WorkScheduleRowFormsTable|\Cake\ORM\Association\HasMany $WorkScheduleRowForms
 * @property \App\Model\Table\WorkVerificationsTable|\Cake\ORM\Association\HasMany $WorkVerifications
 *
 * @method \App\Model\Entity\VillageWork get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageWork newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageWork[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageWork|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageWork|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageWork patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageWork[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageWork findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageWorksTable extends Table
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

        $this->setTable('village_works');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('WorkSchedules', [
            'foreignKey' => 'work_schedule_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('Billings', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('Civils', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('Commissionings', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('GlowSignBoards', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('Installations', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('PlantReceives', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('Shelters', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasOne('SiteSelections', [
            'foreignKey' => 'village_work_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('TankReceives', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasMany('WorkScheduleRowForms', [
            'foreignKey' => 'village_work_id'
        ]);
        $this->hasMany('WorkVerifications', [
            'foreignKey' => 'village_work_id'
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
            ->date('schedule_date')
            ->allowEmptyDate('schedule_date');

        $validator
            ->date('complete_date')
            ->allowEmptyDate('complete_date');

        $validator
            ->boolean('is_complete')
            ->allowEmptyString('is_complete');

        $validator
            ->boolean('is_verified')
            ->allowEmptyString('is_verified');

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
        $rules->add($rules->existsIn(['work_schedule_id'], 'WorkSchedules'));

        return $rules;
    }
}
