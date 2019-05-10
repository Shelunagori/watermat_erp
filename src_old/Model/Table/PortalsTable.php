<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Portals Model
 *
 * @property \App\Model\Table\UserRightsTable|\Cake\ORM\Association\HasMany $UserRights
 *
 * @method \App\Model\Entity\Portal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Portal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Portal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Portal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Portal|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Portal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Portal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Portal findOrCreate($search, callable $callback = null, $options = [])
 */
class PortalsTable extends Table
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

        $this->setTable('portals');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('UserRights', [
            'foreignKey' => 'portal_id'
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
