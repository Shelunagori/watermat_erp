<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int $employee_designation_id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date_of_joining
 * @property string|null $contact_no
 * @property string|null $email
 * @property string $employee_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $grade
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string $work_location
 * @property string $image
 * @property string|null $address
 * @property string|null $account_holder_name
 * @property int|null $bank_id
 * @property string|null $account_no
 * @property string|null $ifsc_code
 * @property string|null $branch
 * @property string|null $adhar_card
 * @property string|null $dl
 * @property string|null $pan_card
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\EmployeeDesignation $employee_designation
 * @property \App\Model\Entity\Bank $bank
 * @property \App\Model\Entity\BankDetail[] $bank_details
 * @property \App\Model\Entity\ProjectEmployee[] $project_employees
 * @property \App\Model\Entity\User[] $users
 */
class Employee extends Entity
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
        'employee_designation_id' => true,
        'name' => true,
        'date_of_joining' => true,
        'contact_no' => true,
        'email' => true,
        'employee_code' => true,
        'latitude' => true,
        'longitude' => true,
        'grade' => true,
        'dob' => true,
        'work_location' => true,
        'sub_location' => true,
        'pf' => true,
        'kyc' => true,
        'image' => true,
        'address' => true,
        'account_holder_name' => true,
        'bank' => true,
        'account_no' => true,
        'ifsc_code' => true,
        'branch' => true,
        'adhar_card' => true,
        'dl' => true,
        'pan_card' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'employee_designation' => true,
        'bank' => true,
        'bank_details' => true,
        'project_employees' => true,
        'user' => true
    ];
}
