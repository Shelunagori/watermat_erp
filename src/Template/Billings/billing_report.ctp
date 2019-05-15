<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $siteSelection
 */
?>
<style type="text/css">
    textarea.form-control {
        height: none !important;
    }
    .label-weight
    {
        font-weight: 600;
    }
</style>

<div class="modal-header">
    <h3 class="modal-title">Billing</h3>
</div>

<div class="modal-body">
    <div class="form-body">
        <?php
        foreach ($billings as $billing) 
        {
          ?>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label label-weigh">Q. <?= h($billing->billing_question->name) ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="control-label">Ans. <?= h($billing->answer) ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="control-label">Date <?= h($billing->date) ?></label>
                </div>
            </div>
            <hr style="border-top: dotted 2px;" />
          <?php  
        }
        ?>
    </div>
</div>