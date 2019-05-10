<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
$this->assign('title', 'Request For Product');
?>
<style type="text/css">
    .serial_no{
        margin-bottom: 5px;
    }
    .control-label{
        display: block;
        margin-bottom: 15px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Request For Product') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (!$godown_id): ?>

                    <?php $redirect = '/'.str_replace($this->Url->build('/',true),'',$this->Url->build('',true)) ?>
                    <meta http-equiv="refresh" content="0; url=<?= $this->Url->build(['action'=>'selectGodown?redirect=']).urlencode($redirect) ?>" />
                <?php else: ?>
                    <?= $this->Form->create($product_request,['autocomplete'=>'off','type'=>'file']) ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <th width="3%">Sr.No.</th>
                                            <th width="20%">Product</th>
                                            <th width="10%">QTY.</th>
                                            <th width="10%">Action</th>
                                        </thead>
                                        <tbody id="main_tbody">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="hidden" id="sample_table">
            <tbody>
                <tr class="main_tr">
                    <td class="index">
                        
                    </td>
                    <td>
                        <?= $this->Form->control('product_id',['label'=>false,'empty'=>'--Select--','options'=>$products,'class'=>'input-sm form-control product_id']) ?>
                    </td>
                    <td>
                        <?php echo $this->Form->control('quantity', ['label'=>false,'class'=>'form-control quantity numberOnly','required','placeholder'=>'QTY.','value'=>'']);?>
                    </td>
                    <td class="action">
                        <button type="button" class="add_row btn btn-sm btn-success editbtn"><i class="fa fa-plus"></i>
                        </button><button type="button" class="remove btn btn-sm btn-danger deletebtn"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->element('selectpicker') ?>
<?= $this->element('validate') ?>
<?php
$js="
$(document).ready(function(){

    add_row();
    rename_rows();

    $(document).on('click', '.add_row', function(){
        add_row();
    });
    
    function add_row()
    {
        var tr=$('#sample_table tbody tr.main_tr').clone();
        $('#main_tbody').append(tr);
        rename_rows();
    }
    
    $(document).on('click', '.remove', function(){
        var count = $('#main_tbody').children().length;
        if(count>=2)
        {
            $(this).parent().parent().remove();
            rename_rows();
        }
    });
    
    function rename_rows()
    {
        var i=0;

        $('#main_tbody').find('.main_tr').each(function(){
            i++;
            
            $(this).find('.index').html(i);
            $(this).find('select.product_id').attr({name:'sub_godown_request_products['+i+'][product_id]',id: ''}).select2();
            $(this).find('.quantity').attr({name:'sub_godown_request_products['+i+'][quantity]',id: ''});
        });
    }

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>