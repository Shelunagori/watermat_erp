<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Village $village
 */
$this->assign('title', 'Assign Users');
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Assign Employees') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($village,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('state_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('state_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $states,'required']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('district_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('district_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => []]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('division_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('division_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => []]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('block_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('block_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => []]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => []]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('designation', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('designation', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $employeePosts,'required']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('employee_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('employee_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $employees,'required']); ?>
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
<?= $this->element('validate') ?>
<?= $this->element('state_district') ?>
<?= $this->element('district_division') ?>
<?= $this->element('division_block') ?>
<?= $this->element('block_village') ?>
<?= $this->element('loading') ?>

<?php
$js="
$(document).ready(function(){
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>
