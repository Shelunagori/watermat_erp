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
 * GramPanchayats Model
 *
 * @property \App\Model\Table\DivisionsTable|\Cake\ORM\Association\BelongsTo $Divisions
 *
 * @method \App\Model\Entity\GramPanchayat get($primaryKey, $options = [])
 * @method \App\Model\Entity\GramPanchayat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GramPanchayat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GramPanchayat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GramPanchayat|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GramPanchayat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GramPanchayat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GramPanchayat findOrCreate($search, callable $callback = null, $options = [])
 */
class GramPanchayatsTable extends Table
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

        $this->setTable('gram_panchayats');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Log');

        $this->belongsTo('Blocks', [
            'foreignKey' => 'block_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('image')
            ->allowEmptyFile('image');

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
        $rules->add($rules->existsIn(['block_id'], 'Blocks'));

        return $rules;
    }
}
