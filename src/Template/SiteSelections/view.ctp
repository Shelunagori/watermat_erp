<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SiteSelection $siteSelection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site Selection'), ['action' => 'edit', $siteSelection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site Selection'), ['action' => 'delete', $siteSelection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $siteSelection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Site Selections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site Selection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Village Works'), ['controller' => 'VillageWorks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village Work'), ['controller' => 'VillageWorks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gram Panchayats'), ['controller' => 'GramPanchayats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gram Panchayat'), ['controller' => 'GramPanchayats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="siteSelections view large-9 medium-8 columns content">
    <h3><?= h($siteSelection->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Work') ?></th>
            <td><?= $siteSelection->has('village_work') ? $this->Html->link($siteSelection->village_work->id, ['controller' => 'VillageWorks', 'action' => 'view', $siteSelection->village_work->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lendmark') ?></th>
            <td><?= h($siteSelection->lendmark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gram Panchayat') ?></th>
            <td><?= $siteSelection->has('gram_panchayat') ? $this->Html->link($siteSelection->gram_panchayat->name, ['controller' => 'GramPanchayats', 'action' => 'view', $siteSelection->gram_panchayat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Borewell Available') ?></th>
            <td><?= h($siteSelection->borewell_available) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Borwell Distance') ?></th>
            <td><?= h($siteSelection->borwell_distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Electricity Available') ?></th>
            <td><?= h($siteSelection->electricity_available) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Electricity Distance') ?></th>
            <td><?= h($siteSelection->electricity_distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moter Lowered') ?></th>
            <td><?= h($siteSelection->moter_lowered) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moter Distance') ?></th>
            <td><?= h($siteSelection->moter_distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Raw Water Tds') ?></th>
            <td><?= h($siteSelection->raw_water_tds) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($siteSelection->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mla Constituency Id') ?></th>
            <td><?= $this->Number->format($siteSelection->mla_constituency_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($siteSelection->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($siteSelection->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($siteSelection->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($siteSelection->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $siteSelection->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Obstacle') ?></h4>
        <?= $this->Text->autoParagraph(h($siteSelection->obstacle)); ?>
    </div>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($siteSelection->image)); ?>
    </div>
    <div class="row">
        <h4><?= __('Remark') ?></h4>
        <?= $this->Text->autoParagraph(h($siteSelection->remark)); ?>
    </div>
</div>
