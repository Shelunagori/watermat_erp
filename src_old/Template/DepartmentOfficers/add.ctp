<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DepartmentOfficer $departmentOfficer
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Department Officer') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($departmentOfficer,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('project_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('project_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $projects]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('do_post_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('do_post_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $doPosts]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'contact_no']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('email', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('email',['label'=>false,'class'=>'form-control','placeholder'=>'email']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('dob', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('dob', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('image', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('image',['label'=>false,'class'=>'form-control','placeholder'=>'image']); ?>
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
