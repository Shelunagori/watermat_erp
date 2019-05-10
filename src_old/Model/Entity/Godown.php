<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Godown Entity
 *
 * @property int $id
 * @property string $name
 * @property string $state
 * @property string $district
 * @property string $city
 * @property string $area
 * @property int $employee_id
 * @property bool $is_main
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Employee $employee
 */
class Godown extends Entity
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
        'name' => true,
        'state' => true,
        'district' => true,
        'city' => true,
        'area' => true,
        'employee_id' => true,
        'is_main' => true,
        'image' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'employee' => true
    ];
}
