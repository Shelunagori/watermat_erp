<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string $menu_name
 * @property int|null $parent_id
 * @property int $lft
 * @property int $rght
 * @property string|null $controller
 * @property string|null $action
 * @property string|null $icon_class_name
 * @property string $is_hidden
 * @property string|null $query_string
 * @property string|null $target
 *
 * @property \App\Model\Entity\ParentMenu $parent_menu
 * @property \App\Model\Entity\ChildMenu[] $child_menus
 */
class Menu extends Entity
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
        'menu_name' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'controller' => true,
        'action' => true,
        'icon_class_name' => true,
        'is_hidden' => true,
        'query_string' => true,
        'target' => true,
        'parent_menu' => true,
        'child_menus' => true
    ];
}
