<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Village Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property int $division_id
 * @property int $population
 * @property string|null $no_household
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $customer_care
 * @property string $image
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Division $division
 * @property \App\Model\Entity\DoVillage[] $do_villages
 * @property \App\Model\Entity\EmployeeVillage[] $employee_villages
 * @property \App\Model\Entity\VendorVillage[] $vendor_villages
 * @property \App\Model\Entity\VillageWork[] $village_works
 * @property \App\Model\Entity\DoPost $do_post
 * @property \App\Model\Entity\ApiVersion $api_version
 * @property \App\Model\Entity\State $state
 */
class Village extends Entity
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
        'project_id' => true,
        'name' => true,
        'block_id' => true,
        'population' => true,
        'no_household' => true,
        'latitude' => true,
        'longitude' => true,
        'customer_care' => true,
        'image' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'project' => true,
        'block' => true,
        'do_villages' => true,
        'employee_villages' => true,
        'vendor_villages' => true,
        'village_works' => true,
        'do_post' => true,
        'api_version' => true,
        'state' => true
    ];
}
