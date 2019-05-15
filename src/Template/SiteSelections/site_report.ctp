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
    <h3 class="modal-title">Site Selection</h3>
</div>

<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('date', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($siteSelection->date) ?></label>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('GPS Co-ordinates of Site', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($siteSelection->gps_co_ordinates) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('lendmark', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($siteSelection->lendmark) ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('gram_panchayat_id', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($siteSelection->gram_panchayat->name) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('mla_constituency_id', null, ['class'=>'control-label label-weight']) ?>
                     : 
                    <label class="control-label"><?= h($siteSelection->mla_constituency->name) ?></label>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('sarpanch_name', null, ['class'=>'control-label label-weight']) ?>
                                 : 
                                <label class="control-label"><?= h($siteSelection->sarpanch) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('mobile_no', null, ['class'=>'control-label label-weight']) ?>.
                                : 
                                <label class="control-label"><?= h($siteSelection->mobile) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('email_Id', null, ['class'=>'control-label label-weight']) ?>
                                : 
                                <label class="control-label"><?= h($siteSelection->email) ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('borewell_available', null, ['class'=>'control-label label-weight']) ?>
                                 : 
                                <label class="control-label"><?= h($siteSelection->borewell_available) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('distance_from_site(meter/ft)', null, ['class'=>'control-label label-weight']) ?>.
                                : 
                                <label class="control-label"><?= h($siteSelection->borewell_distance).' '.h($siteSelection->borewell_unit) ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('moter_available', null, ['class'=>'control-label label-weight']) ?>
                                 : 
                                <label class="control-label"><?= h($siteSelection->moter_lowered) ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('electricity_available', null, ['class'=>'control-label label-weight']) ?>
                                 : 
                                <label class="control-label"><?= h($siteSelection->electricity_available) ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('distance_from_site(meter/ft)', null, ['class'=>'control-label label-weight']) ?>.
                                : 
                                <label class="control-label"><?= h($siteSelection->electricity_distance).' '.h($siteSelection->electricity_unit) ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('raw_water_tds', null, ['class'=>'control-label label-weight']) ?>
                         : 
                        <label class="control-label"><?= h($siteSelection->raw_water_tds) ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('obstacle_if_any', null, ['class'=>'control-label label-weight']) ?>
                         : 
                        <label class="control-label"><?= h($siteSelection->obstacle) ?></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('remark', null, ['class'=>'control-label label-weight']) ?>
                         : 
                        <label class="control-label"><?= h($siteSelection->remark) ?></label>
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
                                        <?= $this->Html->image('/'.$siteSelection->image) ?>
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