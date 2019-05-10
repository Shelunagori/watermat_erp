<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DoVillage $doVillage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Do Village'), ['action' => 'edit', $doVillage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Do Village'), ['action' => 'delete', $doVillage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doVillage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Do Villages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Do Village'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Department Officers'), ['controller' => 'DepartmentOfficers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department Officer'), ['controller' => 'DepartmentOfficers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doVillages view large-9 medium-8 columns content">
    <h3><?= h($doVillage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Department Officer') ?></th>
            <td><?= $doVillage->has('department_officer') ? $this->Html->link($doVillage->department_officer->name, ['controller' => 'DepartmentOfficers', 'action' => 'view', $doVillage->department_officer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $doVillage->has('village') ? $this->Html->link($doVillage->village->name, ['controller' => 'Villages', 'action' => 'view', $doVillage->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doVillage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($doVillage->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($doVillage->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($doVillage->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($doVillage->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $doVillage->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
