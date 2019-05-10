<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountingEntry Entity
 *
 * @property int $id
 * @property int $godown_id
 * @property int $product_id
 * @property float $quantity
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property int|null $vendor_id
 * @property string $status
 * @property string $refer_to
 * @property int|null $receive_godown_id
 * @property int|null $village_id
 * @property int|null $plant_id
 * @property int|null $village_request_id
 * @property int|null $sub_godown_request_id
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Godown $godown
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Godown $receive_godown
 * @property \App\Model\Entity\Village $village
 * @property \App\Model\Entity\Plant $plant
 * @property \App\Model\Entity\AccountingSerial[] $accounting_serials
 */
class AccountingEntry extends Entity
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
        'godown_id' => true,
        'product_id' => true,
        'quantity' => true,
        'transaction_date' => true,
        'vendor_id' => true,
        'status' => true,
        'refer_to' => true,
        'receive_godown_id' => true,
        'village_id' => true,
        'plant_id' => true,
        'village_request_id' => true,
        'sub_godown_request_id' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'godown' => true,
        'product' => true,
        'vendor' => true,
        'receive_godown' => true,
        'village' => true,
        'plant' => true,
        'accounting_serials' => true
    ];
}
