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
</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Employee</h4>
</div>

<?= $this->Form->create($employee,['autocomplete'=>'off','type'=>'file']) ?>
<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('employee_designation_id', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('employee_designation_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $employeeDesignations]); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('date_of_joining', null, ['class'=>'control-label']) ?>
                    <div class="input-icon right">
                        <i class="fa fa-calendar"></i>
                        <?= $this->Form->control('date_of_joining', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'contact_no']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('email', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('email',['label'=>false,'class'=>'form-control','placeholder'=>'email']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('employee_code', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('employee_code',['label'=>false,'class'=>'form-control','placeholder'=>'employee_code']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('latitude', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('latitude',['label'=>false,'class'=>'form-control','placeholder'=>'latitude']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('longitude', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('longitude',['label'=>false,'class'=>'form-control','placeholder'=>'longitude']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('grade', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('grade',['label'=>false,'class'=>'form-control','placeholder'=>'grade']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('dob', null, ['class'=>'control-label']) ?>
                    <div class="input-icon right">
                        <i class="fa fa-calendar"></i>
                        <?= $this->Form->control('dob', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('work_location', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('work_location',['label'=>false,'class'=>'form-control','placeholder'=>'work_location']); ?>
                </div>
            </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('sub_location', null, ['class'=>'control-label']) ?>
                        <?= $this->Form->control('sub_location',['label'=>false,'class'=>'form-control','placeholder'=>'Sub Location']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('pf', null, ['class'=>'control-label text-uppercase']) ?>
                        <?= $this->Form->control('pf',['label'=>false,'class'=>'form-control','placeholder'=>'PF']); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('esi_kyc', null, ['class'=>'control-label text-uppercase']) ?>
                        <?= $this->Form->control('kyc',['label'=>false,'class'=>'form-control','placeholder'=>'ESI KYC']); ?>
                    </div>
                </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('address', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('address',['label'=>false,'class'=>'form-control','placeholder'=>'address']); ?>
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
                                <?= $this->Form->label('account_holder_name', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('account_holder_name',['label'=>false,'class'=>'form-control','placeholder'=>'account_holder_name']); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('bank', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('bank', ['label'=>false,'class'=>'form-control','placeholder' => 'Bank Name', 'empty' => true]); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_no', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('account_no',['label'=>false,'class'=>'form-control','placeholder'=>'account_no']); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('ifsc_code', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('ifsc_code',['label'=>false,'class'=>'form-control','placeholder'=>'ifsc_code']); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('branch', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('branch',['label'=>false,'class'=>'form-control','placeholder'=>'branch']); ?>
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
                                                    <div class="form-group"><strong>UPLOAD DOCUMENTS</strong></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="height: 150px;">
                                                                <?= $this->Html->image('upload.png') ?>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="btn default btn-file">
                                                                <span class="fileinput-new">
                                                                Adhar Card </span>
                                                                <span class="fileinput-exists">
                                                                Adhar Card </span>
                                                                <input type="file" name="adhar_card">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="height: 150px;">
                                                                <?= $this->Html->image('upload.png') ?>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="btn default btn-file">
                                                                <span class="fileinput-new">
                                                                D.L. </span>
                                                                <span class="fileinput-exists">
                                                                D.L. </span>
                                                                <input type="file" name="dl">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="height: 150px;">
                                                                <?= $this->Html->image('upload.png') ?>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="btn default btn-file">
                                                                <span class="fileinput-new">
                                                                PAN Card </span>
                                                                <span class="fileinput-exists">
                                                                PAN Card </span>
                                                                <input type="file" name="pan_card">
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
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
<?= $this->Form->end() ?>
