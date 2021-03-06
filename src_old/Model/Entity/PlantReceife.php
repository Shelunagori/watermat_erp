<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlantReceife Entity
 *
 * @property int $id
 * @property int $village_work_id
 * @property string|null $damages_visible
 * @property bool|null $is_received
 * @property string|null $remark
 * @property string|null $image
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\VillageWork $village_work
 */
class PlantReceife extends Entity
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
        'damages_visible' => true,
        'is_received' => true,
        'remark' => true,
        'image' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village_work' => true
    ];
}
