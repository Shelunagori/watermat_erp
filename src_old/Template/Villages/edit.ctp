<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Village $village
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?= __('Edit Village') ?></h4>
</div>
<?= $this->Form->create($village,['autocomplete'=>'off','type'=>'file']) ?>
<div class="modal-body">
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
                    <?= $this->Form->label('block_id', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('block_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $divisions]); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('population', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('population',['label'=>false,'class'=>'form-control','placeholder'=>'population']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('no_household', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('no_household',['label'=>false,'class'=>'form-control','placeholder'=>'no_household']); ?>
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
                    <?= $this->Form->label('customer_care', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('customer_care',['label'=>false,'class'=>'form-control','placeholder'=>'customer_care']); ?>
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
