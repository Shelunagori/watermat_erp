<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OmSchedule Entity
 *
 * @property int $id
 * @property int $village_id
 * @property \Cake\I18n\FrozenDate $visit_date
 * @property \Cake\I18n\FrozenDate|null $visited_on
 * @property bool $is_complete
 * @property bool $is_verify
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Village $village
 * @property \App\Model\Entity\OmEmployee $om_employee
 * @property \App\Model\Entity\OmScheduleForm $om_schedule_form
 */
class OmSchedule extends Entity
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
        'village_id' => true,
        'visit_date' => true,
        'visited_on' => true,
        'is_complete' => true,
        'is_verify' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village' => true,
        'om_employee' => true,
        'om_schedule_form' => true
    ];
}
