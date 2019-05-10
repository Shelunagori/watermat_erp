<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Division Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $block_id
 * @property string $name
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Block $block
 * @property \App\Model\Entity\DepartmentOfficer[] $department_officers
 * @property \App\Model\Entity\ProjectEmployee[] $project_employees
 * @property \App\Model\Entity\Village[] $villages
 * @property \App\Model\Entity\MlaConstituency[] $mla_constituencies
 * @property \App\Model\Entity\GramPanchayat[] $gram_panchayats
 */
class Division extends Entity
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
        'district_id' => true,
        'name' => true,
        'image' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'block' => true,
        'department_officers' => true,
        'project_employees' => true,
        'villages' => true,
        'mla_constituencies' => true,
        'gram_panchayats' => true
    ];
}
