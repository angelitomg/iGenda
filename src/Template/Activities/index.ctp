<?php

    $params = $this->request->query;
    $values['client_id'] = (isset($params['client_id'])) ? $params['client_id'] : '';
    $values['activity_type_id'] = (isset($params['client_id'])) ? $params['client_id'] : '';
    $values['status'] = (isset($params['client_id'])) ? $params['client_id'] : '';

    $values['start_date1'] = (isset($this->request->query['start_date1'])) ? $this->request->query['start_date1'] : '';
    $values['start_date2'] = (isset($this->request->query['start_date2'])) ? $this->request->query['start_date2'] : '';
    $values['end_date1'] = (isset($this->request->query['end_date1'])) ? $this->request->query['end_date1'] : '';
    $values['end_date2'] = (isset($this->request->query['end_date2'])) ? $this->request->query['end_date2'] : '';

?>

<?php $this->assign('title', __('Activities')); ?>
<?php $this->assign('description', __('Here you can create and edit your activities.')); ?>

<div class="row">

  <div class="col-md-12">    

    <p>
        <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php if ($total == 0): ?>
      <!-- Empty list message -->
      <div class="callout callout-info alert-empty-list" style="background-color: #3c8dbc !important;">
        <h4><?= __('Hello!') ?></h4>
          <p><?= __('You have not registered any activity. Click the New Activity button to add a new activity.') ?></p>
      </div>
    <?php endif; ?>

    <div class="box box-primary">

      <?= $this->Form->create(null, ['type' => 'get']) ?>

      <div class="box-header">
        <h3 class="box-title"><?= __('Activities Search') ?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">

        <div class="row">

          <div class="col-xs-2">
            <div class="form-group">
              <?= $this->Form->input('client_id', ['class' => 'form-control', 'options' => $clients, 'empty' => __('All'), 'value' => $values['client_id']]) ?>
            </div>
          </div>
          <div class="col-xs-2">
            <div class="form-group">
              <?= $this->Form->input('activity_type_id', ['class' => 'form-control', 'options' => $activityTypes, 'empty' => __('All'), 'value' => $values['activity_type_id']]) ?>
              
            </div>
          </div>

          <div class="col-xs-3">
            <div class="form-group text-center">
              <label><?= __('Start Date') ?></label>
              <div class="input-group form-date-group">
                  <?= $this->Form->date('start_date1', ['class' => 'form-control', 'value' => $values['start_date1']]) ?><br>
                  <?= $this->Form->date('start_date2', ['class' => 'form-control', 'value' => $values['start_date2']]) ?>
              </div><!-- /.input group -->
            </div>
          </div>

          <div class="col-xs-3">
            <div class="form-group text-center">
              <label><?= __('End Date') ?></label>
              <div class="input-group form-date-group">
                  <?= $this->Form->date('end_date1', ['class' => 'form-control', 'value' => $values['end_date1']]) ?><br>
                  <?= $this->Form->date('end_date2', ['class' => 'form-control', 'value' => $values['end_date2']]) ?>
              </div><!-- /.input group -->
            </div>
          </div>

          <div class="col-xs-2">
            <div class="form-group">
              <?= $this->Form->input('status', ['class' => 'form-control', 'options' => $statusList, 'empty' => __('All'), 'value' => $values['status']]) ?>
            </div>
          </div>

        </div>

      </div><!-- /.box-body -->

        <div class="box-footer">
          <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
        </div>

      <?= $this->Form->end() ?>

    </div><!-- /.box -->

    <div class="box">

        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>

            <tr>
              <th style="width: 10px"><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('client_id') ?></th>
              <th><?= $this->Paginator->sort('activity_type_id') ?></th>
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
                    <td><?= h($activity->start_date) ?></td>
                    <td><?= h($activity->end_date) ?></td>
                    <td>
                      <?= $activity->getStatus($activity->status) ?>
                    </td>
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
        <?php if ($report == null): ?>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
            <li><?= $this->Paginator->numbers() ?></li>
            <li><?= $this->Paginator->next(__('next') . ' >') ?></li>
          </ul>
        </div>
        <?php endif; ?>
    </div>

  </div>

</div>
