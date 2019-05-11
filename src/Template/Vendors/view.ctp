<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $vendor
 */
?>
<style type="text/css">
    textarea.form-control {
        height: none !important;
    }
    .label-weight
    {
        font-weight: 600;
    }
</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">View Vendor</h4>
</div>

<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('vendor_designation_id', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($vendor->vendor_designation->name) ?></label>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('name', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->name) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('date_of_joining', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->date_of_joining) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->contact_no) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('email', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->email) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('gst_no', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->gst_no) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('pan_no', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($vendor->pan_no) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_person', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($vendor->contact_person) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('address', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->address) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('payment_term', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($vendor->payment_term) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><strong>BANK DETAILS</strong></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_holder_name', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($vendor->account_holder_name) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('bank', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($vendor->bank) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_no', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($vendor->account_no) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('ifsc_code', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($vendor->ifsc_code) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('branch', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($vendor->branch) ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><strong>UPLOADED DOCUMENTS</strong></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$vendor->f_c_r_certificate) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        Firm/Company Reg. </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$vendor->pf_registration_certificate) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        PF Reg. </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$vendor->esic_registration_certificate) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        ESIC Reg. </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$vendor->id_proof) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        ID Proof </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$vendor->other) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        Others </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
