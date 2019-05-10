<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorDesignation $vendorDesignation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vendor Designation'), ['action' => 'edit', $vendorDesignation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vendor Designation'), ['action' => 'delete', $vendorDesignation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorDesignation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendor Designations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor Designation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendorDesignations view large-9 medium-8 columns content">
    <h3><?= h($vendorDesignation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($vendorDesignation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vendorDesignation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($vendorDesignation->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($vendorDesignation->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($vendorDesignation->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($vendorDesignation->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $vendorDesignation->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vendors') ?></h4>
        <?php if (!empty($vendorDesignation->vendors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Vendor Designation Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date Of Joining') ?></th>
                <th scope="col"><?= __('Contact No') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Gst No') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Grade') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Documents') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vendorDesignation->vendors as $vendors): ?>
            <tr>
                <td><?= h($vendors->id) ?></td>
                <td><?= h($vendors->vendor_designation_id) ?></td>
                <td><?= h($vendors->name) ?></td>
                <td><?= h($vendors->date_of_joining) ?></td>
                <td><?= h($vendors->contact_no) ?></td>
                <td><?= h($vendors->email) ?></td>
                <td><?= h($vendors->gst_no) ?></td>
                <td><?= h($vendors->latitude) ?></td>
                <td><?= h($vendors->longitude) ?></td>
                <td><?= h($vendors->grade) ?></td>
                <td><?= h($vendors->dob) ?></td>
                <td><?= h($vendors->image) ?></td>
                <td><?= h($vendors->documents) ?></td>
                <td><?= h($vendors->created_on) ?></td>
                <td><?= h($vendors->created_by) ?></td>
                <td><?= h($vendors->edited_on) ?></td>
                <td><?= h($vendors->edited_by) ?></td>
                <td><?= h($vendors->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendors', 'action' => 'view', $vendors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vendors', 'action' => 'edit', $vendors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendors', 'action' => 'delete', $vendors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
