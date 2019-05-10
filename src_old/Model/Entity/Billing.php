<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Billing Entity
 *
 * @property int $id
 * @property int $village_work_id
 * @property int $billing_question_id
 * @property string|null $answer
 * @property \Cake\I18n\FrozenDate|null $date
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int|null $edited_by
 * @property \Cake\I18n\FrozenTime|null $edited_on
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\VillageWork $village_work
 * @property \App\Model\Entity\BillingQuestion $billing_question
 */
class Billing extends Entity
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
        'billing_question_id' => true,
        'answer' => true,
        'date' => true,
        'created_by' => true,
        'created_on' => true,
        'edited_by' => true,
        'edited_on' => true,
        'is_deleted' => true,
        'village_work' => true,
        'billing_question' => true
    ];
}
