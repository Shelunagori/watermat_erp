<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubGodownRequest Entity
 *
 * @property int $id
 * @property int $godown_id
 * @property string $status
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Godown $godown
 * @property \App\Model\Entity\AccountingEntry[] $accounting_entries
 * @property \App\Model\Entity\SubGodownRequestProduct[] $sub_godown_request_products
 */
class SubGodownRequest extends Entity
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
        'status' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'godown' => true,
        'accounting_entries' => true,
        'sub_godown_request_products' => true
    ];
}
