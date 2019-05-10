<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SiteSelection $siteSelection
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Site Selection') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($siteSelection,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('village_work_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_work_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villageWorks]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('lendmark', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('lendmark',['label'=>false,'class'=>'form-control','placeholder'=>'lendmark']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('gram_panchayat_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('gram_panchayat_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $gramPanchayats, 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('mla_constituency_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('mla_constituency_id',['label'=>false,'class'=>'form-control','placeholder'=>'mla_constituency_id']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('borewell_available', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('borewell_available',['label'=>false,'class'=>'form-control','placeholder'=>'borewell_available']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('borwell_distance', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('borwell_distance',['label'=>false,'class'=>'form-control','placeholder'=>'borwell_distance']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('electricity_available', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('electricity_available',['label'=>false,'class'=>'form-control','placeholder'=>'electricity_available']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('electricity_distance', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('electricity_distance',['label'=>false,'class'=>'form-control','placeholder'=>'electricity_distance']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('moter_lowered', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('moter_lowered',['label'=>false,'class'=>'form-control','placeholder'=>'moter_lowered']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('moter_distance', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('moter_distance',['label'=>false,'class'=>'form-control','placeholder'=>'moter_distance']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('raw_water_tds', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('raw_water_tds',['label'=>false,'class'=>'form-control','placeholder'=>'raw_water_tds']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('obstacle', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('obstacle',['label'=>false,'class'=>'form-control','placeholder'=>'obstacle']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('image', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('image',['label'=>false,'class'=>'form-control','placeholder'=>'image']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('remark', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('remark',['label'=>false,'class'=>'form-control','placeholder'=>'remark']); ?>
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
