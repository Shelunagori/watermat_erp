<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
$this->assign('title', 'create user');
?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title text-center" style="padding-bottom: 5px;">
                <!-- <div class="caption">
                    <i class="icon-pin font-yellow-lemon"></i>
                    <span class="caption-subject bold font-yellow-lemon uppercase">
                    Tabs </span>
                    <span class="caption-helper">more samples...</span>
                </div> -->
                        <a href="#employee" data-toggle="tab" class="btn btn-default text-uppercase tab-a <?= $tab == 'employee' ? 'active' : '' ?>">
                        Employee </a>
                        <a href="#vendor" data-toggle="tab" class="btn btn-default text-uppercase tab-a <?= $tab == 'vendor' ? 'active' : '' ?>">
                        Vendor </a>
                        <a href="#operator" data-toggle="tab" class="btn btn-default text-uppercase tab-a <?= $tab == 'operator' ? 'active' : '' ?>">
                        operator </a>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <div class="tab-pane <?= $tab == 'employee' ? 'active' : '' ?>" id="employee">
                        <?= $this->Form->create($employee,['validate'=>true,'autocomplete'=>'off','type'=>'file','url'=>['controller'=>'Employees','action'=>'add']]) ?>
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
                                            <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name','required']); ?>
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
                                            <?php $data = ['Field'=>'Field','Office'=>'Office','Admin'=>'Admin']; ?>
                                            <?= $this->Form->label('work_location', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('work_location',['label'=>false,'class'=>'form-control select2me input-sm','options'=>$data]); ?>
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
                                            <?= $this->Form->label('Permanent Address', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('address',['label'=>false,'class'=>'form-control','placeholder'=>'Permanent Address']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Select image </span>
                                                    <input type="file" name="image">
                                                    </span>
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
                            <div class="form-actions text-center">
                                <?= $this->Form->button(__('Submit'),['class'=>'btn text-uppercase btn-success']) ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="tab-pane <?= $tab == 'vendor' ? 'active' : '' ?>" id="vendor">
                        <?= $this->Form->create($vendor,['validate'=>true,'autocomplete'=>'off','type'=>'file','url'=>['controller'=>'Vendors','action'=>'add']]) ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('vendor_designation_id', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('vendor_designation_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $vendorDesignations]); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('Vendor Name', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Vendor Name','required']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('Date of vendor registration', null, ['class'=>'control-label']) ?>
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
                                            <?= $this->Form->label('Contact no', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'Contact no']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('Email', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('email',['label'=>false,'class'=>'form-control','placeholder'=>'Email']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('GST No', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('gst_no',['label'=>false,'class'=>'form-control','placeholder'=>'gst_no']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('PAN No', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('pan_no',['label'=>false,'class'=>'form-control','placeholder'=>'PAN No']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('Contact Person Name', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('contact_person',['label'=>false,'class'=>'form-control','placeholder'=>'Contact Person Name']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
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
                                                    Contact Person Image </span>
                                                    <span class="fileinput-exists">
                                                    Contact Person Image </span>
                                                    <input type="file" name="contact_person_image">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('Registered address', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('address',['label'=>false,'class'=>'form-control','placeholder'=>'Registered address']); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('Payment Terms', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('payment_term',['label'=>false,'class'=>'form-control','placeholder'=>'Payment Terms']); ?>
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
                                                                Firm/Company Reg. </span>
                                                                <span class="fileinput-exists">
                                                                Firm/Company Reg. </span>
                                                                <input type="file" name="f_c_r_certificate">
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
                                                                PF Reg. </span>
                                                                <span class="fileinput-exists">
                                                                PF Reg. </span>
                                                                <input type="file" name="pf_registration_certificate">
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
                                                                ESIC Reg. </span>
                                                                <span class="fileinput-exists">
                                                                ESIC Reg. </span>
                                                                <input type="file" name="esic_registration_certificate">
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
                                                                ID Proof </span>
                                                                <span class="fileinput-exists">
                                                                ID Proof </span>
                                                                <input type="file" name="id_proof">
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
                                                                Other </span>
                                                                <span class="fileinput-exists">
                                                                Other </span>
                                                                <input type="file" name="other">
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
                            <div class="form-actions text-center">
                                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="tab-pane <?= $tab == 'operator' ? 'active' : '' ?>" id="operator">
                        <?= $this->Form->create($operator,['autocomplete'=>'off','type'=>'file','url'=>['controller'=>'Operators','action'=>'add']]) ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages]); ?>
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
                                            <?= $this->Form->label('father_name', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('father_name',['label'=>false,'class'=>'form-control','placeholder'=>'father_name']); ?>
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
                                            <?= $this->Form->label('qualification', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('qualification',['label'=>false,'class'=>'form-control','placeholder'=>'qualification']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('aadhar_number', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('aadhar_number',['label'=>false,'class'=>'form-control','placeholder'=>'aadhar_number']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('pan_number', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('pan_number',['label'=>false,'class'=>'form-control','placeholder'=>'pan_number']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('date_of_appointment', null, ['class'=>'control-label']) ?>
                                            <div class="input-icon right">
                                                <i class="fa fa-calendar"></i>
                                                <?= $this->Form->control('date_of_appointment', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <?= $this->Form->label('salary_paid_upto', null, ['class'=>'control-label']) ?>
                                            <div class="input-icon right">
                                                <i class="fa fa-calendar"></i>
                                                <?= $this->Form->control('salary_paid_upto', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                            </div>
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
                                            <?= $this->Form->label('incentive_plan_id', null, ['class'=>'control-label']) ?>
                                            <?= $this->Form->control('incentive_plan_id',['label'=>false,'class'=>'form-control','placeholder'=>'incentive_plan_id']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
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
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Select image </span>
                                                    <input type="file" name="image">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                                    ID Proof </span>
                                                    <span class="fileinput-exists">
                                                    ID Proof </span>
                                                    <input type="file" name="id_proof">
                                                    </span>
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
                            </div>
                            <div class="form-actions text-center">
                                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('datepicker') ?>
<?= $this->element('selectpicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('fileinput') ?>

<?php
$js="
$(document).ready(function(){
    $(document).on('click','.tab-a',function(){
        $('.tab-a').removeClass('active');
        $(this).addClass('active');
    })
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>