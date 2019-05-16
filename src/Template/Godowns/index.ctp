<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Godown[]|\Cake\Collection\CollectionInterface $godowns
 */
?>
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Godown') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($godown,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('name', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('state', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('state',['label'=>false,'class'=>'form-control','placeholder'=>'state']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('district', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('district',['label'=>false,'class'=>'form-control','placeholder'=>'district']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('city', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('city',['label'=>false,'class'=>'form-control','placeholder'=>'city']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('area', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('area',['label'=>false,'class'=>'form-control','placeholder'=>'area']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('Incharge', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('employee_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $employees]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('Main Godown ?', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('is_main',['label'=>'Yes','class'=>'form-control','placeholder'=>'is_main']); ?>
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
                    <span class="caption-subject"><?= __('Godowns') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create('',['type'=>'get']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('Incharge', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('employee_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $employees,'value' =>@$employee_id]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Name','value' =>@$name]); ?>
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
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col" class="text-capitalize"><?= 'Incharge' ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($godowns as $key => $godown): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= h($godown->name) ?></td>
                            <td><?= $godown->has('employee') ? h($godown->employee->name) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'index', $godown->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $godown->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
                            </td>
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
<?= $this->element('selectpicker') ?>
<?= $this->element('validate') ?>