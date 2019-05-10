<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operator $operator
 */
?>
<style type="text/css">
    textarea.form-control {
        height: none !important;
    }
</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Operator</h4>
</div>

<?= $this->Form->create($operator,['autocomplete'=>'off','type'=>'file']) ?>
<div class="modal-body">
    <div class="form-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('village_id', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm','options' => $villages]); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('name', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('name',['label'=>false,'class'=>'form-control','placeholder'=>'name']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('father_name', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('father_name',['label'=>false,'class'=>'form-control','placeholder'=>'father_name']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('contact_no', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('contact_no',['label'=>false,'class'=>'form-control','placeholder'=>'contact_no']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('qualification', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('qualification',['label'=>false,'class'=>'form-control','placeholder'=>'qualification']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('aadhar_number', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('aadhar_number',['label'=>false,'class'=>'form-control','placeholder'=>'aadhar_number']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('pan_number', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('pan_number',['label'=>false,'class'=>'form-control','placeholder'=>'pan_number']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('date_of_appointment', null, ['class'=>'control-label']) ?>
                    <div class="input-icon right">
                        <i class="fa fa-calendar"></i>
                        <?= $this->Form->control('date_of_appointment', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('salary_paid_upto', null, ['class'=>'control-label']) ?>
                    <div class="input-icon right">
                        <i class="fa fa-calendar"></i>
                        <?= $this->Form->control('salary_paid_upto', ['label'=>false,'class'=>'form-control date-picker','data-date-format'=>'dd-M-yyyy','empty' => true,'type'=>'text']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('pf', null, ['class'=>'control-label text-uppercase']) ?>
                    <?= $this->Form->control('pf',['label'=>false,'class'=>'form-control','placeholder'=>'PF']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('esi_kyc', null, ['class'=>'control-label text-uppercase']) ?>
                    <?= $this->Form->control('kyc',['label'=>false,'class'=>'form-control','placeholder'=>'ESI KYC']); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $this->Form->label('incentive_plan_id', null, ['class'=>'control-label']) ?>
                    <?= $this->Form->control('incentive_plan_id',['label'=>false,'class'=>'form-control','placeholder'=>'incentive_plan_id']); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-control form-group" style="height: 100%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><strong>BANK DETAILS</strong></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_holder_name', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('account_holder_name',['label'=>false,'class'=>'form-control','placeholder'=>'account_holder_name']); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('bank', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('bank', ['label'=>false,'class'=>'form-control','placeholder' => 'Bank Name', 'empty' => true]); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('account_no', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('account_no',['label'=>false,'class'=>'form-control','placeholder'=>'account_no']); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('ifsc_code', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('ifsc_code',['label'=>false,'class'=>'form-control','placeholder'=>'ifsc_code']); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $this->Form->label('branch', null, ['class'=>'control-label']) ?>
                                <?= $this->Form->control('branch',['label'=>false,'class'=>'form-control','placeholder'=>'branch']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success text-uppercase']) ?>
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
<?= $this->Form->end() ?>
