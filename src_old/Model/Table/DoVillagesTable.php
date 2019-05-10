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
 * DoVillages Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $DoPosts
 * @property \App\Model\Table\DepartmentOfficersTable|\Cake\ORM\Association\BelongsTo $DepartmentOfficers
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 *
 * @method \App\Model\Entity\DoVillage get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoVillage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoVillage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoVillage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoVillage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoVillage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoVillage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoVillage findOrCreate($search, callable $callback = null, $options = [])
 */
class DoVillagesTable extends Table
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

        $this->setTable('do_villages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Log');

        $this->belongsTo('DoPosts', [
            'foreignKey' => 'do_post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DepartmentOfficers', [
            'foreignKey' => 'department_officer_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['do_post_id'], 'DoPosts'));
        $rules->add($rules->existsIn(['department_officer_id'], 'DepartmentOfficers'));
        $rules->add($rules->existsIn(['village_id'], 'Villages'));
        $rules->add($rules->isUnique(['do_post_id','department_officer_id','village_id']));

        return $rules;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        @$data['name'] ? $data['name'] = ucwords($data['name']) : '';

        @$data['date'] ? $data['date'] = date('Y-m-d',strtotime($data['date'])) : '';
    }

    public function beforeSave(Event $event, $entity, ArrayObject $options)
    {
        $id = (new Session())->read('Auth.User.id');
        $entity->isNew() ? $entity['created_by'] = $id : $entity['edited_by'] = $id;
    }
}
