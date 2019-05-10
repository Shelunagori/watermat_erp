<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendor $vendor
 */
?>
<style type="text/css">
    textarea.form-control {
        height: !important;
    }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Vendor</h4>
</div>
<?= $this->Form->create($vendor,['autocomplete'=>'off','type'=>'file']) ?>
<div class="modal-body">
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
                    <?= $this->Form->label('gst_no', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('gst_no',['label'=>false,'class'=>'form-control','placeholder'=>'gst_no']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('pan_no', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('pan_no',['label'=>false,'class'=>'form-control','placeholder'=>'pan_no']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_person', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('contact_person',['label'=>false,'class'=>'form-control','placeholder'=>'contact_person']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-sm-4">
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
 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('address', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('address',['label'=>false,'class'=>'form-control','placeholder'=>'address']); ?>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('payment_term', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('payment_term',['label'=>false,'class'=>'form-control','placeholder'=>'payment_term']); ?>
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
