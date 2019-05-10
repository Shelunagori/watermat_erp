<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VehicleMasters Model
 *
 * @method \App\Model\Entity\VehicleMaster get($primaryKey, $options = [])
 * @method \App\Model\Entity\VehicleMaster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VehicleMaster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VehicleMaster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VehicleMaster|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VehicleMaster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VehicleMaster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VehicleMaster findOrCreate($search, callable $callback = null, $options = [])
 */
class VehicleMastersTable extends Table
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

        $this->setTable('vehicle_masters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('vehicle')
            ->maxLength('vehicle', 255)
            ->requirePresence('vehicle', 'create')
            ->allowEmptyString('vehicle', false);

        $validator
            ->decimal('price_pr_km')
            ->requirePresence('price_pr_km', 'create')
            ->allowEmptyString('price_pr_km', false);

        return $validator;
    }
}
