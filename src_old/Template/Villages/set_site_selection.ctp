<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorVillage $vendorVillage
 */
?>
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Site Selection Date') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($village,['autocomplete'=>'off']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages]); ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->label('schedule_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('schedule_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
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
<?= $this->element('selectpicker'); ?>
<?= $this->element('datepicker'); ?>