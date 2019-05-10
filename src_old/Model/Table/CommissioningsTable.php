<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commissionings Model
 *
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\BelongsTo $VillageWorks
 *
 * @method \App\Model\Entity\Commissioning get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commissioning newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commissioning[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commissioning|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commissioning|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commissioning patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commissioning[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commissioning findOrCreate($search, callable $callback = null, $options = [])
 */
class CommissioningsTable extends Table
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

        $this->setTable('commissionings');
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
        $rules->add($rules->existsIn(['village_work_id'], 'VillageWorks'));

        return $rules;
    }
}
