<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Add Project') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($project) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','value' =>@$name]); ?>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?= $this->Form->label('project_number', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('project_number',['label'=>false,'class'=>'form-control','value' =>@$project_number]); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-control form-group" style="height: 100%">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label"> Project Managers & Technician</label>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Designation</th>
                                                        <th>Employee</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="manager_tbody">
                                                    <?php if (!empty($project->project_employees)): ?>
                                                        <?php foreach ($project->project_employees as $key => $employee): ?>
                                                            <tr class="main_tr">
                                                                <td>
                                                                    <?= $this->Form->control('designation',['class'=>'form-control designation','options'=>$designation,'label'=>false,'val'=>$employee->designation]) ?>
                                                                    <?= $this->Form->hidden('project_employees.'.$key.'.id',['value'=>$employee->id]) ?>
                                                                </td>
                                                                <td>
                                                                    <?= $this->Form->control('manager',['class'=>'form-control manager','options'=>$employees,'empty'=>'--select--','label'=>false,'val'=>$employee->employee_id]) ?>
                                                                </td>
                                                                <td style="width: 25%;">
                                                                    <button type="button" class="add_managers btn btn-sm green"><i class="fa fa-plus"></i></button>
                                                                    <button type="button" record="<?= $employee->id; ?>" class="btn btn-danger btn-sm deletebtn"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
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
        <table id="manager_table">
            <tbody>
                <tr class="main_tr">
                    <td>
                        <?= $this->Form->control('designation',['class'=>'form-control designation','options'=>$designation,'label'=>false]) ?>
                    </td>
                    <td>
                        <?= $this->Form->control('manager',['class'=>'form-control manager','options'=>$employees,'empty'=>'--select--','label'=>false]) ?>
                    </td>
                    <td style="width: 25%;">
                        <button type="button" class="add_managers btn btn-sm green"><i class="fa fa-plus"></i></button>
                        <button type="button" class="remove_managers btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Projects') ?></span>
                </div>
            </div>
             <div class="portlet-body">
                <?= $this->Form->create('',['type'=>'get']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'Name']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <?= $this->Form->label('project_number', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('project_number',['label'=>false,'class'=>'form-control','placeholder'=>'Project Number']); ?>
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
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('Sr.No.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('name') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('project number') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($projects as $key => $project): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->project_number) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'index', $project->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
<?php
$js="
$(document).ready(function(){

    add_managers();
    rename_managers();

    $(document).on('click', '.add_managers', function(){
        add_managers();
    });
    
    function add_managers()
    {
        var tr=$('#manager_table tbody tr.main_tr').clone();
        $('#manager_tbody').append(tr);
        rename_managers();
    }
    
    $(document).on('click', '.remove_managers', function(){
        var count = $('#manager_tbody').children().length;
        if(count>=2)
        {
            $(this).parent().parent().remove();
            rename_managers();
        }
    });
    
    $(document).on('click', '.deletebtn', function(){
        var url = '".$this->Url->build(['action'=>'deleteProjectEmployees'])."';
        var id = $(this).attr('record');
        var dd = confirm('Do You realy want to delete ?');

        if(dd)
        {
            var count = $('#manager_tbody').children().length;
            if(count>=2)
            {
                $.post(url,{id: id},function(result){
                    var sum = 0;
                    $('.total_amount').each(function(){
                        sum += parseInt($(this).val()) || 0;
                    });
                    $('#amount').val(sum);
                    alert(result);
                });

                $(this).parent().parent().remove();
                rename_managers();
            }
            else
            {
                alert('Atleast One Row Is Required');
            }
        }
    });
    
    function rename_managers()
    {
        var i=0;
        $('#manager_tbody').find('.main_tr').each(function(){
            
            $(this).find('.index').html(i+1);
            $(this).find('select.manager').attr({name:'project_employees['+i+'][employee_id]',id: '',class: 'input-sm form-control'}).select2();
            $(this).find('select.designation').attr({name:'project_employees['+i+'][designation]',id: '',class: 'input-sm form-control'}).select2();
            i++;
        });
    }

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>
