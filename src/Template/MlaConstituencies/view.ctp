<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MlaConstituency $mlaConstituency
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mla Constituency'), ['action' => 'edit', $mlaConstituency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mla Constituency'), ['action' => 'delete', $mlaConstituency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mlaConstituency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mla Constituencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mla Constituency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Divisions'), ['controller' => 'Divisions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Division'), ['controller' => 'Divisions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Site Selections'), ['controller' => 'SiteSelections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site Selection'), ['controller' => 'SiteSelections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mlaConstituencies view large-9 medium-8 columns content">
    <h3><?= h($mlaConstituency->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $mlaConstituency->has('project') ? $this->Html->link($mlaConstituency->project->name, ['controller' => 'Projects', 'action' => 'view', $mlaConstituency->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Division') ?></th>
            <td><?= $mlaConstituency->has('division') ? $this->Html->link($mlaConstituency->division->name, ['controller' => 'Divisions', 'action' => 'view', $mlaConstituency->division->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mlaConstituency->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mlaConstituency->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($mlaConstituency->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($mlaConstituency->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($mlaConstituency->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($mlaConstituency->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $mlaConstituency->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($mlaConstituency->image)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Site Selections') ?></h4>
        <?php if (!empty($mlaConstituency->site_selections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Village Work Id') ?></th>
                <th scope="col"><?= __('Lendmark') ?></th>
                <th scope="col"><?= __('Gram Panchayat Id') ?></th>
                <th scope="col"><?= __('Mla Constituency Id') ?></th>
                <th scope="col"><?= __('Borewell Available') ?></th>
                <th scope="col"><?= __('Borwell Distance') ?></th>
                <th scope="col"><?= __('Electricity Available') ?></th>
                <th scope="col"><?= __('Electricity Distance') ?></th>
                <th scope="col"><?= __('Moter Lowered') ?></th>
                <th scope="col"><?= __('Moter Distance') ?></th>
                <th scope="col"><?= __('Raw Water Tds') ?></th>
                <th scope="col"><?= __('Obstacle') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Remark') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mlaConstituency->site_selections as $siteSelections): ?>
            <tr>
                <td><?= h($siteSelections->id) ?></td>
                <td><?= h($siteSelections->village_work_id) ?></td>
                <td><?= h($siteSelections->lendmark) ?></td>
                <td><?= h($siteSelections->gram_panchayat_id) ?></td>
                <td><?= h($siteSelections->mla_constituency_id) ?></td>
                <td><?= h($siteSelections->borewell_available) ?></td>
                <td><?= h($siteSelections->borwell_distance) ?></td>
                <td><?= h($siteSelections->electricity_available) ?></td>
                <td><?= h($siteSelections->electricity_distance) ?></td>
                <td><?= h($siteSelections->moter_lowered) ?></td>
                <td><?= h($siteSelections->moter_distance) ?></td>
                <td><?= h($siteSelections->raw_water_tds) ?></td>
                <td><?= h($siteSelections->obstacle) ?></td>
                <td><?= h($siteSelections->image) ?></td>
                <td><?= h($siteSelections->remark) ?></td>
                <td><?= h($siteSelections->created_on) ?></td>
                <td><?= h($siteSelections->created_by) ?></td>
                <td><?= h($siteSelections->edited_on) ?></td>
                <td><?= h($siteSelections->edited_by) ?></td>
                <td><?= h($siteSelections->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SiteSelections', 'action' => 'view', $siteSelections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SiteSelections', 'action' => 'edit', $siteSelections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SiteSelections', 'action' => 'delete', $siteSelections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $siteSelections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
