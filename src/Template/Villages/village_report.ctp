 <div class="portlet-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?= __('sr. no.') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('name') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('block') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('population') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('no_household') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('latitude') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('longitude') ?></th>
                            <th class="text-capitalize" scope="col"><?= __('customer Care') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr_no = 0; ?>
                        <?php foreach ($villages as $key => $village): $sr_no++;?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= __($village->name) ?></td>
                            <td><?= $village->has('block') ? h($village->block->name) : '' ?></td>
                            <td><?= $this->Number->format($village->population) ?></td>
                            <td><?= h($village->no_household) ?></td>
                            <td><?= h($village->latitude) ?></td>
                            <td><?= h($village->longitude) ?></td>
                            <td><?= h($village->customer_care) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>