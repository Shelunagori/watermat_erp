<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorVillage $vendorVillage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vendor Village'), ['action' => 'edit', $vendorVillage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vendor Village'), ['action' => 'delete', $vendorVillage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorVillage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendor Villages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor Village'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendorVillages view large-9 medium-8 columns content">
    <h3><?= h($vendorVillage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Vendor') ?></th>
            <td><?= $vendorVillage->has('vendor') ? $this->Html->link($vendorVillage->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $vendorVillage->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $vendorVillage->has('village') ? $this->Html->link($vendorVillage->village->name, ['controller' => 'Villages', 'action' => 'view', $vendorVillage->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vendorVillage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($vendorVillage->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($vendorVillage->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($vendorVillage->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($vendorVillage->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $vendorVillage->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
