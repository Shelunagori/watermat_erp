<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transport Entity
 *
 * @property int $id
 * @property int $plant_id
 * @property int $village_id
 * @property string $vendor_name
 * @property \Cake\I18n\FrozenDate $dispatch_date
 * @property \Cake\I18n\FrozenDate $expected_delivery_date
 * @property string $vehicle
 * @property string $driver_name
 * @property string $contact_no
 * @property string $vehicle_number
 * @property string $bill_no
 * @property string $receipt
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Plant $plant
 * @property \App\Model\Entity\Village $village
 */
class Transport extends Entity
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
        'plant_id' => true,
        'village_id' => true,
        'vendor_name' => true,
        'dispatch_date' => true,
        'expected_delivery_date' => true,
        'vehicle' => true,
        'driver_name' => true,
        'contact_no' => true,
        'vehicle_number' => true,
        'bill_no' => true,
        'receipt' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'plant' => true,
        'village' => true
    ];
}
