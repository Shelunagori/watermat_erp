<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Product') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($product,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('brand_name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('brand_name',['label'=>false,'class'=>'form-control','placeholder'=>'brand_name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('product_category_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('product_category_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $productCategories]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('warranty_days', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('warranty_days',['label'=>false,'class'=>'form-control','placeholder'=>'warranty_days']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('unit_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('unit_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $units]); ?>
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
