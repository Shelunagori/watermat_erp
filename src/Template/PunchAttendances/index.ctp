<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PunchAttendance[]|\Cake\Collection\CollectionInterface $punchAttendances
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Punch Attendances') ?></span>
                </div>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('distance') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('vehicle') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('price_pr_km') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('travel_from') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('travel_to') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('user_id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('comment') ?></th>
                            <th scope="col" class="text-capitalize"><?= __('total_amount') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($punchAttendances as $key => $punchAttendance): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $this->Number->format($punchAttendance->distance) ?></td>
                            <td><?= h($punchAttendance->vehicle) ?></td>
                            <td><?= $this->Number->format($punchAttendance->price_pr_km) ?></td>
                            <td><?= h($punchAttendance->travel_from) ?></td>
                            <td><?= h($punchAttendance->travel_to) ?></td>
                            <td><?= $this->Number->format($punchAttendance->user_id) ?></td>
                            <td><?= h($punchAttendance->comment) ?></td>
                            <td><?= $this->Number->format($punchAttendance->total_amount) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $punchAttendance->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $punchAttendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
