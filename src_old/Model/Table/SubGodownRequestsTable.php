<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubGodownRequests Model
 *
 * @property \App\Model\Table\GodownsTable|\Cake\ORM\Association\BelongsTo $Godowns
 * @property \App\Model\Table\AccountingEntriesTable|\Cake\ORM\Association\HasMany $AccountingEntries
 * @property \App\Model\Table\SubGodownRequestProductsTable|\Cake\ORM\Association\HasMany $SubGodownRequestProducts
 *
 * @method \App\Model\Entity\SubGodownRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubGodownRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubGodownRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubGodownRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubGodownRequest|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubGodownRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubGodownRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubGodownRequest findOrCreate($search, callable $callback = null, $options = [])
 */
class SubGodownRequestsTable extends Table
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

        $this->setTable('sub_godown_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Godowns', [
            'foreignKey' => 'godown_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['is_main'=>0]);
        
        $this->hasMany('AccountingEntries', [
            'foreignKey' => 'sub_godown_request_id'
        ]);
        $this->hasMany('SubGodownRequestProducts', [
            'foreignKey' => 'sub_godown_request_id'
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

        // $validator
        //     ->scalar('status')
        //     ->requirePresence('status', 'create')
        //     ->allowEmptyString('status', false);

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

        return $rules;
    }
}
