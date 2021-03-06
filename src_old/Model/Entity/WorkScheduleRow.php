<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkScheduleRow Entity
 *
 * @property int $id
 * @property int $work_schedule_id
 * @property string $name
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\WorkSchedule $work_schedule
 */
class WorkScheduleRow extends Entity
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
        'work_schedule_id' => true,
        'name' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'work_schedule' => true
    ];
}
