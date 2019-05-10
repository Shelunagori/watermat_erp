<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BillingQuestions Model
 *
 * @property |\Cake\ORM\Association\HasMany $Billings
 *
 * @method \App\Model\Entity\BillingQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\BillingQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BillingQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BillingQuestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillingQuestion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillingQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BillingQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BillingQuestion findOrCreate($search, callable $callback = null, $options = [])
 */
class BillingQuestionsTable extends Table
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

        $this->setTable('billing_questions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Billings', [
            'foreignKey' => 'billing_question_id'
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
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
