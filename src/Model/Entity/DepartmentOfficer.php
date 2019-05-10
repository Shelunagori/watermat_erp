<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DepartmentOfficer Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property int $do_post_id
 * @property string|null $contact_no
 * @property string|null $email
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property int|null $edited_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\DoPost $do_post
 * @property \App\Model\Entity\DoVillage[] $do_villages
 * @property \App\Model\Entity\User[] $users
 */
class DepartmentOfficer extends Entity
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
        'do_post_id' => true,
        'contact_no' => true,
        'email' => true,
        'dob' => true,
        'image' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'project' => true,
        'do_post' => true,
        'do_villages' => true,
        'users' => true
    ];
}
