<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OmSchedule $omSchedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Om Schedule'), ['action' => 'edit', $omSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Om Schedule'), ['action' => 'delete', $omSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $omSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Om Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Om Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="omSchedules view large-9 medium-8 columns content">
    <h3><?= h($omSchedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $omSchedule->has('village') ? $this->Html->link($omSchedule->village->name, ['controller' => 'Villages', 'action' => 'view', $omSchedule->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($omSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($omSchedule->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($omSchedule->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Date') ?></th>
            <td><?= h($omSchedule->visit_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visited On') ?></th>
            <td><?= h($omSchedule->visited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($omSchedule->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($omSchedule->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Complete') ?></th>
            <td><?= $omSchedule->is_complete ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Verify') ?></th>
            <td><?= $omSchedule->is_verify ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $omSchedule->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
