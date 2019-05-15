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
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('block', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($village->block->name) ?></label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('village', null, ['class'=>'control-label label-weight']) ?>
                    : 
                    <label class="control-label"><?= h($village->name) ?></label>
                </div>
            </div>
        </div>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               <th>Mat. Name</th>
                               <th>Mat. Req. Qty.</th>
                               <th>Mat. Approved Qty.</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($omSchedule->village_requests as $village_request) 
                        {
                            foreach ($village_request->village_request_products as $village_request_product) 
                            {
                                ?>
                                <tr>
                                    <td><?= $village_request_product->product->name ?></td>
                                    <td><?= $village_request_product->quantity ?></td>
                                    <td><?= $village_request_product->om_quantity ?></td>
                                </tr>
                                <?php
                            }
                            
                        }
                        ?>
                        </tbody>
                    </table>
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
            <hr style="border-top: dotted 2px;" />
            <?php
        }
        ?>
    </div>
</div>