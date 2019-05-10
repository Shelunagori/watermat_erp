<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Plant'), ['action' => 'edit', $plant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Plant'), ['action' => 'delete', $plant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounting Entries'), ['controller' => 'AccountingEntries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accounting Entry'), ['controller' => 'AccountingEntries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="plants view large-9 medium-8 columns content">
    <h3><?= h($plant->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $plant->has('village') ? $this->Html->link($plant->village->name, ['controller' => 'Villages', 'action' => 'view', $plant->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($plant->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor') ?></th>
            <td><?= $plant->has('vendor') ? $this->Html->link($plant->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $plant->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($plant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($plant->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($plant->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($plant->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complete Date') ?></th>
            <td><?= h($plant->complete_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($plant->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($plant->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Received') ?></th>
            <td><?= $plant->is_received ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $plant->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Accounting Entries') ?></h4>
        <?php if (!empty($plant->accounting_entries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Godown Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Serial No') ?></th>
                <th scope="col"><?= __('Purchase Date') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Transaction Date') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Refer To') ?></th>
                <th scope="col"><?= __('Receive Godown Id') ?></th>
                <th scope="col"><?= __('Village Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($plant->accounting_entries as $accountingEntries): ?>
            <tr>
                <td><?= h($accountingEntries->id) ?></td>
                <td><?= h($accountingEntries->godown_id) ?></td>
                <td><?= h($accountingEntries->product_id) ?></td>
                <td><?= h($accountingEntries->serial_no) ?></td>
                <td><?= h($accountingEntries->purchase_date) ?></td>
                <td><?= h($accountingEntries->expiry_date) ?></td>
                <td><?= h($accountingEntries->transaction_date) ?></td>
                <td><?= h($accountingEntries->vendor_id) ?></td>
                <td><?= h($accountingEntries->status) ?></td>
                <td><?= h($accountingEntries->refer_to) ?></td>
                <td><?= h($accountingEntries->receive_godown_id) ?></td>
                <td><?= h($accountingEntries->village_id) ?></td>
                <td><?= h($accountingEntries->plant_id) ?></td>
                <td><?= h($accountingEntries->created_on) ?></td>
                <td><?= h($accountingEntries->created_by) ?></td>
                <td><?= h($accountingEntries->edited_on) ?></td>
                <td><?= h($accountingEntries->edited_by) ?></td>
                <td><?= h($accountingEntries->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AccountingEntries', 'action' => 'view', $accountingEntries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AccountingEntries', 'action' => 'edit', $accountingEntries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccountingEntries', 'action' => 'delete', $accountingEntries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountingEntries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
