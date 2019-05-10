<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OmSchedule[]|\Cake\Collection\CollectionInterface $omSchedules
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Om Schedules') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('sr. no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('village_id') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('visit_date') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('visited_on') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('is_complete') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('is_verify') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($omSchedules as $key => $omSchedule): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $omSchedule->has('village') ? h($omSchedule->village->name) : '' ?></td>
                            <td><?= h($omSchedule->visit_date) ?></td>
                            <td><?= h($omSchedule->visited_on) ?></td>
                            <td><?= h($omSchedule->is_complete) ?></td>
                            <td><?= h($omSchedule->is_verify) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $omSchedule->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $omSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
