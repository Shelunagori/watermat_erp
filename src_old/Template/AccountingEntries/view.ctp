<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry $accountingEntry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accounting Entry'), ['action' => 'edit', $accountingEntry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accounting Entry'), ['action' => 'delete', $accountingEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountingEntry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounting Entries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accounting Entry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Godowns'), ['controller' => 'Godowns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Godown'), ['controller' => 'Godowns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receive Godowns'), ['controller' => 'Godowns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receive Godown'), ['controller' => 'Godowns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accountingEntries view large-9 medium-8 columns content">
    <h3><?= h($accountingEntry->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Godown') ?></th>
            <td><?= $accountingEntry->has('godown') ? $this->Html->link($accountingEntry->godown->name, ['controller' => 'Godowns', 'action' => 'view', $accountingEntry->godown->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $accountingEntry->has('product') ? $this->Html->link($accountingEntry->product->name, ['controller' => 'Products', 'action' => 'view', $accountingEntry->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serial No') ?></th>
            <td><?= h($accountingEntry->serial_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor') ?></th>
            <td><?= $accountingEntry->has('vendor') ? $this->Html->link($accountingEntry->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $accountingEntry->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($accountingEntry->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refer To') ?></th>
            <td><?= h($accountingEntry->refer_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receive Godown') ?></th>
            <td><?= $accountingEntry->has('receive_godown') ? $this->Html->link($accountingEntry->receive_godown->name, ['controller' => 'Godowns', 'action' => 'view', $accountingEntry->receive_godown->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $accountingEntry->has('village') ? $this->Html->link($accountingEntry->village->name, ['controller' => 'Villages', 'action' => 'view', $accountingEntry->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $accountingEntry->has('plant') ? $this->Html->link($accountingEntry->plant->name, ['controller' => 'Plants', 'action' => 'view', $accountingEntry->plant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accountingEntry->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($accountingEntry->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($accountingEntry->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Date') ?></th>
            <td><?= h($accountingEntry->purchase_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry Date') ?></th>
            <td><?= h($accountingEntry->expiry_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($accountingEntry->transaction_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($accountingEntry->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($accountingEntry->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $accountingEntry->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
