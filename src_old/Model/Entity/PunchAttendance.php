<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PunchAttendance Entity
 *
 * @property int $id
 * @property string $start_points
 * @property string $end_points
 * @property float $distance
 * @property string $vehicle
 * @property float $price_pr_km
 * @property string|null $travel_from
 * @property string|null $travel_to
 * @property int $user_id
 * @property string $status
 * @property string|null $reason
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 * @property float|null $total_amount
 *
 * @property \App\Model\Entity\User $user
 */
class PunchAttendance extends Entity
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
        'start_points' => true,
        'end_points' => true,
        'distance' => true,
        'vehicle' => true,
        'price_pr_km' => true,
        'travel_from' => true,
        'travel_to' => true,
        'user_id' => true,
        'status' => true,
        'comment' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'total_amount' => true,
        'user' => true
    ];
}
