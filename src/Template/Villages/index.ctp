<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Village[]|\Cake\Collection\CollectionInterface $villages
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Villages') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create('',['type'=>'get']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('block_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('block_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $blocks,'value'=>@$block_id]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Name','value'=>@$name]); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('Search', null, ['class'=>'control-label','style'=>'visibility: hidden;']) ?>
                                    <div class="input-icon right">
                                       <?= $this->Form->button(__('Search'),['class'=>'btn text-uppercase btn-success','name'=>'search','value'=>'search']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('sr. no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('name') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('block') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('population') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('no_household') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('latitude') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('longitude') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('customer Care') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($villages as $key => $village): $sr_no++;?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= __($village->name) ?></td>
                            <td><?= $village->has('block') ? h($village->block->name) : '' ?></td>
                            <td><?= $this->Number->format($village->population) ?></td>
                            <td><?= h($village->no_household) ?></td>
                            <td><?= h($village->latitude) ?></td>
                            <td><?= h($village->longitude) ?></td>
                            <td><?= h($village->customer_care) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $village->id],['class'=>'btn btn-sm btn-success modal_btn_full','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $village->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
<?= $this->element('datepicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('fileinput') ?>

<?php
$js="
$(document).ready(function(){
    //add_employees();
    

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

    //add_dos();


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


    $(document).on('click','.modal_btn_full',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url,function(result){
            $('#myModal-content-full').html(result);
            rename_employees();
            rename_dos();
            $('.select2me').select2();
            $('form').validate();
        });
        $('#myModalFull').modal('show');
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>