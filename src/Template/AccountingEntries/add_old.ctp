<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountingEntry $accountingEntry
 */
?>
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
                                        <th width="5%">Sr.No.</th>
                                        <th width="20%">Product</th>
                                        <th width="5%">QTY.</th>
                                        <th width="15%">Vendor</th>
                                        <th width="12%">Serial No.</th>
                                        <th width="15%">Purchase</th>
                                        <th width="15%">Expiry</th>
                                        <th width="13%">Action</th>
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
                        <select name="product_id" class="form-control input-sm product_id",'required'>
                            <option value=""> --Select--</option>
                            <?php foreach ($products as $key => $product): ?>
                                <option value="<?= $product->id ?>" warranty="<?= $product->warranty_days ?>"> <?= $product->name ?> (<?= $product->brand_name ?>) </option>
                            <?php endforeach ?>
                        </select>
                    </td>
                    <td>
                        <?php echo $this->Form->control('quantity', ['label'=>false,'class'=>'form-control quantity','required','placeholder'=>'QTY.','value'=>1]);?>
                    </td>
                    <td>
                        <?= $this->Form->control('vendor_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control vendor_id input-sm','options' => $vendors, 'empty' => true]); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->control('serial_no', ['label'=>false,'class'=>'form-control serial_no','placeholder'=>'Serial No.']);?>
                    </td>
                    <td>
                        <div class="input-icon right">
                            <i class="fa fa-calendar"></i>
                            <?php echo $this->Form->control('purchase_date', ['label'=>false,'class'=>'form-control purchase_date','placeholder'=>'Purchase']);?>
                        </div>
                    </td>
                    <td>
                        <div class="input-icon right">
                            <i class="fa fa-calendar"></i>
                            <?php echo $this->Form->control('expiry_date', ['label'=>false,'class'=>'form-control expiry_date','placeholder'=>'Expiry']);?>
                        </div>
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
    
    $(document).on('click', '.clone', function(){
        var tr=$('#sample_table tbody tr.main_tr').clone();
        $('#main_tbody').append(tr);
        clone_row();
    });
    
    function rename_rows()
    {
        var i=0;
        var count = $('#main_tbody').find('.main_tr').length;

        $('#main_tbody').find('.main_tr').each(function(){
            i++;
            
            $(this).find('.clone').remove();
            $(this).find('.index').html(i);
            $(this).find('select.product_id').attr({name:'data['+i+'][product_id]',id: ''}).select2();
            $(this).find('.quantity').attr({name:'data['+i+'][quantity]',id: ''});
            $(this).find('select.vendor_id').attr({name:'data['+i+'][vendor_id]',id: ''}).select2();
            $(this).find('.serial_no').attr({name:'data['+i+'][serial_no]',id: ''});
            $(this).find('.purchase_date').attr({name:'data['+i+'][purchase_date]',id: ''}).datepicker({format: 'dd-M-yyyy', autoclose: true });
            $(this).find('.expiry_date').attr({name:'data['+i+'][expiry_date]',id: ''}).datepicker({format: 'dd-M-yyyy', autoclose: true });
            if(i == count)
                $(this).find('.action').append('</button><button type=\'button\' class=\'clone btn btn-sm yellow deletebtn\'><strong>C</strong></button>');
        });
    }
    
    function clone_row()
    {
        var i=0;
        var count = $('#main_tbody').find('.main_tr').length;

        $('#main_tbody').find('.main_tr').each(function(){
            i++;

            if(i == count)
            {
                $(this).find('.index').html(i);
                $(this).find('select.product_id').attr({name:'data['+i+'][product_id]',id: '','value':product_id}).select2();
                $(this).find('.quantity').attr({name:'data['+i+'][quantity]',id: ''});
                $(this).find('select.vendor_id').attr({name:'data['+i+'][vendor_id]',id: '','value':vendor_id}).select2();
                $(this).find('.serial_no').attr({name:'data['+i+'][serial_no]',id: ''});
                $(this).find('.purchase_date').attr({name:'data['+i+'][purchase_date]',id: '','value': purchase_date}).datepicker({format: 'dd-M-yyyy', autoclose: true });
                $(this).find('.expiry_date').attr({name:'data['+i+'][expiry_date]',id: '','value': expiry_date}).datepicker({format: 'dd-M-yyyy', autoclose: true });
                $(this).find('.action').append('</button><button type=\'button\' class=\'clone btn btn-sm yellow deletebtn\'><strong>C</strong></button>');
            }
            else
            {
                $(this).find('.clone').remove();
                $(this).find('.index').html(i);
                $(this).find('select.product_id').attr({name:'data['+i+'][product_id]',id: ''}).select2();
                $(this).find('.quantity').attr({name:'data['+i+'][quantity]',id: ''});
                $(this).find('select.vendor_id').attr({name:'data['+i+'][vendor_id]',id: ''}).select2();
                $(this).find('.serial_no').attr({name:'data['+i+'][serial_no]',id: ''});
                $(this).find('.purchase_date').attr({name:'data['+i+'][purchase_date]',id: ''}).datepicker({format: 'dd-M-yyyy', autoclose: true });
                $(this).find('.expiry_date').attr({name:'data['+i+'][expiry_date]',id: ''}).datepicker({format: 'dd-M-yyyy', autoclose: true });
            }

            product_id = $(this).find('select.product_id').val();
            vendor_id = $(this).find('select.vendor_id').val();
            purchase_date = $(this).find('.purchase_date').val();
            expiry_date = $(this).find('.expiry_date').val();
        });
    }

    $(document).on('change', '.purchase_date', function(){
        var parent_tr = $(this).parents('td').parent();
        var warranty = parent_tr.find('select.product_id').find(':selected').attr('warranty') || 1;
        warranty = parseInt(warranty);
        var date2 = $(this).datepicker('getDate', '+'+warranty+'d'); 
        date2.setDate(date2.getDate()+warranty); 
        parent_tr.find('.expiry_date').datepicker('setDate', date2);

    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>