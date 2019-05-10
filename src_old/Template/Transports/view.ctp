<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport $transport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transport'), ['action' => 'edit', $transport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transport'), ['action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transports view large-9 medium-8 columns content">
    <h3><?= h($transport->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $transport->has('plant') ? $this->Html->link($transport->plant->name, ['controller' => 'Plants', 'action' => 'view', $transport->plant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $transport->has('village') ? $this->Html->link($transport->village->name, ['controller' => 'Villages', 'action' => 'view', $transport->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor Name') ?></th>
            <td><?= h($transport->vendor_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle') ?></th>
            <td><?= h($transport->vehicle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Driver Name') ?></th>
            <td><?= h($transport->driver_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($transport->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle Number') ?></th>
            <td><?= h($transport->vehicle_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bill No') ?></th>
            <td><?= h($transport->bill_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transport->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($transport->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($transport->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch Date') ?></th>
            <td><?= h($transport->dispatch_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Delivery Date') ?></th>
            <td><?= h($transport->expected_delivery_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($transport->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($transport->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $transport->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Receipt') ?></h4>
        <?= $this->Text->autoParagraph(h($transport->receipt)); ?>
    </div>
</div>
