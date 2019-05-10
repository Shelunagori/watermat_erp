<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <div class="col-md-6">
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
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('name', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Name']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('product_category_id', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('product_category_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $productCategories,'required']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('warranty_days', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('warranty_days',['label'=>false,'class'=>'form-control','placeholder'=>'Warranty Days']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('unit_id', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('unit_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $units,'required']); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <?= $this->Form->label('image', null, ['class'=>'control-label col-sm-3 text-right']) ?>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('image',['label'=>false,'class'=>'form-control','type'=>'file']); ?>
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
                    <span class="caption-subject"><?= __('Products') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize"><?= 'Sr.No.' ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('product_category_id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('warranty_days') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('unit_id') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($products as $key => $product): $sr_no++;?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= $product->product_category->name ?></td>
                            <td><?= $this->Number->format($product->warranty_days) ?></td>
                            <td><?= $product->unit->name ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'index', $product->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
<?= $this->element('fileinput') ?>