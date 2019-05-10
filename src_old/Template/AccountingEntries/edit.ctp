<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry $accountingEntry
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Accounting Entry') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($accountingEntry,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('godown_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('godown_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $godowns]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('product_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('product_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $products]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('serial_no', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('serial_no',['label'=>false,'class'=>'form-control','placeholder'=>'serial_no']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('purchase_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('purchase_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('expiry_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('expiry_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('transaction_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('transaction_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vendor_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('vendor_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $vendors, 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('status', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('status',['label'=>false,'class'=>'form-control','placeholder'=>'status']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('refer_to', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('refer_to',['label'=>false,'class'=>'form-control','placeholder'=>'refer_to']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('receive_godown_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('receive_godown_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $receiveGodowns, 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages, 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('plant_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('plant_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $plants, 'empty' => true]); ?>
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
