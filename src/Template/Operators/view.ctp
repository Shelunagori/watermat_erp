<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $operator
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
    <h4 class="modal-title">View Operator</h4>
</div>

<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('village', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($operator->village->name) ?></label>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('name', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->name) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('father_name', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->father_name) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->contact_no) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('qualification', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->qualification) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('aadhar_number', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->aadhar_number) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('pan_number', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($operator->pan_number) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('date_of_appointment', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($operator->date_of_appointment) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('salary_paid_upto', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->salary_paid_upto) ?></label>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('pf', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($operator->pf) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('esi_kyc', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($operator->kyc) ?></label>
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
                                : <label class="control-label"><?= h($operator->account_holder_name) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('bank', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($operator->bank) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_no', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($operator->account_no) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('ifsc_code', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($operator->ifsc_code) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('branch', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($operator->branch) ?></label>
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
                                        <?= $this->Html->image('/'.$operator->image) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        Image </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$operator->id_proof) ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
