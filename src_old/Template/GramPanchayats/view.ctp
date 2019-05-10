<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GramPanchayat $gramPanchayat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gram Panchayat'), ['action' => 'edit', $gramPanchayat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gram Panchayat'), ['action' => 'delete', $gramPanchayat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gramPanchayat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gram Panchayats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gram Panchayat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Divisions'), ['controller' => 'Divisions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Division'), ['controller' => 'Divisions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gramPanchayats view large-9 medium-8 columns content">
    <h3><?= h($gramPanchayat->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Division') ?></th>
            <td><?= $gramPanchayat->has('division') ? $this->Html->link($gramPanchayat->division->name, ['controller' => 'Divisions', 'action' => 'view', $gramPanchayat->division->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($gramPanchayat->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gramPanchayat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($gramPanchayat->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($gramPanchayat->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($gramPanchayat->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($gramPanchayat->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $gramPanchayat->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($gramPanchayat->image)); ?>
    </div>
</div>
