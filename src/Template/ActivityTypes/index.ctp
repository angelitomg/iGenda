<?php $this->assign('title', __('Activity Types')); ?>
<?php $this->assign('description', __('Here you can define custom activity types.')); ?>

<div class="row">

  <div class="col-md-12">    

    <p>
        <?= $this->Html->link(__('New Acivity Type'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php if ($activityTypes->isEmpty()): ?>
      <!-- Empty list message -->
      <div class="callout callout-info alert-empty-list" style="background-color: #3c8dbc !important;">
        <h4><?= __('Hello!') ?></h4>
          <p><?= __('You have not registered any activity type. Click the New Activity Type button to add a new activity type.') ?></p>
      </div>
    <?php endif; ?>

    <div class="box">

        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px"><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('name') ?></th>
              <th><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activityTypes as $activityType): ?>
                <tr>
                    <td><?= $this->Number->format($activityType->id) ?></td>
                    <td><?= h($activityType->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activityType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activityType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityType->id)]) ?>
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
