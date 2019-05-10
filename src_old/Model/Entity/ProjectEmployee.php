<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectEmployee Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $employee_id
 * @property string $designation
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Block $block
 * @property \App\Model\Entity\Division $division
 */
class ProjectEmployee extends Entity
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
        'employee_id' => true,
        'designation' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'project' => true,
        'employee' => true,
        'district' => true,
        'block' => true,
        'division' => true
    ];
}
