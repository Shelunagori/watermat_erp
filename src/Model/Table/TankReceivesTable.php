<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TankReceives Model
 *
 * @property \App\Model\Table\VillageWorksTable|\Cake\ORM\Association\BelongsTo $VillageWorks
 *
 * @method \App\Model\Entity\TankReceife get($primaryKey, $options = [])
 * @method \App\Model\Entity\TankReceife newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TankReceife[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TankReceife|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TankReceife|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TankReceife patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TankReceife[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TankReceife findOrCreate($search, callable $callback = null, $options = [])
 */
class TankReceivesTable extends Table
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

        $this->setTable('tank_receives');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VillageWorks', [
            'foreignKey' => 'village_work_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('TankSizes',[
            'propertyName'=>'TSize'
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
            ->scalar('damages_visible')
            ->allowEmptyString('damages_visible');

        $validator
            ->scalar('tank_size')
            ->maxLength('tank_size', 50)
            ->requirePresence('tank_size', 'create')
            ->allowEmptyString('tank_size', false);

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        $validator
            ->scalar('remark')
            ->allowEmptyString('remark');

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
        $rules->add($rules->existsIn(['village_work_id'], 'VillageWorks'));

        return $rules;
    }
}
