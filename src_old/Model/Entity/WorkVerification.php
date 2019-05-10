<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkVerification Entity
 *
 * @property int $id
 * @property int $village_work_id
 * @property int $work_schedule_row_id
 * @property bool $is_satisfied
 * @property string|null $image
 * @property string|null $remarks
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\VillageWork $village_work
 * @property \App\Model\Entity\WorkScheduleRow $work_schedule_row
 */
class WorkVerification extends Entity
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
        'village_work_id' => true,
        'work_schedule_row_id' => true,
        'is_satisfied' => true,
        'image' => true,
        'remarks' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village_work' => true,
        'work_schedule_row' => true
    ];
}
