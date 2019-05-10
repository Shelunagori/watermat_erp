<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit User') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($user) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('username', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('username',['label'=>false,'class'=>'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('password', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('password',['label'=>false,'class'=>'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('employee_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('employee_id', ['label'=>false,'class'=>'form-control select2me input-sm','options' => $employees, 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vendor_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('vendor_id', ['label'=>false,'class'=>'form-control select2me input-sm','options' => $vendors, 'empty' => true]); ?>
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
