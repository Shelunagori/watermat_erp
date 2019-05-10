<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SiteSelection Entity
 *
 * @property int $id
 * @property int $village_work_id
 * @property \Cake\I18n\FrozenDate|null $date
 * @property string|null $gps_co_ordinates
 * @property string|null $lendmark
 * @property int|null $gram_panchayat_id
 * @property int|null $mla_constituency_id
 * @property string|null $sarpanch
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $borewell_available
 * @property string|null $borewell_distance
 * @property string|null $borewell_unit
 * @property string|null $electricity_available
 * @property string|null $electricity_distance
 * @property string|null $electricity_unit
 * @property string|null $moter_lowered
 * @property string|null $moter_distance
 * @property string|null $moter_unit
 * @property string|null $raw_water_tds
 * @property string|null $obstacle
 * @property string|null $image
 * @property string|null $remark
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 * @property bool $is_complete
 * @property bool $is_verified
 * @property int|null $verified_by
 *
 * @property \App\Model\Entity\VillageWork $village_work
 * @property \App\Model\Entity\GramPanchayat $gram_panchayat
 * @property \App\Model\Entity\MlaConstituency $mla_constituency
 */
class SiteSelection extends Entity
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
        'date' => true,
        'gps_co_ordinates' => true,
        'lendmark' => true,
        'gram_panchayat_id' => true,
        'mla_constituency_id' => true,
        'sarpanch' => true,
        'mobile' => true,
        'email' => true,
        'borewell_available' => true,
        'borewell_distance' => true,
        'borewell_unit' => true,
        'electricity_available' => true,
        'electricity_distance' => true,
        'electricity_unit' => true,
        'moter_lowered' => true,
        'moter_distance' => true,
        'moter_unit' => true,
        'raw_water_tds' => true,
        'obstacle' => true,
        'image' => true,
        'form' => true,
        'remark' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'is_complete' => true,
        'is_verified' => true,
        'verified_by' => true,
        'village_work' => true,
        'gram_panchayat' => true,
        'mla_constituency' => true
    ];
}
