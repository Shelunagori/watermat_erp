<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkScheduleRowForm Entity
 *
 * @property int $id
 * @property int $village_work_id
 * @property int $work_schedule_row_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property string $image
 * @property bool $is_complete
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 *
 * @property \App\Model\Entity\VillageWork $village_work
 * @property \App\Model\Entity\WorkScheduleRow $work_schedule_row
 */
class WorkScheduleRowForm extends Entity
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
        'start_date' => true,
        'end_date' => true,
        'image' => true,
        'is_complete' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'village_work' => true,
        'work_schedule_row' => true
    ];
}
