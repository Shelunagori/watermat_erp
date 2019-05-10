<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendor Entity
 *
 * @property int $id
 * @property int $vendor_designation_id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date_of_joining
 * @property string|null $contact_no
 * @property string $email
 * @property string $gst_no
 * @property string|null $pan_no
 * @property string|null $contact_person
 * @property string|null $contact_person_image
 * @property string|null $address
 * @property string|null $account_holder_name
 * @property string|null $bank
 * @property string|null $account_no
 * @property string|null $ifsc_code
 * @property string|null $branch
 * @property string|null $f_c_r_certificate
 * @property string|null $pf_registration_certificate
 * @property string|null $esic_registration_certificate
 * @property string|null $id_proof
 * @property string|null $payment_term
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\VendorDesignation $vendor_designation
 * @property \App\Model\Entity\BankDetail[] $bank_details
 * @property \App\Model\Entity\User $user
 */
class Vendor extends Entity
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
        'vendor_designation_id' => true,
        'name' => true,
        'date_of_joining' => true,
        'contact_no' => true,
        'email' => true,
        'gst_no' => true,
        'pan_no' => true,
        'contact_person' => true,
        'contact_person_image' => true,
        'address' => true,
        'account_holder_name' => true,
        'bank' => true,
        'account_no' => true,
        'ifsc_code' => true,
        'branch' => true,
        'f_c_r_certificate' => true,
        'pf_registration_certificate' => true,
        'esic_registration_certificate' => true,
        'id_proof' => true,
        'other' => true,
        'payment_term' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'vendor_designation' => true,
        'bank_details' => true,
        'user' => true
    ];
}
