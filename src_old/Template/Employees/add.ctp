<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Employee') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($employee,['autocomplete'=>'off','file'=>true]) ?>
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
                                    <?= $this->Form->label('image', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('image',['label'=>false,'class'=>'form-control','placeholder'=>'image']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('address', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('address',['label'=>false,'class'=>'form-control','placeholder'=>'address']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('account_holder_name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('account_holder_name',['label'=>false,'class'=>'form-control','placeholder'=>'account_holder_name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('bank_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('bank_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $banks, 'empty' => true]); ?>
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('adhar_card', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('adhar_card',['label'=>false,'class'=>'form-control','placeholder'=>'adhar_card']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('dl', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('dl',['label'=>false,'class'=>'form-control','placeholder'=>'dl']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('pan_card', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('pan_card',['label'=>false,'class'=>'form-control','placeholder'=>'pan_card']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions text-center">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
