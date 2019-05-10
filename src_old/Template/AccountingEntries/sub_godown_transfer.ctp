<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
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
                    <span class="caption-subject"><?= __('Transfer To Godown') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($accountingEntry,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('from_godown', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('godown_id', ['empty'=>false,'label'=>false,'class'=>'form-control select2me input-sm','options' => $godowns,'required']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('to_godown', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('receive_godown_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $receiveGodowns,'required']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('transaction_date', null, ['class'=>'control-label']) ?>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <?= $this->Form->control('transaction_date', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <th width="3%">Sr.No.</th>
                                        <th width="18%">Product</th>
                                        <th width="8%">QTY.</th>
                                        <th width="15%">Serial No.</th>
                                        <th width="10%">Brand</th>
                                        <th width="12%">Purchase</th>
                                        <th width="12%">Expiry</th>
                                        <th width="12%">Vendor</th>
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
                        <select name="product_id" class="form-control input-sm product_id" required>
                            <option value=""> --Select--</option>
                            <?php foreach ($products as $key => $product): ?>
                                <option value="<?= $product->id ?>" warranty="<?= $product->warranty_days ?>"> <?= $product->name ?> </option>
                            <?php endforeach ?>
                        </select>
                    </td>
                    <td>
                        <?php echo $this->Form->control('quantity', ['label'=>false,'class'=>'form-control quantity numberOnly','required','placeholder'=>'QTY.','value'=>'']);?>
                        <?php echo $this->Form->hidden('status', ['class'=>'status','value'=>'OUT']);?>
                        <?php echo $this->Form->hidden('refer_to', ['class'=>'refer_to','value'=>'plant']);?>
                        <?php echo $this->Form->hidden('godown_id', ['class'=>'godown_id','value'=>'plant']);?>
                        <?php echo $this->Form->hidden('transaction_date', ['class'=>'transaction_date','value'=>date('d-m-Y')]);?>
                    </td>
                    <td class="serial_td"></td>
                    <td class="brand_td"></td>
                    <td class="purchase_td"></td>
                    <td class="expiry_td"></td>
                    <td class="vendor_td"></td>

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
<?= $this->element('datepicker') ?>
<?= $this->element('taginput') ?>
<?= $this->element('validate') ?>
<?= $this->element('loading') ?>
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
            $(this).find('select.product_id').attr({name:'data['+i+'][product_id]',id: ''}).select2();
            $(this).find('.quantity').attr({name:'data['+i+'][quantity]',id: ''});
            $(this).find('.status').attr({name:'data['+i+'][status]',id: ''});
            $(this).find('.refer_to').attr({name:'data['+i+'][refer_to]',id: ''});
            $(this).find('.transaction_date').attr({name:'data['+i+'][transaction_date]',id: ''});
            $(this).find('.godown_id').attr({name:'data['+i+'][godown_id]',id: ''});
            $(this).find('select.vendor_id').attr({name:'data['+i+'][vendor_id]',id: ''}).select2();
        });
    }
    
    //check if product is out of stock
    $(document).on('change', '.product_id', function(){
        product_id = $(this).val();
        godown_id = $('#godown-id').val();
        tr = $(this).parents('td').parent();
        tr.find('.quantity').val('').change();
        var warranty = tr.find('select.product_id').find(':selected').attr('warranty') || 0;
        
        if(product_id)
        {
            $.post('".$this->Url->build(['controller'=>'AccountingEntries','action'=>'checkStock.json'])."',
                {
                    product_id: product_id,
                    godown_id: godown_id
                },
                function(qty){
                    if(!qty.response)
                        alert('out of stock');
                    tr.find('.quantity').attr('max',qty.response);
                    if(!warranty)
                    {
                        tr.find('.quantity').attr('readonly','readonly');
                        tr.find('.quantity').val(qty.response).change();
                    }
                    else
                        tr.find('.quantity').removeAttr('readonly','readonly');
                }
            );
        }
    });
    
    // getting available serial numbers
    $(document).on('change', '.quantity', function(){
        var parent_tr = $(this).parents('td').parent();
        qty = parseInt(parent_tr.find('.quantity').val());

        max_qty = parseInt(parent_tr.find('.quantity').attr('max'));
        product_id = parent_tr.find('.product_id').find('option:selected').val();
        godown_id = $('#godown-id').val();

        var warranty = parent_tr.find('select.product_id').find(':selected').attr('warranty') || 0;

        parent_tr.find('.serial_td').html('');
        parent_tr.find('.purchase_td').html('');
        parent_tr.find('.expiry_td').html('');
        parent_tr.find('.vendor_td').html('');
        parent_tr.find('.brand_td').html('');

        if(max_qty >= qty && product_id)
        {
            var index = parseInt(parent_tr.find('.index').html());
            
            //get available serial_no.

            $.post('".$this->Url->build(['controller'=>'AccountingEntries','action'=>'getAvailable.json'])."',
                {
                    product_id: product_id,
                    godown_id: godown_id
                },
                function(response)
                {
                    if(response.success)
                    {
                        var select = $('<select></select>').attr('class', 'form-control input-sm serial_no form-group').attr('required', 'required');
                        select.append('<option value= > --Select--</option>');
                        $.each(response.available_product_serial,function(key, value) 
                        {
                            select.append('<option value=' + value.s_no + ' purchase=' + value.purchase + ' expiry=' + value.expiry + ' vendor=\"' + value.vendor + '\" vendor_id=' + value.vendor_id + ' brand_name=\"'+ value.brand_name +'\" qty=\"'+ value.qty +'\">' + value.s_no + '</option>');
                        });

                        if(warranty)
                        {
                            for(j=1;j<=qty;j++)
                            {
                                parent_tr.find('.serial_td').append(select.clone(true).attr('child_no',j).attr('name','data['+index+'][accounting_serials]['+j+'][serial_no]'));

                                parent_tr.find('.serial_td').append('<br>');

                                parent_tr.find('.purchase_td').append('<label class=\'control-label purchase_'+j+'\'></label><input type=hidden name=\'data['+index+'][accounting_serials]['+j+'][purchase_date]\' class=\'control-label purchase_'+j+'\'>');

                                parent_tr.find('.expiry_td').append('<label class=\'control-label expiry_'+j+'\'></label><input type=hidden name=\'data['+index+'][accounting_serials]['+j+'][expiry_date]\' class=\'control-label expiry_'+j+'\'>');

                                parent_tr.find('.vendor_td').append('<label class=\'control-label vendor_'+j+'\'></label><input type=hidden name=\'data['+index+'][accounting_serials]['+j+'][vendor_id]\' class=\'control-label vendor_'+j+'\'>');

                                parent_tr.find('.brand_td').append('<label class=\'control-label brand_'+j+'\'></label><input type=hidden name=\'data['+index+'][accounting_serials]['+j+'][brand_name]\' class=\'control-label brand_'+j+'\'>');
                            }
                        }
                        else
                        {
                            parent_tr.find('.serial_td').append(select.clone(true).attr('child_no',0).attr('name','data['+index+'][accounting_serials][0][serial_no]'));

                            parent_tr.find('.serial_td').append('<br>');

                            parent_tr.find('.purchase_td').append('<label class=\'control-label purchase_0\'></label><input type=hidden name=\'data['+index+'][accounting_serials][0][purchase_date]\' class=\'control-label purchase_0\'>');

                            parent_tr.find('.expiry_td').append('<label class=\'control-label expiry_0\'></label><input type=hidden name=\'data['+index+'][accounting_serials][0][expiry_date]\' class=\'control-label expiry_0\'>');

                            parent_tr.find('.vendor_td').append('<label class=\'control-label vendor_0\'></label><input type=hidden name=\'data['+index+'][accounting_serials][0][vendor_id]\' class=\'control-label vendor_0\'>');

                            parent_tr.find('.brand_td').append('<label class=\'control-label brand_0\'></label><input type=hidden name=\'data['+index+'][accounting_serials][0][brand_name]\' class=\'control-label brand_0\'>');
                        }
                        parent_tr.find('.serial_no').select2();
                    }
                }
            );
        }   

    });

    $(document).on('change', '.serial_no', function(){
        var parent_tr = $(this).parents('td').parent();
        var child_no = $(this).attr('child_no');
        var purchase = $(this).find('option:selected').attr('purchase');
        var qty = $(this).find('option:selected').attr('qty');
        var expiry = $(this).find('option:selected').attr('expiry');
        var vendor = $(this).find('option:selected').attr('vendor');
        var vendor_id = $(this).find('option:selected').attr('vendor_id');
        var brand_name = $(this).find('option:selected').attr('brand_name');

        var warranty = parent_tr.find('select.product_id').find(':selected').attr('warranty') || 0;
        if(!warranty)
            parent_tr.find('.quantity').val(qty);

        parent_tr.find('.purchase_'+child_no).html(purchase);
        parent_tr.find('.purchase_'+child_no).val(purchase);
        parent_tr.find('.expiry_'+child_no).html(expiry);
        parent_tr.find('.expiry_'+child_no).val(expiry);
        parent_tr.find('.vendor_'+child_no).html(vendor);
        parent_tr.find('.vendor_'+child_no).val(vendor_id);
        parent_tr.find('.brand_'+child_no).html(brand_name);
        parent_tr.find('.brand_'+child_no).val(brand_name);

    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>