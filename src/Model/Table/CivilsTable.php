<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Civils Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $VillageWorks
 *
 * @method \App\Model\Entity\Civil get($primaryKey, $options = [])
 * @method \App\Model\Entity\Civil newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Civil[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Civil|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civil|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civil patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Civil[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Civil findOrCreate($search, callable $callback = null, $options = [])
 */
class CivilsTable extends Table
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

        $this->setTable('civils');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VillageWorks', [
            'foreignKey' => 'village_work_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('CreateLogins', [
            'className' => 'Users',
            'foreignKey' => 'created_by',
            'bindingKey' => 'id'
        ])->setConditions(['vendor_id Is Not Null']);
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
        $rules->add($rules->existsIn(['created_by'], 'CreateLogins'));

        return $rules;
    }
}
