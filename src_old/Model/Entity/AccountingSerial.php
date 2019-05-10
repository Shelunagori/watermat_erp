<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountingSerial Entity
 *
 * @property int $id
 * @property int $accounting_entry_id
 * @property string $serial_no
 * @property \Cake\I18n\FrozenDate|null $purchase_date
 * @property \Cake\I18n\FrozenDate|null $expiry_date
 * @property string|null $brand_name
 * @property int|null $vendor_id
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\AccountingEntry $accounting_entry
 */
class AccountingSerial extends Entity
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
        'accounting_entry_id' => true,
        'serial_no' => true,
        'purchase_date' => true,
        'expiry_date' => true,
        'brand_name' => true,
        'vendor_id' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'accounting_entry' => true
    ];
}
