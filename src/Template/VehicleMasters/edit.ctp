<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VehicleMaster $vehicleMaster
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Vehicle Master') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($vehicleMaster,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vehicle', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('vehicle',['label'=>false,'class'=>'form-control','placeholder'=>'vehicle']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('price_pr_km', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('price_pr_km',['label'=>false,'class'=>'form-control','placeholder'=>'price_pr_km']); ?>
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
