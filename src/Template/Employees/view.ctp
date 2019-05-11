<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
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
    <h4 class="modal-title">View Employee</h4>
</div>

<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('employee_designation_id', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($employee->employee_designation->name) ?></label>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('name', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->name) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('date_of_joining', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->date_of_joining) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->contact_no) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('email', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->email) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('employee_code', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->employee_code) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('latitude', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($employee->latitude) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('longitude', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($employee->longitude) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('grade', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->grade) ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('dob', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->dob) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('work_location', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($employee->work_location) ?></label>
                </div>
            </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('sub_location', null, ['class'=>'control-label label-weight']) ?>
                        : 
                        <label class="control-label"><?= h($employee->sub_location) ?></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('pf', null, ['class'=>'control-label text-uppercase label-weight']) ?>
                        : 
                        <label class="control-label"><?= h($employee->pf) ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('esi_kyc', null, ['class'=>'control-label text-uppercase label-weight']) ?>
                        : 
                        <label class="control-label"><?= h($employee->kyc) ?></label>
                    </div>
                </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('address', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($employee->address) ?></label>
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
                                : <label class="control-label"><?= h($employee->account_holder_name) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('bank', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($employee->bank) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_no', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($employee->account_no) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('ifsc_code', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($employee->ifsc_code) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('branch', null, ['class'=>'control-label label-weight']) ?>
                                : <label class="control-label"><?= h($employee->branch) ?></label>
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
                                        <?= $this->Html->image('/'.$employee->adhar_card) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        Adhar Card </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$employee->dl) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        D.L. </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$employee->pan_card) ?>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn default btn-file">
                                        <span class="fileinput-exists">
                                        PAN Card </span>
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
