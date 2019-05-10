<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DepartmentOfficer $departmentOfficer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department Officer'), ['action' => 'edit', $departmentOfficer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department Officer'), ['action' => 'delete', $departmentOfficer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departmentOfficer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Department Officers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department Officer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Do Posts'), ['controller' => 'DoPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Do Post'), ['controller' => 'DoPosts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Do Villages'), ['controller' => 'DoVillages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Do Village'), ['controller' => 'DoVillages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departmentOfficers view large-9 medium-8 columns content">
    <h3><?= h($departmentOfficer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $departmentOfficer->has('project') ? $this->Html->link($departmentOfficer->project->name, ['controller' => 'Projects', 'action' => 'view', $departmentOfficer->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($departmentOfficer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Do Post') ?></th>
            <td><?= $departmentOfficer->has('do_post') ? $this->Html->link($departmentOfficer->do_post->name, ['controller' => 'DoPosts', 'action' => 'view', $departmentOfficer->do_post->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($departmentOfficer->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($departmentOfficer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($departmentOfficer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($departmentOfficer->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($departmentOfficer->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($departmentOfficer->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($departmentOfficer->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($departmentOfficer->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $departmentOfficer->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($departmentOfficer->image)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Do Villages') ?></h4>
        <?php if (!empty($departmentOfficer->do_villages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Do Post Id') ?></th>
                <th scope="col"><?= __('Department Officer Id') ?></th>
                <th scope="col"><?= __('Village Id') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($departmentOfficer->do_villages as $doVillages): ?>
            <tr>
                <td><?= h($doVillages->id) ?></td>
                <td><?= h($doVillages->do_post_id) ?></td>
                <td><?= h($doVillages->department_officer_id) ?></td>
                <td><?= h($doVillages->village_id) ?></td>
                <td><?= h($doVillages->created_by) ?></td>
                <td><?= h($doVillages->created_on) ?></td>
                <td><?= h($doVillages->edited_by) ?></td>
                <td><?= h($doVillages->edited_on) ?></td>
                <td><?= h($doVillages->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DoVillages', 'action' => 'view', $doVillages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DoVillages', 'action' => 'edit', $doVillages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DoVillages', 'action' => 'delete', $doVillages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doVillages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($departmentOfficer->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Department Officer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($departmentOfficer->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->employee_id) ?></td>
                <td><?= h($users->vendor_id) ?></td>
                <td><?= h($users->department_officer_id) ?></td>
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
