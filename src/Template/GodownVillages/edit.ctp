<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GodownVillage $godownVillage
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Godown Village') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($godownVillage,['autocomplete'=>'off','type'=>'file']) ?>
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
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages]); ?>
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
