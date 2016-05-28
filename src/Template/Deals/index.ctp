<?php $this->assign('title', __('Deals')); ?>
<?php $this->assign('description', __('Here you can manage your deals.')); ?>

<div class="row">

  <div class="col-md-12">    

    <p>
        <?= $this->Html->link(__('New Deal'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php if ($deals->isEmpty()): ?>
      <!-- Empty list message -->
      <div class="callout callout-info alert-empty-list" style="background-color: #3c8dbc !important;">
        <h4><?= __('Hello!') ?></h4>
          <p><?= __('You have not registered any deal. Click the New Deal button to add a new deal.') ?></p>
      </div>
    <?php endif; ?>

    <div class="box">

        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>

            <tr>
              <th style="width: 10px"><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('client_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($deals as $deal): ?>
            <tr>
                <td><?= $this->Number->format($deal->id) ?></td>
                <td><?= $deal->has('client') ? $this->Html->link($deal->client->name, ['controller' => 'Clients', 'action' => 'view', $deal->client->id]) : '' ?></td>
                <td><?= h($deal->name) ?></td>
                <td><?= $this->Number->format($deal->price) ?></td>
                <td><?= h($deal->start_date) ?></td>
                <td><?= h($deal->end_date) ?></td>
                <td><?= $deal->getStatus($deal->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deal->id)]) ?>
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

