<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OmEmployee $omEmployee
 */
$this->assign('title','O&M Schedule')
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    <span class="caption-subject"><?= __('Add Schedule') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($omEmployee,['autocomplete'=>'off','type'=>'file']) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="form-group">
                                    <?= $this->Form->label('technician_id', null, ['class'=>'control-label']) ?>
                                    <?= $this->Form->control('technician_id',['label'=>false,'empty'=>'--select--','class'=>'form-control select2me input-sm']); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row h-div hidden">
                            <div class="col-md-12">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Village</th>
                                            <th>Date</th>
                                            <th>Recycle Days</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions h-div text-center hidden">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->element('selectpicker') ?>
<?= $this->element('datepicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('loading') ?>
<?php 
$js = "
    $(document).ready(function(){
        $(document).on('change','#technician-id',function(){
            var id = $(this).val();
            if(id)
            {
                $('.h-div').removeClass('hidden');
                $.post('".$this->Url->build(['action'=>'getVillages.json'])."',
                {id : id},
                function(result){
                    if(result.success)
                    {
                        var i = 0;
                        $.each(result.response,function(key, data){
                            i++;
                            $('.tbody').append('<tr><td>'+i+'<td>'+data.name+'<td><input type=hidden name=data['+i+'][village_id] value='+data.id+'><input type=text class=\'form-control date-picker\' name=data['+i+'][visit_date] placeholder=Date required  value='+data.visit_date+'><td><input type=number class=form-control name=data['+i+'][days] placeholder=Days required  value='+data.days+'>'); 
                        });
                        $('.date-picker').datepicker({
                                format: 'dd-M-yyyy',
                                autoclose: true
                            })
                    }
                    else
                    {
                        $('.tbody').empty();
                        $('.h-div').addClass('hidden');
                    }
                });
            }
            else
            {
                $('.tbody').empty();
                $('.h-div').addClass('hidden');
            }
        });
    });
";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
 ?>
