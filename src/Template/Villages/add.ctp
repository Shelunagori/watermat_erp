<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Village $village
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Village') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($village,['autocomplete'=>'off','type'=>'file']) ?>
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
                                    <?= $this->Form->label('block_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('block_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $divisions]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('population', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('population',['label'=>false,'class'=>'form-control','placeholder'=>'population']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('no_household', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('no_household',['label'=>false,'class'=>'form-control','placeholder'=>'no_household']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('latitude', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('latitude',['label'=>false,'class'=>'form-control','placeholder'=>'latitude']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('longitude', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('longitude',['label'=>false,'class'=>'form-control','placeholder'=>'longitude']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('customer_care', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('customer_care',['label'=>false,'class'=>'form-control','placeholder'=>'customer_care']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                            <?= $this->Html->image('upload.png') ?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div class="text-center">
                                            <span class="btn default btn-file">
                                            <span class="fileinput-new">
                                            Select image </span>
                                            <span class="fileinput-exists">
                                            Select image </span>
                                            <input type="file" name="image">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-control form-group" style="height: 100%">
                                    <div class="row">
                                        <div class="col-sm-4 border_right">
                                            <div class="form-group"><strong>Project Employee</strong></div>
                                        </div>
                                        <div class="col-sm-4 border_right">
                                            <div class="form-group"><strong>Vendors</strong></div>
                                        </div>
                                        <div class="col-sm-4 border_right">
                                            <div class="form-group"><strong>Department Officers</strong></div>
                                        </div>
                                    </div>
                                    <div class="row flex">
                                        <div class="col-sm-4 border_right">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table">
                                                        <tbody id="employee_tbody">
                                                            <?php if($village->employee_villages): ?>
                                                            <?php foreach ($village->employee_villages as $key => $employee): ?>
                                                                <tr class="main_tr">
                                                                    <td>
                                                                        <?= $this->Form->hidden('id',['class'=>'id','val'=>$employee->id]) ?>
                                                                        <?= $this->Form->control('designation',['class'=>'form-control select2me input-sm designation','options'=>$employeePosts,'empty'=>'--select--','label'=>false,'val'=>$employee->designation]) ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $this->Form->control('employee_id',['class'=>'form-control employee_id select2me input-sm','options'=>$employees,'empty'=>'--select--','label'=>false,'val'=>$employee->employee_id]) ?>
                                                                    </td>
                                                                    <td style="width: 25%;">
                                                                        <button type="button" class="add_employee btn btn-sm green"><i class="fa fa-plus"></i></button>
                                                                        <a href="<?= $this->Url->build(['action'=>'deleteUser',$employee->id,'EmployeeVillages']) ?>" class="employee_remove btn btn-sm btn-danger deletebtn here"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 border_right">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Civil Vendor</label>
                                                        <?= $this->Form->control('vendor_villages.0.vendor_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me vendor input-sm','options' => $civilVendors]); ?>
                                                        <?= $this->Form->hidden('vendor_villages.0.vendor_designation_id',['class'=>'hid','value'=>1,'disabled']) ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">I&C Vendor</label>
                                                        <?= $this->Form->control('vendor_villages.1.vendor_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me vendor input-sm','options' => $icVendors]); ?>
                                                        <?= $this->Form->hidden('vendor_villages.1.vendor_designation_id',['class'=>'hid','value'=>3,'disabled']) ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Shelter Vendor</label>
                                                        <?= $this->Form->control('vendor_villages.2.vendor_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me vendor input-sm','options' => $shelterVendors]); ?>
                                                        <?= $this->Form->hidden('vendor_villages.2.vendor_designation_id',['class'=>'hid','value'=>5,'disabled']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table">
                                                        <tbody id="do_tbody">
                                                            <?php if($village->do_villages): ?>
                                                            <?php foreach ($village->do_villages as $key => $do): ?>
                                                                <tr class="main_tr">
                                                                    <td>
                                                                        <?= $this->Form->hidden('id',['class'=>'id','val'=>$do->id]) ?>
                                                                        <?= $this->Form->control('do_post',['class'=>'input-sm select2me form-control do_post ','options'=>$doPosts,'empty'=>'--select--','label'=>false,'val'=>$do->do_post_id]) ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $this->Form->control('department_officer_id',['class'=>'input-sm select2me form-control department_officer_id ','options'=>$departmentOfficers,'empty'=>'--select--','label'=>false,'val'=>$do->department_officer_id]) ?>
                                                                    </td>
                                                                    <td style="width: 25%;">
                                                                        <button type="button" class="add_do btn btn-sm green"><i class="fa fa-plus"></i></button>
                                                                        <a href="<?= $this->Url->build(['action'=>'deleteUser',$do->id,'DoVillages']) ?>" class="do_remove btn btn-sm btn-danger deletebtn here"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <div class="col-md-6 hidden">
        <table id="employee_table">
            <tbody>
                <tr class="main_tr">
                    <td>
                        <?= $this->Form->control('designation',['class'=>'form-control designation','options'=>$employeePosts,'empty'=>'--select--','label'=>false]) ?>
                    </td>
                    <td>
                        <?= $this->Form->control('employee_id',['class'=>'form-control employee_id','options'=>$employees,'empty'=>'--select--','label'=>false]) ?>
                    </td>
                    <td style="width: 25%;">
                        <button type="button" class="add_employee btn btn-sm green"><i class="fa fa-plus"></i></button>
                        <button type="button" class="remove_employee btn btn-sm btn-danger deletebtn"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="do_table">
            <tbody>
                <tr class="main_tr">
                    <td>
                        <?= $this->Form->control('do_post',['class'=>'input-sm form-control do_post','options'=>$doPosts,'empty'=>'--select--','label'=>false]) ?>
                    </td>
                    <td>
                        <?= $this->Form->control('department_officer_id',['class'=>'input-sm form-control department_officer_id','options'=>$departmentOfficers,'empty'=>'--select--','label'=>false]) ?>
                    </td>
                    <td style="width: 25%;">
                        <button type="button" class="add_do btn btn-sm green"><i class="fa fa-plus"></i></button>
                        <button type="button" class="remove_do btn btn-sm btn-danger deletebtn"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->element('datepicker') ?>
<?= $this->element('selectpicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('fileinput') ?>

<?php
$js="
$(document).ready(function(){
    add_employees();
    rename_employees();

    $(document).on('click', '.add_employee', function(){
        add_employees();
    });
    
    function add_employees()
    {
        var tr=$('#employee_table tbody tr.main_tr').clone();
        $('#employee_tbody').append(tr);
        rename_employees();
    }
    
    $(document).on('click', '.remove_employee', function(){
        var count = $('#employee_tbody').children().length;
        if(count>=2)
        {
            $(this).parent().parent().remove();
            rename_employees();
        }
    });
    
    function rename_employees()
    {
        var i=0;
        $('#employee_tbody').find('.main_tr').each(function(){
            
            $(this).find('.index').html(i+1);
            $(this).find('.id').attr({name:'employee_villages['+i+'][id]',id: ''});
            $(this).find('select.employee_id').attr({name:'employee_villages['+i+'][employee_id]',id: '',class: 'input-sm form-control'}).select2();
            $(this).find('select.designation').attr({name:'employee_villages['+i+'][designation]',id: '',class: 'input-sm form-control'}).select2();
            i++;
        });
    }

    add_dos();
    rename_dos();

    $(document).on('click', '.add_do', function(){
        add_dos();
    });
    
    function add_dos()
    {
        var tr=$('#do_table tbody tr.main_tr').clone();
        $('#do_tbody').append(tr);
        rename_dos();
    }
    
    $(document).on('click', '.remove_do', function(){
        var count = $('#do_tbody').children().length;
        if(count>=2)
        {
            $(this).parent().parent().remove();
            rename_dos();
        }
    });
    
    function rename_dos()
    {
        var i=0;
        $('#do_tbody').find('.main_tr').each(function(){
            
            $(this).find('.index').html(i+1);
            $(this).find('select.department_officer_id').attr({name:'do_villages['+i+'][department_officer_id]',id: ''}).select2();
            $(this).find('select.do_post').attr({name:'do_villages['+i+'][do_post_id]',id: ''}).select2();
            $(this).find('.id').attr({name:'do_villages['+i+'][id]',id: ''});
            i++;
        });
    }

    $(document).on('change','.do_post',function(){
        var do_post = $(this).val();
        var url = '".$this->Url->build(['controller'=>'DepartmentOfficers','action'=>'getDos.json'])."';
        var officer = $(this).parents('tr').find('select.department_officer_id');
        if(do_post)
        {
            $.post(url,{do_post: do_post},function(result){
                officer.empty();
                officer.append($('<option/>', {value: '', text: '--Select--'}));
                officer.select2();
                $.each(result.dos, function(key,value) {
                    var o = $('<option/>', {value: key, text: value});
                    officer.append(o);
                });
            });
        }
    });

    $(document).on('change','.vendor',function(){
        var vendor = $(this).val();
        if(vendor)
        {
            $(this).parent().parent().find('.hid').removeAttr('disabled');
        }
    });


});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>
