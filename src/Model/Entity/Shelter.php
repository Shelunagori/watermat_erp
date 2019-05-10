<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shelter Entity
 *
 * @property int $id
 * @property int $village_work_id
 * @property bool|null $delivered
 * @property \Cake\I18n\FrozenDate|null $delivered_date
 * @property bool|null $installation_started
 * @property \Cake\I18n\FrozenDate|null $installation_start_date
 * @property bool|null $installation_complete
 * @property \Cake\I18n\FrozenDate|null $installation_complete_date
 * @property bool|null $canopy_installed
 * @property \Cake\I18n\FrozenDate|null $canopy_installed_date
 * @property string $image
 * @property bool|null $is_verified
 * @property int|null $verified_by
 * @property string|null $damages_visible
 * @property string|null $verify_remark
 * @property string|null $verify_image
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\VillageWork $village_work
 * @property \App\Model\Entity\User $verify
 * @property \App\Model\Entity\User $create_login
 * @property \App\Model\Entity\User $edit_login
 */
class Shelter extends Entity
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
        'village_work_id' => true,
        'delivered' => true,
        'delivered_date' => true,
        'installation_started' => true,
        'installation_start_date' => true,
        'installation_complete' => true,
        'installation_complete_date' => true,
        'canopy_installed' => true,
        'canopy_installed_date' => true,
        'image' => true,
        'pdf' => true,
        'is_complete' => true,
        'is_verified' => true,
        'verified_by' => true,
        'damages_visible' => true,
        'verify_remark' => true,
        'verify_image' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village_work' => true,
        'verify' => true,
        'create_login' => true,
        'edit_login' => true
    ];
}
