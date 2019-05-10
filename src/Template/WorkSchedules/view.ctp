<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkSchedule $workSchedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Work Schedule'), ['action' => 'edit', $workSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Work Schedule'), ['action' => 'delete', $workSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Work Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workSchedules view large-9 medium-8 columns content">
    <h3><?= h($workSchedule->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($workSchedule->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($workSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Days') ?></th>
            <td><?= $this->Number->format($workSchedule->days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($workSchedule->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($workSchedule->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($workSchedule->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($workSchedule->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $workSchedule->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Villages') ?></h4>
        <?php if (!empty($workSchedule->villages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Division Id') ?></th>
                <th scope="col"><?= __('Population') ?></th>
                <th scope="col"><?= __('No Household') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Customer Care') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Site Selection') ?></th>
                <th scope="col"><?= __('Civil') ?></th>
                <th scope="col"><?= __('Shelter') ?></th>
                <th scope="col"><?= __('Plant') ?></th>
                <th scope="col"><?= __('Tanks') ?></th>
                <th scope="col"><?= __('Glow Sign Board') ?></th>
                <th scope="col"><?= __('Installation') ?></th>
                <th scope="col"><?= __('Commissioning') ?></th>
                <th scope="col"><?= __('O&amp;m') ?></th>
                <th scope="col"><?= __('Inventory') ?></th>
                <th scope="col"><?= __('Billing') ?></th>
                <th scope="col"><?= __('Work Schedule Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($workSchedule->villages as $villages): ?>
            <tr>
                <td><?= h($villages->id) ?></td>
                <td><?= h($villages->name) ?></td>
                <td><?= h($villages->division_id) ?></td>
                <td><?= h($villages->population) ?></td>
                <td><?= h($villages->no_household) ?></td>
                <td><?= h($villages->latitude) ?></td>
                <td><?= h($villages->longitude) ?></td>
                <td><?= h($villages->customer_care) ?></td>
                <td><?= h($villages->image) ?></td>
                <td><?= h($villages->created_by) ?></td>
                <td><?= h($villages->created_on) ?></td>
                <td><?= h($villages->edited_by) ?></td>
                <td><?= h($villages->edited_on) ?></td>
                <td><?= h($villages->site_selection) ?></td>
                <td><?= h($villages->civil) ?></td>
                <td><?= h($villages->shelter) ?></td>
                <td><?= h($villages->plant) ?></td>
                <td><?= h($villages->tanks) ?></td>
                <td><?= h($villages->glow_sign_board) ?></td>
                <td><?= h($villages->installation) ?></td>
                <td><?= h($villages->commissioning) ?></td>
                <td><?= h($villages->o&amp;m) ?></td>
                <td><?= h($villages->inventory) ?></td>
                <td><?= h($villages->billing) ?></td>
                <td><?= h($villages->work_schedule_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Villages', 'action' => 'view', $villages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Villages', 'action' => 'edit', $villages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Villages', 'action' => 'delete', $villages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $villages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
