<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorVillage $vendorVillage
 */
?>
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Site Selection Date') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($village,['autocomplete'=>'off']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages,'required'=>true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->label('schedule_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('schedule_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text', 'required'=>true]); ?>
                                    </div>
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
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Site Selection Date') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create('',['type'=>'get']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('schedule_date', null, ['class'=>'control-label']) ?>
                                   <?= $this->Form->control('schedule_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('Search', null, ['class'=>'control-label','style'=>'visibility: hidden;']) ?>
                                    <div class="input-icon right">
                                       <?= $this->Form->button(__('Search'),['class'=>'btn text-uppercase btn-success','name'=>'search','value'=>'search']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('Sr.No.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('Village') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('schedule_date') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($villageWorks as $key => $villageWork): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $villageWork->has('village') ? h($villageWork->village->name) : '' ?></td>
                            <td><?= h($villageWork->schedule_date) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->element('selectpicker'); ?>
<?= $this->element('datepicker'); ?>