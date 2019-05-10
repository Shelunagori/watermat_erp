<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GodownVillage[]|\Cake\Collection\CollectionInterface $godownVillages
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Godown Villages') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('godown_id') ?></th>
                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('village_id') ?></th>
                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($godownVillages as $key => $godownVillage): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($sr_no) ?></td>
                            <td><?= $godownVillage->has('godown') ? h($godownVillage->godown->name) : '' ?></td>
                            <td><?= $godownVillage->has('village') ? h($godownVillage->village->name) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $godownVillage->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $godownVillage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
