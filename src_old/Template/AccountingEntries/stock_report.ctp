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
                    <?= $this->Form->control('godown_id', ['empty'=>'--Select Godown--','label'=>false,'class'=>'form-control select2me input-medium input-sm','options' => $godowns,'val' => $godown_id]); ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize">Sr.No.</th>
                            <th scope="col" class="text-capitalize">Product</th>
                            <th scope="col" class="text-capitalize">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($stocks as $key => $product): $sr_no++;?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->quantity; ?></td>
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
<?php
$js="
$(document).ready(function(){
    
    $(document).on('change', '#godown-id', function(){
        $(location).attr('href','".$this->Url->build(['action'=>'',''])."/'+$(this).val());
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>