<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PunchAttendance $punchAttendance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Punch Attendance'), ['action' => 'edit', $punchAttendance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Punch Attendance'), ['action' => 'delete', $punchAttendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punchAttendance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Punch Attendances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punch Attendance'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="punchAttendances view large-9 medium-8 columns content">
    <h3><?= h($punchAttendance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Vehicle') ?></th>
            <td><?= h($punchAttendance->vehicle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Travel From') ?></th>
            <td><?= h($punchAttendance->travel_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Travel To') ?></th>
            <td><?= h($punchAttendance->travel_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($punchAttendance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= $this->Number->format($punchAttendance->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Pr Km') ?></th>
            <td><?= $this->Number->format($punchAttendance->price_pr_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($punchAttendance->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($punchAttendance->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($punchAttendance->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($punchAttendance->total_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($punchAttendance->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($punchAttendance->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $punchAttendance->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Start Points') ?></h4>
        <?= $this->Text->autoParagraph(h($punchAttendance->start_points)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Points') ?></h4>
        <?= $this->Text->autoParagraph(h($punchAttendance->end_points)); ?>
    </div>
</div>
