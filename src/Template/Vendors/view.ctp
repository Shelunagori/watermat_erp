<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendor $vendor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vendor'), ['action' => 'edit', $vendor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vendor'), ['action' => 'delete', $vendor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendor Designations'), ['controller' => 'VendorDesignations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor Designation'), ['controller' => 'VendorDesignations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Details'), ['controller' => 'BankDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Detail'), ['controller' => 'BankDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendors view large-9 medium-8 columns content">
    <h3><?= h($vendor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Vendor Designation') ?></th>
            <td><?= $vendor->has('vendor_designation') ? $this->Html->link($vendor->vendor_designation->name, ['controller' => 'VendorDesignations', 'action' => 'view', $vendor->vendor_designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($vendor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($vendor->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($vendor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst No') ?></th>
            <td><?= h($vendor->gst_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pan No') ?></th>
            <td><?= h($vendor->pan_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($vendor->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Holder Name') ?></th>
            <td><?= h($vendor->account_holder_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank') ?></th>
            <td><?= h($vendor->bank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account No') ?></th>
            <td><?= h($vendor->account_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ifsc Code') ?></th>
            <td><?= h($vendor->ifsc_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= h($vendor->branch) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vendor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($vendor->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($vendor->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Joining') ?></th>
            <td><?= h($vendor->date_of_joining) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($vendor->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($vendor->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $vendor->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Contact Person Image') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->contact_person_image)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('F C R Certificate') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->f_c_r_certificate)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pf Registration Certificate') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->pf_registration_certificate)); ?>
    </div>
    <div class="row">
        <h4><?= __('Esic Registration Certificate') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->esic_registration_certificate)); ?>
    </div>
    <div class="row">
        <h4><?= __('Id Proof') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->id_proof)); ?>
    </div>
    <div class="row">
        <h4><?= __('Payment Term') ?></h4>
        <?= $this->Text->autoParagraph(h($vendor->payment_term)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bank Details') ?></h4>
        <?php if (!empty($vendor->bank_details)): ?>
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
            <?php foreach ($vendor->bank_details as $bankDetails): ?>
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
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($vendor->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vendor->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->employee_id) ?></td>
                <td><?= h($users->vendor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
