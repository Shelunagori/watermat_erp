<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankDetail Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $vendor_id
 * @property int $bank_id
 * @property string $account_no
 * @property string $account_holder_name
 * @property string $ifsc_code
 * @property string|null $branch
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Bank $bank
 */
class BankDetail extends Entity
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
        'employee_id' => true,
        'vendor_id' => true,
        'bank_id' => true,
        'account_no' => true,
        'account_holder_name' => true,
        'ifsc_code' => true,
        'branch' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'employee' => true,
        'vendor' => true,
        'bank' => true
    ];
}
