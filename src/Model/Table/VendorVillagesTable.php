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
 * VendorVillages Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $VendorDesignations
 * @property \App\Model\Table\VendorsTable|\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\VillagesTable|\Cake\ORM\Association\BelongsTo $Villages
 *
 * @method \App\Model\Entity\VendorVillage get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorVillage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VendorVillage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorVillage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorVillage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorVillage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorVillage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorVillage findOrCreate($search, callable $callback = null, $options = [])
 */
class VendorVillagesTable extends Table
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

        $this->setTable('vendor_villages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Log');

        $this->belongsTo('VendorDesignations', [
            'foreignKey' => 'vendor_designation_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('CivilVendors', [
            'className' => 'Vendors',
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['vendor_designation_id' => 1])
        ->setProperty('civil_vendor');
        
        $this->belongsTo('PalntVendors', [
            'className' => 'Vendors',
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['vendor_designation_id' => 2])
        ->setProperty('palnt_vendor');
        
        $this->belongsTo('ICVendors', [
            'className' => 'Vendors',
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['vendor_designation_id' => 3])
        ->setProperty('ic_vendor');

        $this->belongsTo('ShelterVendors', [
            'className' => 'Vendors',
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER'
        ])
        ->setConditions(['vendor_designation_id' => 5])
        ->setProperty('shelter_vendor');

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
        $rules->add($rules->existsIn(['vendor_designation_id'], 'VendorDesignations'));
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['village_id'], 'Villages'));
        $rules->add($rules->isUnique(['vendor_designation_id','vendor_id','village_id']));
        
        return $rules;
    }
}
