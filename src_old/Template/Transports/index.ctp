<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transport[]|\Cake\Collection\CollectionInterface $transports
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Transports') ?></span>
                </div>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize"><?= 'sr. no.' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'plant' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'village' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'vendor name' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'dispatch date' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'expected delivery' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'vehicle' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'driver name' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'contact no.' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'vehicle number' ?></th>
                            <th scope="col" class="text-capitalize"><?= 'bill no.' ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($transports as $key => $transport): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $transport->has('plant') ? h($transport->plant->name) : '' ?></td>
                            <td><?= $transport->has('village') ? h($transport->village->name) : '' ?></td>
                            <td><?= h($transport->vendor_name) ?></td>
                            <td><?= h($transport->dispatch_date) ?></td>
                            <td><?= h($transport->expected_delivery_date) ?></td>
                            <td><?= h($transport->vehicle) ?></td>
                            <td><?= h($transport->driver_name) ?></td>
                            <td><?= h($transport->contact_no) ?></td>
                            <td><?= h($transport->vehicle_number) ?></td>
                            <td><?= h($transport->bill_no) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $transport->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
