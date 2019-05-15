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
    <h3 class="modal-title">Operation & Management</h3>
</div>

<div class="modal-body">
    <div class="form-body">
        <?php
        foreach ($omSchedules as $omSchedule) 
        {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-control form-group" style="height: 100%">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('plant_status', null, ['class'=>'control-label label-weight']) ?>
                                    : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->plant_status) ?></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('plant_service', null, ['class'=>'control-label label-weight']) ?>
                                     : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->plant_service) ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('reson_for_not_done', null, ['class'=>'control-label label-weight']) ?>
                                     : 
                                     <label class="control-label"><?= h($omSchedule->om_schedule_form->reason) ?></label>
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
                                    <?= $this->Form->label('treated_water_flow', null, ['class'=>'control-label label-weight']) ?>
                                    : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->treated_water_flow) ?></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                                                    <?= $this->Html->image('/'.$omSchedule->om_schedule_form->twf_image) ?>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-control form-group" style="height: 100%">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('reject_flow', null, ['class'=>'control-label label-weight']) ?>
                                    : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->reject_flow) ?></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                                                    <?= $this->Html->image('/'.$omSchedule->om_schedule_form->reject_image) ?>
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $this->Form->label('dosing', null, ['class'=>'control-label label-weight']) ?>
                        : 
                        <label class="control-label"><?= h($omSchedule->om_schedule_form->dosing) ?></label>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-control form-group" style="height: 100%">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('card_issued', null, ['class'=>'control-label label-weight']) ?>
                                    : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->card_issued) ?></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('card_amount', null, ['class'=>'control-label label-weight']) ?>
                                     : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->card_amount) ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('card_recharge', null, ['class'=>'control-label label-weight']) ?>
                                     : 
                                     <label class="control-label"><?= h($omSchedule->om_schedule_form->recharge) ?></label>
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
                                    <?= $this->Form->label('card_operator', null, ['class'=>'control-label label-weight']) ?>
                                    : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->card_operator) ?></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('card_amount_collected', null, ['class'=>'control-label label-weight']) ?>
                                     : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->amount_collected) ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('card_amount_operator', null, ['class'=>'control-label label-weight']) ?>
                                     : 
                                     <label class="control-label"><?= h($omSchedule->om_schedule_form->amount_operator) ?></label>
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
                                    <?= $this->Form->label('ro_meter_reading', null, ['class'=>'control-label label-weight']) ?>
                                    : 
                                    <label class="control-label"><?= h($omSchedule->om_schedule_form->ro_meter_reading) ?></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                                                    <?= $this->Html->image('/'.$omSchedule->om_schedule_form->ro_image) ?>
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
            <?php
        }
        ?>
        

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