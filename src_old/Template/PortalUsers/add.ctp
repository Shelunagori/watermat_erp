<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PortalUser $portalUser
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Portal User') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($portalUser,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('portal_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('portal_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $portals]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('user_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('user_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $users]); ?>
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
