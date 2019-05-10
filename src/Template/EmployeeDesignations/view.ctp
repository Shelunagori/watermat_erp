<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeDesignation $employeeDesignation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Designation'), ['action' => 'edit', $employeeDesignation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Designation'), ['action' => 'delete', $employeeDesignation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeDesignation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Designations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Designation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeDesignations view large-9 medium-8 columns content">
    <h3><?= h($employeeDesignation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employeeDesignation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeDesignation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($employeeDesignation->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($employeeDesignation->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($employeeDesignation->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($employeeDesignation->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $employeeDesignation->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($employeeDesignation->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Designation Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date Of Joining') ?></th>
                <th scope="col"><?= __('Contact No') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Employee Code') ?></th>
                <th scope="col"><?= __('Home Location') ?></th>
                <th scope="col"><?= __('Grade') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Work Location') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employeeDesignation->employees as $employees): ?>
            <tr>
                <td><?= h($employees->id) ?></td>
                <td><?= h($employees->employee_designation_id) ?></td>
                <td><?= h($employees->name) ?></td>
                <td><?= h($employees->date_of_joining) ?></td>
                <td><?= h($employees->contact_no) ?></td>
                <td><?= h($employees->email) ?></td>
                <td><?= h($employees->employee_code) ?></td>
                <td><?= h($employees->home_location) ?></td>
                <td><?= h($employees->grade) ?></td>
                <td><?= h($employees->dob) ?></td>
                <td><?= h($employees->work_location) ?></td>
                <td><?= h($employees->image) ?></td>
                <td><?= h($employees->created_on) ?></td>
                <td><?= h($employees->created_by) ?></td>
                <td><?= h($employees->edited_on) ?></td>
                <td><?= h($employees->edited_by) ?></td>
                <td><?= h($employees->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
