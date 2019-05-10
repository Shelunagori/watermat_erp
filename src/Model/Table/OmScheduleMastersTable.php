<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OmScheduleMasters Model
 *
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 *
 * @method \App\Model\Entity\OmScheduleMaster get($primaryKey, $options = [])
 * @method \App\Model\Entity\OmScheduleMaster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OmScheduleMaster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OmScheduleMaster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmScheduleMaster|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OmScheduleMaster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OmScheduleMaster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OmScheduleMaster findOrCreate($search, callable $callback = null, $options = [])
 */
class OmScheduleMastersTable extends Table
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

        $this->setTable('om_schedule_masters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
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
            ->integer('days')
            ->requirePresence('days', 'create')
            ->allowEmptyString('days', false);

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

        return $rules;
    }
}
