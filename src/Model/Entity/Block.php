<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Block Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $district_id
 * @property string $name
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\DepartmentOfficer[] $department_officers
 * @property \App\Model\Entity\Division[] $divisions
 * @property \App\Model\Entity\ProjectEmployee[] $project_employees
 */
class Block extends Entity
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
        'project_id' => true,
        'division_id' => true,
        'name' => true,
        'image' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'district' => true,
        'department_officers' => true,
        'divisions' => true,
        'project_employees' => true
    ];
}
