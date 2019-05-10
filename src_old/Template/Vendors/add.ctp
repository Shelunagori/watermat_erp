<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendor $vendor
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Vendor') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($vendor,['autocomplete'=>'off','file'=>true]) ?>
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
                                    <?= $this->Form->label('gst_no', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('gst_no',['label'=>false,'class'=>'form-control','placeholder'=>'gst_no']); ?>
                                </div>
                            </div>
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('contact_person_image', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('contact_person_image',['label'=>false,'class'=>'form-control','placeholder'=>'contact_person_image']); ?>
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
                                    <?= $this->Form->label('bank', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('bank',['label'=>false,'class'=>'form-control','placeholder'=>'bank']); ?>
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
                                    <?= $this->Form->label('f_c_r_certificate', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('f_c_r_certificate',['label'=>false,'class'=>'form-control','placeholder'=>'f_c_r_certificate']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('pf_registration_certificate', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('pf_registration_certificate',['label'=>false,'class'=>'form-control','placeholder'=>'pf_registration_certificate']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('esic_registration_certificate', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('esic_registration_certificate',['label'=>false,'class'=>'form-control','placeholder'=>'esic_registration_certificate']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('id_proof', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('id_proof',['label'=>false,'class'=>'form-control','placeholder'=>'id_proof']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('payment_term', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('payment_term',['label'=>false,'class'=>'form-control','placeholder'=>'payment_term']); ?>
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
