<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank'), ['action' => 'edit', $bank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank'), ['action' => 'delete', $bank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Banks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Details'), ['controller' => 'BankDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Detail'), ['controller' => 'BankDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="banks view large-9 medium-8 columns content">
    <h3><?= h($bank->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($bank->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($bank->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($bank->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($bank->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($bank->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $bank->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Details') ?></h4>
        <?php if (!empty($bank->bank_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Bank Id') ?></th>
                <th scope="col"><?= __('Account No') ?></th>
                <th scope="col"><?= __('Account Holder Name') ?></th>
                <th scope="col"><?= __('Ifsc Code') ?></th>
                <th scope="col"><?= __('Branch') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bank->bank_details as $bankDetails): ?>
            <tr>
                <td><?= h($bankDetails->id) ?></td>
                <td><?= h($bankDetails->employee_id) ?></td>
                <td><?= h($bankDetails->vendor_id) ?></td>
                <td><?= h($bankDetails->bank_id) ?></td>
                <td><?= h($bankDetails->account_no) ?></td>
                <td><?= h($bankDetails->account_holder_name) ?></td>
                <td><?= h($bankDetails->ifsc_code) ?></td>
                <td><?= h($bankDetails->branch) ?></td>
                <td><?= h($bankDetails->created_by) ?></td>
                <td><?= h($bankDetails->created_on) ?></td>
                <td><?= h($bankDetails->edited_by) ?></td>
                <td><?= h($bankDetails->edited_on) ?></td>
                <td><?= h($bankDetails->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankDetails', 'action' => 'view', $bankDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankDetails', 'action' => 'edit', $bankDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankDetails', 'action' => 'delete', $bankDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
