<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GodownVillage $godownVillage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Godown Village'), ['action' => 'edit', $godownVillage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Godown Village'), ['action' => 'delete', $godownVillage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $godownVillage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Godown Villages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Godown Village'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Godowns'), ['controller' => 'Godowns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Godown'), ['controller' => 'Godowns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="godownVillages view large-9 medium-8 columns content">
    <h3><?= h($godownVillage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Godown') ?></th>
            <td><?= $godownVillage->has('godown') ? $this->Html->link($godownVillage->godown->name, ['controller' => 'Godowns', 'action' => 'view', $godownVillage->godown->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $godownVillage->has('village') ? $this->Html->link($godownVillage->village->name, ['controller' => 'Villages', 'action' => 'view', $godownVillage->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($godownVillage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($godownVillage->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($godownVillage->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($godownVillage->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($godownVillage->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $godownVillage->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
