<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry[]|\Cake\Collection\CollectionInterface $accountingEntries
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Accounting Entries') ?></span>
                </div>
                <div class="actions">
                    <button class="btn btn-success"><span class="fa fa-search"></span> Search</button>
                </div>
            </div>
            <div class="portlet-body">
                <form action="<?= $this->Url->build(['action'=>'index']) ?>" autocomplete='off'>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"> Godown </label>
                                <?= $this->Form->control('godown_id', ['empty'=>'--ALL--','label'=>false,'class'=>'form-control select2me input-sm','options' => $godowns,'val' => @$_GET['godown_id']]); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"> Product </label>
                                <?= $this->Form->control('product_id', ['empty'=>'--ALL--','label'=>false,'class'=>'form-control select2me input-sm','options' => $products,'val' => @$_GET['product_id']]); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?= $this->Form->label('from_date', null, ['class'=>'control-label']) ?>
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <?= $this->Form->control('from_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text','val' => @$_GET['from_date']]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?= $this->Form->label('to_date', null, ['class'=>'control-label']) ?>
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <?= $this->Form->control('to_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text','val' => @$_GET['to_date']]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize">Sr.No.</th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('godown_id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('product_id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('quantity') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('transaction_date') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('status') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($accountingEntries as $key => $accountingEntry): $sr_no++;?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= $accountingEntry->has('godown') ? h($accountingEntry->godown->name) : '' ?></td>
                            <td><?= $accountingEntry->has('product') ? h($accountingEntry->product->name) : '' ?></td>
                            <td><?= $this->Number->format($accountingEntry->quantity) ?></td>
                            <td><?= h($accountingEntry->transaction_date) ?></td>
                            <td><?= h($accountingEntry->status) ?></td>
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
<?= $this->element('datepicker') ?>
<?php
$js="
$(document).ready(function(){
    
    $(document).on('click', 'button', function(){
        $('form').submit();
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>