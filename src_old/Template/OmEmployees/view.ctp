<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OmEmployee $omEmployee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Om Employee'), ['action' => 'edit', $omEmployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Om Employee'), ['action' => 'delete', $omEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $omEmployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Om Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Om Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="omEmployees view large-9 medium-8 columns content">
    <h3><?= h($omEmployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $omEmployee->has('village') ? $this->Html->link($omEmployee->village->name, ['controller' => 'Villages', 'action' => 'view', $omEmployee->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($omEmployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Technician Id') ?></th>
            <td><?= $this->Number->format($omEmployee->technician_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager Id') ?></th>
            <td><?= $this->Number->format($omEmployee->manager_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($omEmployee->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($omEmployee->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($omEmployee->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($omEmployee->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $omEmployee->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
