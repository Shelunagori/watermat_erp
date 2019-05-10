<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Operator Entity
 *
 * @property int $id
 * @property int $village_id
 * @property string $name
 * @property string $father_name
 * @property string|null $contact_no
 * @property string|null $qualification
 * @property string $aadhar_number
 * @property string|null $pan_number
 * @property \Cake\I18n\FrozenDate $date_of_appointment
 * @property \Cake\I18n\FrozenDate|null $salary_paid_upto
 * @property int|null $incentive_plan_id
 * @property string $image
 * @property string|null $id_proof
 * @property string|null $account_holder_name
 * @property string|null $bank
 * @property string|null $account_no
 * @property string|null $ifsc_code
 * @property string|null $branch
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Village $village
 * @property \App\Model\Entity\IncentivePlan $incentive_plan
 */
class Operator extends Entity
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
        'name' => true,
        'father_name' => true,
        'contact_no' => true,
        'qualification' => true,
        'aadhar_number' => true,
        'pan_number' => true,
        'date_of_appointment' => true,
        'pf' => true,
        'kyc' => true,
        'salary_paid_upto' => true,
        'incentive_plan_id' => true,
        'image' => true,
        'id_proof' => true,
        'account_holder_name' => true,
        'bank' => true,
        'account_no' => true,
        'ifsc_code' => true,
        'branch' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'village' => true,
        'incentive_plan' => true
    ];
}
