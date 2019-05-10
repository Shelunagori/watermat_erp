<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DoPost $doPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Do Post'), ['action' => 'edit', $doPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Do Post'), ['action' => 'delete', $doPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Do Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Do Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Department Officers'), ['controller' => 'DepartmentOfficers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department Officer'), ['controller' => 'DepartmentOfficers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doPosts view large-9 medium-8 columns content">
    <h3><?= h($doPost->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($doPost->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doPost->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($doPost->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($doPost->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($doPost->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($doPost->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $doPost->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Department Officers') ?></h4>
        <?php if (!empty($doPost->department_officers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('District Id') ?></th>
                <th scope="col"><?= __('Block Id') ?></th>
                <th scope="col"><?= __('Division Id') ?></th>
                <th scope="col"><?= __('Village Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Do Post Id') ?></th>
                <th scope="col"><?= __('Contact No') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doPost->department_officers as $departmentOfficers): ?>
            <tr>
                <td><?= h($departmentOfficers->id) ?></td>
                <td><?= h($departmentOfficers->project_id) ?></td>
                <td><?= h($departmentOfficers->state_id) ?></td>
                <td><?= h($departmentOfficers->district_id) ?></td>
                <td><?= h($departmentOfficers->block_id) ?></td>
                <td><?= h($departmentOfficers->division_id) ?></td>
                <td><?= h($departmentOfficers->village_id) ?></td>
                <td><?= h($departmentOfficers->name) ?></td>
                <td><?= h($departmentOfficers->do_post_id) ?></td>
                <td><?= h($departmentOfficers->contact_no) ?></td>
                <td><?= h($departmentOfficers->email) ?></td>
                <td><?= h($departmentOfficers->dob) ?></td>
                <td><?= h($departmentOfficers->image) ?></td>
                <td><?= h($departmentOfficers->created_on) ?></td>
                <td><?= h($departmentOfficers->created_by) ?></td>
                <td><?= h($departmentOfficers->edited_on) ?></td>
                <td><?= h($departmentOfficers->edited_by) ?></td>
                <td><?= h($departmentOfficers->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DepartmentOfficers', 'action' => 'view', $departmentOfficers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DepartmentOfficers', 'action' => 'edit', $departmentOfficers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DepartmentOfficers', 'action' => 'delete', $departmentOfficers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departmentOfficers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
