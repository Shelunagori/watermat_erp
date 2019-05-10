<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeVillage $employeeVillage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Village'), ['action' => 'edit', $employeeVillage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Village'), ['action' => 'delete', $employeeVillage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeVillage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Villages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Village'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeVillages view large-9 medium-8 columns content">
    <h3><?= h($employeeVillage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $employeeVillage->has('employee') ? $this->Html->link($employeeVillage->employee->name, ['controller' => 'Employees', 'action' => 'view', $employeeVillage->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $employeeVillage->has('village') ? $this->Html->link($employeeVillage->village->name, ['controller' => 'Villages', 'action' => 'view', $employeeVillage->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeVillage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($employeeVillage->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($employeeVillage->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($employeeVillage->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($employeeVillage->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $employeeVillage->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
