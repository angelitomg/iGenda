<?php $this->assign('title', __('Activities')); ?>
<?php $this->assign('description', __('Here you can create and edit your activities.')); ?>

<div class="row">

  <div class="col-md-12">    

    <p>
        <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="box">

        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>

            <tr>
              <th style="width: 10px"><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('client_id') ?></th>
              <th><?= $this->Paginator->sort('activity_type_id') ?></th>
              <th><?= $this->Paginator->sort('description') ?></th>
              <th><?= $this->Paginator->sort('start_date') ?></th>
              <th><?= $this->Paginator->sort('end_date') ?></th>
              <th><?= $this->Paginator->sort('status') ?></th>
              <th><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= $this->Number->format($activity->id) ?></td>
                    <td><?= h($activity->client->name) ?></td>
                    <td><?= h($activity->activity_type->name) ?></td>
                    <td><?= h($activity->description) ?></td>
                    <td><?= h($activity->start_date) ?></td>
                    <td><?= h($activity->end_date) ?></td>
                    <td><?= h($activity->getStatus($activity->status)) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $activity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
          </tbody></table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
            <li><?= $this->Paginator->numbers() ?></li>
            <li><?= $this->Paginator->next(__('next') . ' >') ?></li>
          </ul>
        </div>
    </div>

  </div>

</div>
