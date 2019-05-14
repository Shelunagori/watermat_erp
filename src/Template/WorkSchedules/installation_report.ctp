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
    <h3 class="modal-title">Installation</h3>
</div>

<div class="modal-body">
    <div class="form-body">
        <?php
        foreach ($workSchedule->work_schedule_rows as $work_schedule_row) 
        {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $this->Form->label('work_description', null, ['class'=>'control-label label-weight']) ?>
                             : 
                            <label class="control-label"><?= h($work_schedule_row->name) ?></label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $this->Form->label('work_satisfactory', null, ['class'=>'control-label label-weight']) ?>
                            : 
                            <label class="control-label"><?= ($work_schedule_row->has('work_satisfaction'))?($work_schedule_row->work_satisfaction->is_satisfied==1)?'Yes':'No':'' ?></label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $this->Form->label('remark', null, ['class'=>'control-label label-weight']) ?>
                            : 
                             <label class="control-label"><?= ($work_schedule_row->has('work_satisfaction'))?($work_schedule_row->work_satisfaction->remark):'' ?></label>
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
                                            <?= ($work_schedule_row->has('work_satisfaction'))?($this->Html->image('/'.$work_schedule_row->work_satisfaction->image)):'' ?>
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
        
    </div>
</div>