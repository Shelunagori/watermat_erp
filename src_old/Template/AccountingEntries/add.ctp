<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry $accountingEntry
 */
?>
<style type="text/css">
    td input{
        margin-bottom: 5px;
    }
    td .select2-container{
        margin-bottom: 8px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Accounting Entry') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($accountingEntry,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('godown_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('godown_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $godowns,'required']); ?>
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
                                        <th width="15%">Product</th>
                                        <th width="8%">QTY.</th>
                                        <th width="12%">Brand</th>
                                        <th width="13%">Vendor</th>
                                        <th width="13%">Serial No.</th>
                                        <th width="13%">Invoice</th>
                                        <th width="13%">Warranty Exp.</th>
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
    <div class="col-md-12 hidden">
        <?= $this->Form->control('vendor_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control input-sm','options' => $vendors]); ?>
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
                        <?php echo $this->Form->control('quantity', ['label'=>false,'class'=>'form-control quantity numberOnly','required','placeholder'=>'QTY.','value'=>1]);?>
                    </td>
                    <td class="brand_td"></td>
                    <td class="vendor_td"></td>
                    <td class="serial_td"></td>
                    <td class="purchase_td"></td>
                    <td class="expiry_td"></td>

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
            $(this).find('.brand_name').attr({name:'data['+i+'][brand_name]',id: ''});
            $(this).find('.quantity').attr({name:'data['+i+'][quantity]',id: ''});
            $(this).find('select.vendor_id').attr({name:'data['+i+'][vendor_id]',id: ''}).select2();
        });
    }

    $(document).on('change', '.quantity,.product_id', function(){
        var parent_tr = $(this).parents('td').parent();
        qty = parent_tr.find('.quantity').val();

        var warranty = parent_tr.find('select.product_id').find(':selected').attr('warranty') || 0;
        var index = parseInt(parent_tr.find('.index').html());
        parent_tr.find('.brand_td').html('');
        parent_tr.find('.vendor_td').html('');
        parent_tr.find('.serial_td').html('');
        parent_tr.find('.purchase_td').html('');
        parent_tr.find('.expiry_td').html('');

        if(warranty)
        {
            for(j=1;j<=qty;j++)
            {
                parent_tr.find('.brand_td').append('<input type=\'text\' name=\'data['+index+'][accounting_serials]['+j+'][brand_name]\' class=\'form-control\' placeholder=\'Brand\'>');
                parent_tr.find('.vendor_td').append($('#vendor-id').clone(true).attr('name','data['+index+'][accounting_serials]['+j+'][vendor_id]'));
                parent_tr.find('.vendor_td').append('<br>');
                parent_tr.find('.serial_td').append('<input type=\'text\' name=\'data['+index+'][accounting_serials]['+j+'][serial_no]\' class=\'form-control\' placeholder=\'Serial No.\' required>');
                parent_tr.find('.purchase_td').append('<div class=\'input-icon right\'> <i class=\'fa fa-calendar\'></i> <input type=\'text\' name=\'data['+index+'][accounting_serials]['+j+'][purchase_date]\' class=\'form-control datepicker purc\' placeholder=\'Invoice Date\' child_no=\''+j+'\' required> </div>');
                parent_tr.find('.expiry_td').append('<div class=\'input-icon right\'> <i class=\'fa fa-calendar\'></i> <input type=\'text\' name=\'data['+index+'][accounting_serials]['+j+'][expiry_date]\' class=\'form-control datepicker exp'+j+'\' placeholder=\'Expiry Date\' required> </div>');
            }
            parent_tr.find('.vendor_td').find('select').select2();
            $('.datepicker').datepicker({format: 'dd-M-yyyy', autoclose: true });
        }
        else
        {
                parent_tr.find('.brand_td').append('<input type=\'text\' name=\'data['+index+'][accounting_serials][0][brand_name]\' class=\'form-control\' placeholder=\'Brand\'>');
                parent_tr.find('.vendor_td').append($('#vendor-id').clone(true).attr('name','data['+index+'][accounting_serials][0][vendor_id]'));
                parent_tr.find('.serial_td').append('<input type=\'text\' name=\'data['+index+'][accounting_serials][0][serial_no]\' class=\'form-control\' placeholder=\'Serial No.\' required>');
                parent_tr.find('.purchase_td').append('<div class=\'input-icon right\'> <i class=\'fa fa-calendar\'></i> <input type=\'text\' name=\'data['+index+'][accounting_serials][0][purchase_date]\' class=\'form-control datepicker purc\' placeholder=\'Invoice Date\' child_no=\'0\' required> </div>');
                parent_tr.find('.expiry_td').append('<div class=\'input-icon right\'> <i class=\'fa fa-calendar\'></i> <input type=\'text\' name=\'data['+index+'][accounting_serials][0][expiry_date]\' class=\'form-control datepicker exp0\' placeholder=\'Expiry Date\' required> </div>');
            parent_tr.find('.vendor_td').find('select').select2();
            $('.datepicker').datepicker({format: 'dd-M-yyyy', autoclose: true });
        }

    });

    $(document).on('change', '.purc', function(){
        var parent_tr = $(this).parents('td').parent();
        var warranty = parent_tr.find('select.product_id').find(':selected').attr('warranty') || 1;
        warranty = parseInt(warranty);
        var child_no = $(this).attr('child_no');

        var date2 = $(this).datepicker('getDate', '+'+warranty+'d'); 
        date2.setDate(date2.getDate()+warranty); 
        parent_tr.find('.exp'+child_no).datepicker('setDate', date2);

    });

    $(document).on('keyup', 'input', function(e){
        if(e.keyCode == 40)
        {
            var v = $(this).val();
            var index = $(this).index();

            $(this).parent('td').find('input').each(function(){
                if($(this).index() > index)
                    $(this).val(v);
            });
        }
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>