<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shelters Model
 *
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\BelongsTo $VillageWorks
 *
 * @method \App\Model\Entity\Shelter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shelter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Shelter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shelter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shelter|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shelter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shelter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shelter findOrCreate($search, callable $callback = null, $options = [])
 */
class SheltersTable extends Table
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

        $this->setTable('shelters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VillageWorks', [
            'foreignKey' => 'village_work_id',
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
            ->boolean('delivered')
            ->allowEmptyString('delivered');

        $validator
            ->date('delivered_date')
            ->allowEmptyDate('delivered_date');

        $validator
            ->boolean('installation_started')
            ->allowEmptyString('installation_started');

        $validator
            ->date('installation_start_date')
            ->allowEmptyDate('installation_start_date');

        $validator
            ->boolean('installation_complete')
            ->allowEmptyString('installation_complete');

        $validator
            ->date('installation_complete_date')
            ->allowEmptyDate('installation_complete_date');

        $validator
            ->boolean('canopy_installed')
            ->allowEmptyString('canopy_installed');

        $validator
            ->date('canopy_installed_date')
            ->allowEmptyDate('canopy_installed_date');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', false);

        $validator
            ->boolean('is_verified')
            ->allowEmptyString('is_verified');

        $validator
            ->integer('verified_by')
            ->allowEmptyString('verified_by');

        $validator
            ->scalar('damages_visible')
            ->allowEmptyString('damages_visible');

        $validator
            ->scalar('verify_remark')
            ->allowEmptyString('verify_remark');

        $validator
            ->scalar('verify_image')
            ->allowEmptyFile('verify_image');

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
        $rules->add($rules->existsIn(['village_work_id'], 'VillageWorks'));

        return $rules;
    }
}
