<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MlaConstituencies Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\DivisionsTable|\Cake\ORM\Association\BelongsTo $Divisions
 * @property \App\Model\Table\SiteSelectionsTable|\Cake\ORM\Association\HasMany $SiteSelections
 *
 * @method \App\Model\Entity\MlaConstituency get($primaryKey, $options = [])
 * @method \App\Model\Entity\MlaConstituency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MlaConstituency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MlaConstituency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MlaConstituency|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MlaConstituency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MlaConstituency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MlaConstituency findOrCreate($search, callable $callback = null, $options = [])
 */
class MlaConstituenciesTable extends Table
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

        $this->setTable('mla_constituencies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Blocks', [
            'foreignKey' => 'block_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SiteSelections', [
            'foreignKey' => 'mla_constituency_id'
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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['block_id'], 'Blocks'));

        return $rules;
    }
}
