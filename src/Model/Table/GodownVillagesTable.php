<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GodownVillages Model
 *
 * @property \App\Model\Table\GodownsTable|\Cake\ORM\Association\BelongsTo $Godowns
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 *
 * @method \App\Model\Entity\GodownVillage get($primaryKey, $options = [])
 * @method \App\Model\Entity\GodownVillage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GodownVillage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GodownVillage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GodownVillage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GodownVillage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GodownVillage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GodownVillage findOrCreate($search, callable $callback = null, $options = [])
 */
class GodownVillagesTable extends Table
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

        $this->setTable('godown_villages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Godowns', [
            'foreignKey' => 'godown_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['is_main'=>0]);

        $this->belongsTo('Villages', [
            'foreignKey' => 'village_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States');
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
        $rules->add($rules->existsIn(['godown_id'], 'Godowns'));
        $rules->add($rules->existsIn(['village_id'], 'Villages'));

        return $rules;
    }
}
