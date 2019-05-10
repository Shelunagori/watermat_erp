<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeVillage Entity
 *
 * @property int $id
 * @property string $designation
 * @property int $employee_id
 * @property int $village_id
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Village $village
 */
class EmployeeVillage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'designation' => true,
        'employee_id' => true,
        'village_id' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'employee' => true,
        'village' => true
    ];
}
