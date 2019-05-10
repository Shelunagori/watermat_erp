<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageWork Entity
 *
 * @property int $id
 * @property int $village_id
 * @property int $work_schedule_id
 * @property \Cake\I18n\FrozenDate|null $schedule_date
 * @property \Cake\I18n\FrozenDate|null $complete_date
 * @property bool|null $is_complete
 * @property bool|null $is_verified
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Village $village
 * @property \App\Model\Entity\WorkSchedule $work_schedule
 * @property \App\Model\Entity\Civil[] $civils
 * @property \App\Model\Entity\Commissioning[] $commissionings
 * @property \App\Model\Entity\GlowSignBoard[] $glow_sign_boards
 * @property \App\Model\Entity\Installation[] $installations
 * @property \App\Model\Entity\PlantReceife[] $plant_receives
 * @property \App\Model\Entity\Shelter[] $shelters
 * @property \App\Model\Entity\SiteSelection[] $site_selections
 * @property \App\Model\Entity\WorkScheduleRowForm[] $work_schedule_row_forms
 * @property \App\Model\Entity\WorkVerification[] $work_verifications
 */
class VillageWork extends Entity
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
        'work_schedule_id' => true,
        'schedule_date' => true,
        'complete_date' => true,
        'is_complete' => true,
        'is_verified' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village' => true,
        'work_schedule' => true,
        'civils' => true,
        'commissionings' => true,
        'glow_sign_boards' => true,
        'installations' => true,
        'plant_receives' => true,
        'shelters' => true,
        'site_selections' => true,
        'work_schedule_row_forms' => true,
        'work_verifications' => true
    ];
}
