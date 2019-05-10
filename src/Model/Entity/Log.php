<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $id
 * @property string $model
 * @property string $updated_field
 * @property string|null $old_value
 * @property string|null $new_value
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 */
class Log extends Entity
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
        'model' => true,
        'updated_field' => true,
        'old_value' => true,
        'new_value' => true,
        'created_on' => true,
        'created_by' => true
    ];
}
