<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SiteSelection[]|\Cake\Collection\CollectionInterface $siteSelections
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Site Selections') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('Sr. No.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('village_work_id') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('lendmark') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('gram_panchayat_id') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('mla_constituency_id') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('borewell_available') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('borwell_distance') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('electricity_available') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('electricity_distance') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('moter_lowered') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('moter_distance') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('raw_water_tds') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($siteSelections as $key => $siteSelection): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $siteSelection->has('village_work') ? h($siteSelection->village_work->id) : '' ?></td>
                            <td><?= h($siteSelection->lendmark) ?></td>
                            <td><?= $siteSelection->has('gram_panchayat') ? h($siteSelection->gram_panchayat->name) : '' ?></td>
                            <td><?= $this->Number->format($siteSelection->mla_constituency_id) ?></td>
                            <td><?= h($siteSelection->borewell_available) ?></td>
                            <td><?= h($siteSelection->borwell_distance) ?></td>
                            <td><?= h($siteSelection->electricity_available) ?></td>
                            <td><?= h($siteSelection->electricity_distance) ?></td>
                            <td><?= h($siteSelection->moter_lowered) ?></td>
                            <td><?= h($siteSelection->moter_distance) ?></td>
                            <td><?= h($siteSelection->raw_water_tds) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $siteSelection->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $siteSelection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
