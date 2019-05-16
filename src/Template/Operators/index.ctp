<style type="text/css">
    input {
    border-radius: 0px !important;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Operators') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create('',['type'=>'get']) ?>
                    <div class="form-body">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Name']); ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <?= $this->Form->label('contact_no', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'Contact No.']); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?= $this->Form->label('date_of_appointment', null, ['class'=>'control-label']) ?>
                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-M-yyyy">
                                <?= $this->Form->control('from',['label'=>false,'class'=>'form-control','placeholder'=>'From']); ?>
                                <span class="input-group-addon">
                                to </span>
                                 <?= $this->Form->control('to',['label'=>false,'class'=>'form-control','placeholder'=>'To']); ?>
                            </div>
                            <!-- /input-group -->
                            <span class="help-block">
                            Select date range </span>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?= $this->Form->label('Search', null, ['class'=>'control-label','style'=>'visibility: hidden;']) ?>
                                <div class="input-icon right">
                                   <?= $this->Form->button(__('Search'),['class'=>'btn text-uppercase btn-success','name'=>'search','value'=>'search']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize"> sr. no.                </th>
                            <th scope="col" class="text-capitalize"> Village                </th>
                            <th scope="col" class="text-capitalize"> name                   </th>
                            <th scope="col" class="text-capitalize"> father name            </th>
                            <th scope="col" class="text-capitalize"> contact no             </th>
                            <th scope="col" class="text-capitalize"> qualification          </th>
                            <th scope="col" class="text-capitalize"> aadhar number          </th>
                            <th scope="col" class="text-capitalize"> pan number             </th>
                            <th scope="col" class="text-capitalize"> date of appointment    </th>
                            <th scope="col" class="text-capitalize"> salary paid upto       </th>
                            <th scope="col" class="text-capitalize"> PF                     </th>
                            <th scope="col" class="text-capitalize"> ESI KYC                </th>
                            <!-- <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('incentive_plan_id') ?></th> -->
                            <th scope="col" class="text-capitalize"> account holder name    </th>
                            <th scope="col" class="text-capitalize"> bank                   </th>
                            <th scope="col" class="text-capitalize"> account no             </th>
                            <th scope="col" class="text-capitalize"> ifsc code              </th>
                            <th scope="col" class="text-capitalize">branch                  </th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($operators as $key => $operator): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $operator->has('village') ? h($operator->village->name) : '' ?></td>
                            <td><?= h($operator->name) ?></td>
                            <td><?= h($operator->father_name) ?></td>
                            <td><?= h($operator->contact_no) ?></td>
                            <td><?= h($operator->qualification) ?></td>
                            <td><?= h($operator->aadhar_number) ?></td>
                            <td><?= h($operator->pan_number) ?></td>
                            <td><?= h($operator->date_of_appointment) ?></td>
                            <td><?= h($operator->salary_paid_upto) ?></td>
                            <td><?= h($operator->pf) ?></td>
                            <td><?= h($operator->kyc) ?></td>
                            <!-- <td><?= $this->Number->format($operator->incentive_plan_id) ?></td> -->
                            <td><?= h($operator->account_holder_name) ?></td>
                            <td><?= h($operator->bank) ?></td>
                            <td><?= h($operator->account_no) ?></td>
                            <td><?= h($operator->ifsc_code) ?></td>
                            <td><?= h($operator->branch) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-book' ></i>"), ['action' => 'view', $operator->id],['class'=>'btn btn-sm btn-success modal_btn_view','escape'=>false]) ?>
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $operator->id],['class'=>'btn btn-sm btn-success modal_btn','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $operator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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

<?= $this->element('selectpicker') ?>
<?= $this->element('datepicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('fileinput') ?>