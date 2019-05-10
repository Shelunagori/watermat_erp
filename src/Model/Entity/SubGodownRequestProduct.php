<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubGodownRequestProduct Entity
 *
 * @property int $id
 * @property int $sub_godown_request_id
 * @property int $product_id
 * @property float $quantity
 * @property float|null $om_quantity
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\SubGodownRequest $sub_godown_request
 * @property \App\Model\Entity\Product $product
 */
class SubGodownRequestProduct extends Entity
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
        'sub_godown_request_id' => true,
        'product_id' => true,
        'quantity' => true,
        'om_quantity' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'sub_godown_request' => true,
        'product' => true
    ];
}
