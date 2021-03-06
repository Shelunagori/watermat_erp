<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Employees') ?></span>
                </div>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('Sr.no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('designation') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('name') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('joining') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('contact') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('email') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('employee code') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('grade') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('dob') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('work location') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('PF') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('ESI KYC') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('sub location') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('account holder') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('bank') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('account no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('ifsc code') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('branch') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($employees as $key => $employee): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $employee->has('employee_designation') ? h($employee->employee_designation->name) : '' ?></td>
                            <td><?= h($employee->name) ?></td>
                            <td><?= h($employee->date_of_joining) ?></td>
                            <td><?= h($employee->contact_no) ?></td>
                            <td><?= h($employee->email) ?></td>
                            <td><?= h($employee->employee_code) ?></td>
                            <td><?= h($employee->grade) ?></td>
                            <td><?= h($employee->dob) ?></td>
                            <td><?= h($employee->work_location) ?></td>
                            <td><?= h($employee->pf) ?></td>
                            <td><?= h($employee->kyc) ?></td>
                            <td><?= h($employee->sub_location) ?></td>
                            <td><?= h($employee->account_holder_name) ?></td>
                            <td><?= h($employee->bank) ?></td>
                            <td><?= h($employee->account_no) ?></td>
                            <td><?= h($employee->ifsc_code) ?></td>
                            <td><?= h($employee->branch) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $employee->id],['class'=>'btn btn-sm btn-success modal_btn','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>
</div>


<?= $this->element('datepicker') ?>
<?= $this->element('selectpicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('fileinput') ?>
