<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Employees'), ['controller' => 'ProjectEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Employee'), ['controller' => 'ProjectEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($project->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Number') ?></th>
            <td><?= h($project->project_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($project->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($project->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($project->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($project->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $project->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Project Employees') ?></h4>
        <?php if (!empty($project->project_employees)): ?>
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
            <?php foreach ($project->project_employees as $projectEmployees): ?>
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
</div>
