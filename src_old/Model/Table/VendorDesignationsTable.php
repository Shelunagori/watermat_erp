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
 * VendorDesignations Model
 *
 * @property \App\Model\Table\VendorsTable|\Cake\ORM\Association\HasMany $Vendors
 *
 * @method \App\Model\Entity\VendorDesignation get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorDesignation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VendorDesignation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorDesignation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorDesignation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorDesignation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorDesignation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorDesignation findOrCreate($search, callable $callback = null, $options = [])
 */
class VendorDesignationsTable extends Table
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

        $this->setTable('vendor_designations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Vendors', [
            'foreignKey' => 'vendor_designation_id'
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
