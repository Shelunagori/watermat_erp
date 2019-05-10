<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employee Designations'), ['controller' => 'EmployeeDesignations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Designation'), ['controller' => 'EmployeeDesignations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Details'), ['controller' => 'BankDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Detail'), ['controller' => 'BankDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Employees'), ['controller' => 'ProjectEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Employee'), ['controller' => 'ProjectEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee Designation') ?></th>
            <td><?= $employee->has('employee_designation') ? $this->Html->link($employee->employee_designation->name, ['controller' => 'EmployeeDesignations', 'action' => 'view', $employee->employee_designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($employee->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($employee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee Code') ?></th>
            <td><?= h($employee->employee_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= h($employee->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($employee->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= h($employee->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Location') ?></th>
            <td><?= h($employee->work_location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Holder Name') ?></th>
            <td><?= h($employee->account_holder_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank') ?></th>
            <td><?= $employee->has('bank') ? $this->Html->link($employee->bank->name, ['controller' => 'Banks', 'action' => 'view', $employee->bank->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account No') ?></th>
            <td><?= h($employee->account_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ifsc Code') ?></th>
            <td><?= h($employee->ifsc_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= h($employee->branch) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($employee->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($employee->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Joining') ?></th>
            <td><?= h($employee->date_of_joining) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($employee->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($employee->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($employee->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $employee->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->image)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Adhar Card') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->adhar_card)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dl') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->dl)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pan Card') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->pan_card)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bank Details') ?></h4>
        <?php if (!empty($employee->bank_details)): ?>
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
            <?php foreach ($employee->bank_details as $bankDetails): ?>
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
        <h4><?= __('Related Project Employees') ?></h4>
        <?php if (!empty($employee->project_employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Designation') ?></th>
                <th scope="col"><?= __('District Id') ?></th>
                <th scope="col"><?= __('Block Id') ?></th>
                <th scope="col"><?= __('Division Id') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->project_employees as $projectEmployees): ?>
            <tr>
                <td><?= h($projectEmployees->id) ?></td>
                <td><?= h($projectEmployees->project_id) ?></td>
                <td><?= h($projectEmployees->employee_id) ?></td>
                <td><?= h($projectEmployees->designation) ?></td>
                <td><?= h($projectEmployees->district_id) ?></td>
                <td><?= h($projectEmployees->block_id) ?></td>
                <td><?= h($projectEmployees->division_id) ?></td>
                <td><?= h($projectEmployees->created_on) ?></td>
                <td><?= h($projectEmployees->created_by) ?></td>
                <td><?= h($projectEmployees->edited_on) ?></td>
                <td><?= h($projectEmployees->edited_by) ?></td>
                <td><?= h($projectEmployees->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectEmployees', 'action' => 'view', $projectEmployees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectEmployees', 'action' => 'edit', $projectEmployees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectEmployees', 'action' => 'delete', $projectEmployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectEmployees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($employee->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->users as $users): ?>
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
