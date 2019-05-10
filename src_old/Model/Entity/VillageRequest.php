<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageRequest Entity
 *
 * @property int $id
 * @property int $village_id
 * @property int $technician_id
 * @property int $manager_id
 * @property int $om_schedule_id
 * @property string $status
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Village $village
 * @property \App\Model\Entity\Technician $technician
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\OmSchedule $om_schedule
 * @property \App\Model\Entity\AccountingEntry[] $accounting_entries
 * @property \App\Model\Entity\VillageRequestProduct[] $village_request_products
 */
class VillageRequest extends Entity
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
        'technician_id' => true,
        'manager_id' => true,
        'om_schedule_id' => true,
        'status' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village' => true,
        'technician' => true,
        'manager' => true,
        'om_schedule' => true,
        'accounting_entries' => true,
        'village_request_products' => true
    ];
}
