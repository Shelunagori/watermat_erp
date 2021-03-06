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
                    <span class="caption-subject"><?= __('Vendors') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create('',['type'=>'get']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?= $this->Form->label('vendor_designation_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('vendor_designation_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $vendorDesignations,'value' =>@$vendor_designation_id]); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Name','value' =>@$name]); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?= $this->Form->label('email', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('email',['label'=>false,'class'=>'form-control','placeholder'=>'Email','value'=>@$email]); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'Contact No.','value'=>@$contact_no]); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->label('date_of_joining', null, ['class'=>'control-label']) ?>
                                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-M-yyyy">
                                    <?= $this->Form->control('from',['label'=>false,'class'=>'form-control','placeholder'=>'From','value'=> @$from]); ?>
                                    <span class="input-group-addon">
                                    to </span>
                                     <?= $this->Form->control('to',['label'=>false,'class'=>'form-control','placeholder'=>'To','value'=>@$to]); ?>
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
                    </div>
                <?= $this->Form->end() ?>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('Sr.No.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('Designation') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('name') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('joining') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('contact') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('email') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('GST no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('PAN no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('contact person') ?></th>
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
                        <?php foreach ($vendors as $key => $vendor): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $vendor->has('vendor_designation') ? h($vendor->vendor_designation->name) : '' ?></td>
                            <td><?= h($vendor->name) ?></td>
                            <td><?= h($vendor->date_of_joining) ?></td>
                            <td><?= h($vendor->contact_no) ?></td>
                            <td><?= h($vendor->email) ?></td>
                            <td><?= h($vendor->gst_no) ?></td>
                            <td><?= h($vendor->pan_no) ?></td>
                            <td><?= h($vendor->contact_person) ?></td>
                            <td><?= h($vendor->account_holder_name) ?></td>
                            <td><?= h($vendor->bank) ?></td>
                            <td><?= h($vendor->account_no) ?></td>
                            <td><?= h($vendor->ifsc_code) ?></td>
                            <td><?= h($vendor->branch) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-book' ></i>"), ['action' => 'view', $vendor->id],['class'=>'btn btn-sm btn-success modal_btn_view','escape'=>false]) ?>
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $vendor->id],['class'=>'btn btn-sm btn-success modal_btn','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $vendor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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