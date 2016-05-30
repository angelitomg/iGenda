<?php $this->assign('title', __('Activities')); ?>
<?php $this->assign('description', __('Here you can create and edit your activities.')); ?>

<div class="row">

  <div class="col-md-12">    

    <p>
        <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php if ($activities->isEmpty()): ?>
      <!-- Empty list message -->
      <div class="callout callout-info alert-empty-list" style="background-color: #3c8dbc !important;">
        <h4><?= __('Hello!') ?></h4>
          <p><?= __('You have not registered any activity. Click the New Activity button to add a new activity.') ?></p>
      </div>
    <?php endif; ?>

    <div class="box box-primary">

      <?= $this->Form->create(null, ['type' => 'get']) ?>

      <div class="box-header">
        <h3 class="box-title">Busca de Pedidos</h3>
      </div><!-- /.box-header -->
      <div class="box-body">

        <div class="row">

          <div class="col-xs-4">
            <div class="form-group">
              <?= $this->Form->input('client_id', ['class' => 'form-control', 'options' => $clients, 'empty' => __('All')]) ?>
            </div>
          </div>

          <div class="col-xs-2">
            <div class="form-group">
              <?= $this->Form->input('activity_type_id', ['class' => 'form-control', 'options' => $activityTypes, 'empty' => __('All')]) ?>
              
            </div>
          </div>

          <div class="col-xs-2">
            <div class="form-group">
              <label for="start_date"><?= __('Start Date') ?></label>
              <div class="input-group">
                  <?= $this->Form->date('start_date', ['class' => 'form-control']) ?>
              </div><!-- /.input group -->
            </div>
          </div>

          <div class="col-xs-2">
            <div class="form-group">
              <label for="start_date"><?= __('End Date') ?></label>
              <div class="input-group">
                  <?= $this->Form->date('end_date', ['class' => 'form-control']) ?>
              </div><!-- /.input group -->
            </div>
          </div>

          <div class="col-xs-2">
            <div class="form-group">
              <?= $this->Form->input('status', ['class' => 'form-control', 'options' => $statusList, 'empty' => __('All')]) ?>
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

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= $this->Number->format($activity->id) ?></td>
                    <td><?= h($activity->client->name) ?></td>
                    <td><?= h($activity->activity_type->name) ?></td>
                    <td><?= h($activity->start_date) ?></td>
                    <td><?= h($activity->end_date) ?></td>
                    <td>
                      <?php
                          $css_class = '';
                          if ($activity->status > 0  && $activity->status <= 10) $css_class = 'label-warning';
                          if ($activity->status > 10 && $activity->status <= 20) $css_class = 'label-info';
                          if ($activity->status > 20 && $activity->status <= 30) $css_class = 'label-danger';
                          if ($activity->status > 30 && $activity->status <= 40) $css_class = 'label-success';
                      ?>
                      <span class="label <?= $css_class ?>"><?= h($activity->getStatus($activity->status)) ?></span>  
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
