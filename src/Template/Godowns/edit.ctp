<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Godown $godown
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Godown') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($godown,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('state', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('state',['label'=>false,'class'=>'form-control','placeholder'=>'state']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('district', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('district',['label'=>false,'class'=>'form-control','placeholder'=>'district']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('city', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('city',['label'=>false,'class'=>'form-control','placeholder'=>'city']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('area', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('area',['label'=>false,'class'=>'form-control','placeholder'=>'area']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('employee_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('employee_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $employees]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('is_main', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('is_main',['label'=>false,'class'=>'form-control','placeholder'=>'is_main']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('image', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('image',['label'=>false,'class'=>'form-control','placeholder'=>'image']); ?>
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
