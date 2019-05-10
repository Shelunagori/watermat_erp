<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OmScheduleForm Entity
 *
 * @property int $id
 * @property int $om_schedule_id
 * @property string $plant_status
 * @property string $plant_service
 * @property string|null $reason
 * @property float $treated_water_flow
 * @property string $twf_image
 * @property float $reject_flow
 * @property string $reject_image
 * @property string $dosing
 * @property int $card_issued
 * @property float $card_amount
 * @property float $recharge
 * @property int $card_operator
 * @property float $amount_collected
 * @property float $amount_operator
 * @property int $ro_meter_reading
 * @property string $ro_image
 * @property string|null $remark
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\OmSchedule $om_schedule
 */
class OmScheduleForm extends Entity
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
        'om_schedule_id' => true,
        'plant_status' => true,
        'plant_service' => true,
        'reason' => true,
        'treated_water_flow' => true,
        'twf_image' => true,
        'reject_flow' => true,
        'reject_image' => true,
        'dosing' => true,
        'card_issued' => true,
        'card_amount' => true,
        'recharge' => true,
        'card_operator' => true,
        'amount_collected' => true,
        'amount_operator' => true,
        'ro_meter_reading' => true,
        'ro_image' => true,
        'remark' => true,
        'services' => true,
        'comment' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'om_schedule' => true
    ];
}
