<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkSchedule[]|\Cake\Collection\CollectionInterface $workSchedules
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Work Schedules') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('Sr.No.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('name') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('days') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($workSchedules as $key => $workSchedule): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= h($workSchedule->name) ?></td>
                            <td><input type="numbers" id="<?= $workSchedule->id ?>" name="days" class="form-control" value="<?= $workSchedule->days ?>"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$js="
$(document).ready(function(){
    $(document).on('change','input',function(){
        var id = $(this).attr('id');
        var url = '".$this->Url->build(['action'=>'edit'])."/'+id+'.json';

        $.post(url,{days: $(this).val()},function(result){
            if(result.response)
                toastr.success('saved');
        });
    });
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>