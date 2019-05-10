<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PunchAttendance $punchAttendance
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Punch Attendance') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($punchAttendance,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('start_points', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('start_points',['label'=>false,'class'=>'form-control','placeholder'=>'start_points']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('end_points', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('end_points',['label'=>false,'class'=>'form-control','placeholder'=>'end_points']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('distance', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('distance',['label'=>false,'class'=>'form-control','placeholder'=>'distance']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('vehicle', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('vehicle',['label'=>false,'class'=>'form-control','placeholder'=>'vehicle']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('price_pr_km', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('price_pr_km',['label'=>false,'class'=>'form-control','placeholder'=>'price_pr_km']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('travel_from', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('travel_from',['label'=>false,'class'=>'form-control','placeholder'=>'travel_from']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('travel_to', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('travel_to',['label'=>false,'class'=>'form-control','placeholder'=>'travel_to']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('user_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('user_id',['label'=>false,'class'=>'form-control','placeholder'=>'user_id']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('total_amount', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('total_amount',['label'=>false,'class'=>'form-control','placeholder'=>'total_amount']); ?>
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
