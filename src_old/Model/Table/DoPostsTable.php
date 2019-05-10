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
 * DoPosts Model
 *
 * @property \App\Model\Table\DepartmentOfficersTable|\Cake\ORM\Association\HasMany $DepartmentOfficers
 *
 * @method \App\Model\Entity\DoPost get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoPost newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoPost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoPost|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoPost|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoPost[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoPost findOrCreate($search, callable $callback = null, $options = [])
 */
class DoPostsTable extends Table
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

        $this->setTable('do_posts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('DepartmentOfficers', [
            'foreignKey' => 'do_post_id'
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

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        @$data['name'] ? $data['name'] = ucwords($data['name']) : '';

        @$data['date'] ? $data['date'] = date('Y-m-d',strtotime($data['date'])) : '';
    }

    public function beforeSave(Event $event, $entity, ArrayObject $options)
    {
        $id = (new Session())->read('Auth.User.id');
        @$entity['id'] ? $entity['edited_by'] = $id : $entity['created_by'] = $id;
    }
}
