<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $siteSelection
 */
?>
<style type="text/css">
    textarea.form-control {
        height: none !important;
    }
    .label-weight
    {
        font-weight: 600;
    }
</style>

<div class="modal-header">
    <h3 class="modal-title">Shelter</h3>
</div>

<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('installation_complete_date', null, ['class'=>'control-label label-weight']) ?>
                         : 
                        <label class="control-label"><?= h($shelter->installation_complete_date) ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('damages_visible_if_any', null, ['class'=>'control-label label-weight']) ?>
                         : 
                        <label class="control-label"><?= h($shelter->damages_visible) ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('remark', null, ['class'=>'control-label label-weight']) ?>
                        : 
                        <label class="control-label"><?= h($shelter->remark) ?></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><strong>Uploaded Image</strong></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <?= $this->Html->image('/'.$shelter->image) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>