<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VehicleMaster $vehicleMaster
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicle Master'), ['action' => 'edit', $vehicleMaster->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicle Master'), ['action' => 'delete', $vehicleMaster->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleMaster->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicle Masters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle Master'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicleMasters view large-9 medium-8 columns content">
    <h3><?= h($vehicleMaster->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Vehicle') ?></th>
            <td><?= h($vehicleMaster->vehicle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicleMaster->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Pr Km') ?></th>
            <td><?= $this->Number->format($vehicleMaster->price_pr_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($vehicleMaster->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($vehicleMaster->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($vehicleMaster->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($vehicleMaster->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $vehicleMaster->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
