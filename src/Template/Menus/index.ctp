<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu[]|\Cake\Collection\CollectionInterface $menus
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Menus') ?></span>
                </div>
            </div>
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize">Sr. No.</th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('menu_name') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('parent_id') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('controller') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('action') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('icon_class_name') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('is_hidden') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('query_string') ?></th>

                            <th scope="col" class="text-capitalize"><?= $this->Paginator->sort('target') ?></th>

                            <th scope="col" class="actions text-capitalize"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = @$_GET['page'] ? ($_GET['page']-1) * 20 : 0; ?>
                        <?php foreach ($menus as $key => $menu): $sr_no++;?>
                        <tr>
                            <td><?= $this->Number->format($menu->id) ?></td>
                            <td><?= h($menu->menu_name) ?></td>
                            <td><?= $menu->has('parent_menu') ? h($menu->parent_menu->menu_name) : '' ?></td>
                            <td><?= h($menu->controller) ?></td>
                            <td><?= h($menu->action) ?></td>
                            <td><?= h($menu->icon_class_name) ?></td>
                            <td><?= h($menu->is_hidden) ?></td>
                            <td><?= h($menu->query_string) ?></td>
                            <td><?= h($menu->target) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-pencil' ></i>"), ['action' => 'edit', $menu->id],['class'=>'btn btn-sm btn-success','escape'=>false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash' ></i>"), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sr_no),'class'=>'btn btn-sm btn-danger','escape'=>false]) ?>
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
