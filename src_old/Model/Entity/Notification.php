<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property int|null $village_id
 * @property int|null $project_id
 * @property int|null $village_work_id
 * @property string $link
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Village $village
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\VillageWork $village_work
 */
class Notification extends Entity
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
        'user_id' => true,
        'message' => true,
        'village_id' => false,
        'project_id' => false,
        'village_work_id' => false,
        'link' => true,
        'user' => true,
        'village' => true,
        'project' => true,
        'village_work' => true
    ];
}
