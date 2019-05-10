<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Edit Menu') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($menu,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('menu_name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('menu_name',['label'=>false,'class'=>'form-control','placeholder'=>'menu_name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('parent_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('parent_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $parentMenus, 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('controller', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('controller',['label'=>false,'class'=>'form-control','placeholder'=>'controller']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('action', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('action',['label'=>false,'class'=>'form-control','placeholder'=>'action']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('icon_class_name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('icon_class_name',['label'=>false,'class'=>'form-control','placeholder'=>'icon_class_name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('is_hidden', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('is_hidden',['label'=>false,'class'=>'form-control','placeholder'=>'is_hidden']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('query_string', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('query_string',['label'=>false,'class'=>'form-control','placeholder'=>'query_string']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('target', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('target',['label'=>false,'class'=>'form-control','placeholder'=>'target']); ?>
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
