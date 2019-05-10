<?php
    $this->assign('title','Village Requests');
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Village Requests') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (!$godown_id): ?>

                    <?php $redirect = '/'.str_replace($this->Url->build('/',true),'',$this->Url->build('',true)) ?>
                    <meta http-equiv="refresh" content="0; url=<?= $this->Url->build(['controller'=>'AccountingEntries','action'=>'selectGodown?redirect=']).urlencode($redirect) ?>" />
                <?php else: ?>
                    <?php foreach ($villageRequests as $key => $villageRequest): ?>
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <!-- <i class="fa fa-gift"></i> -->
                                    <?= $villageRequest->village->name ?>
                                </div>
                                <!-- <div class="actions">
                                    <a href="#" class="btn btn-default btn-sm">
                                    <i class="fa fa-upload"></i> Send </a>

                                    <a href="#" class="btn btn-default btn-sm">
                                    <i class="fa  fa-check-square-o"></i> Sent </a>

                                </div> -->
                            </div>
                            <div class="portlet-body display-hide">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>product</th>
                                            <th>quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($villageRequest->village_request_products as $key => $product): ?>
                                            <tr>
                                                <td><?= $product->product ?></td>
                                                <td><?= $product->quantity ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <a href="<?= $this->Url->build(['controller'=>'AccountingEntries','action'=>'villageTransfer',$villageRequest->id])?>" class="btn yellow"><i class="fa fa-upload"></i> Send</a>
                                    <a href="<?= $this->Url->build(['controller'=>'Godowns','action'=>'markRequestSent',$villageRequest->id])?>" class="btn btn-success sent"><i class="fa  fa-check-square-o"></i> Sent</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->element('selectpicker') ?>
<?= $this->element('validate') ?>
<?= $this->element('loading') ?>

<?php
$js="

$(document).ready(function(){
    
    $(document).on('click','.portlet-title',function(){
        var this_portlet = $(this).parent().find('.portlet-body');

        if(this_portlet.hasClass('display-hide'))
            this_portlet.removeClass('display-hide');
        else
            this_portlet.addClass('display-hide');
    });
    
    $(document).on('click','.sent',function(e){
        var div_box = $(this).parents('.box');
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url,function(result){
            if(result)
            {
                div_box.remove();
            }
        });
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>