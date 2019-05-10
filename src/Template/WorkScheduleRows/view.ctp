<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkScheduleRow $workScheduleRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Work Schedule Row'), ['action' => 'edit', $workScheduleRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Work Schedule Row'), ['action' => 'delete', $workScheduleRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workScheduleRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Work Schedule Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work Schedule Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Work Schedules'), ['controller' => 'WorkSchedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work Schedule'), ['controller' => 'WorkSchedules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workScheduleRows view large-9 medium-8 columns content">
    <h3><?= h($workScheduleRow->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Work Schedule') ?></th>
            <td><?= $workScheduleRow->has('work_schedule') ? $this->Html->link($workScheduleRow->work_schedule->name, ['controller' => 'WorkSchedules', 'action' => 'view', $workScheduleRow->work_schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($workScheduleRow->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($workScheduleRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($workScheduleRow->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($workScheduleRow->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($workScheduleRow->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($workScheduleRow->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $workScheduleRow->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
