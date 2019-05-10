<?php
$this->assign('title','Plant Transport');
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Transport') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($transport,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('plant_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('plant_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $plants,'required']); ?>
                                    <?= $this->Form->hidden('transports.0.id'); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages,'required']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vendor_name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('transports.0.vendor_name',['label'=>false,'class'=>'form-control','placeholder'=>'vendor_name']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('dispatch_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('transports.0.dispatch_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('expected_delivery_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('transports.0.expected_delivery_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vehicle', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('transports.0.vehicle',['label'=>false,'class'=>'form-control','placeholder'=>'vehicle']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('driver_name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('transports.0.driver_name',['label'=>false,'class'=>'form-control','placeholder'=>'driver_name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('transports.0.contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'contact_no']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vehicle_number', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('transports.0.vehicle_number',['label'=>false,'class'=>'form-control','placeholder'=>'vehicle_number']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('eway_bill_no', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('transports.0.bill_no',['label'=>false,'class'=>'form-control','placeholder'=>'bill_no']); ?>
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
                                            Upload Reciept </span>
                                            <span class="fileinput-exists">
                                            Upload Reciept </span>
                                            <input type="file" name="transports.0.receipt">
                                            </span>
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
<?= $this->element('selectpicker') ?>
<?= $this->element('datepicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('fileinput') ?>