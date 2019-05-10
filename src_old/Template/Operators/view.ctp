<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operator $operator
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operator'), ['action' => 'edit', $operator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operator'), ['action' => 'delete', $operator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villages'), ['controller' => 'Villages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village'), ['controller' => 'Villages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operators view large-9 medium-8 columns content">
    <h3><?= h($operator->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village') ?></th>
            <td><?= $operator->has('village') ? $this->Html->link($operator->village->name, ['controller' => 'Villages', 'action' => 'view', $operator->village->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($operator->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Name') ?></th>
            <td><?= h($operator->father_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($operator->contact_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qualification') ?></th>
            <td><?= h($operator->qualification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aadhar Number') ?></th>
            <td><?= h($operator->aadhar_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pan Number') ?></th>
            <td><?= h($operator->pan_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Holder Name') ?></th>
            <td><?= h($operator->account_holder_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank') ?></th>
            <td><?= h($operator->bank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account No') ?></th>
            <td><?= h($operator->account_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ifsc Code') ?></th>
            <td><?= h($operator->ifsc_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= h($operator->branch) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($operator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Incentive Plan Id') ?></th>
            <td><?= $this->Number->format($operator->incentive_plan_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($operator->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($operator->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Appointment') ?></th>
            <td><?= h($operator->date_of_appointment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salary Paid Upto') ?></th>
            <td><?= h($operator->salary_paid_upto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($operator->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($operator->edited_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $operator->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($operator->image)); ?>
    </div>
    <div class="row">
        <h4><?= __('Id Proof') ?></h4>
        <?= $this->Text->autoParagraph(h($operator->id_proof)); ?>
    </div>
</div>
