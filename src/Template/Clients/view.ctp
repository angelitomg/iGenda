<?php $this->assign('title', __('Client') . ' # ' . $this->Number->format($client->id)); ?>

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-user"></i> 
        <?= $client->name ?>
        <small class="pull-right"><?= __('Id') ?>: <?= $this->Number->format($client->id) ?></small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <dl class="dl-horizontal">
        <dt><?= __('Name') ?>: </dt> 
        <dd><?= h($client->name) ?><dd>
        <dt><?= __('Document1') ?>: </dt> 
        <dd><?= h($client->document1) ?></dd>
        <dt><?= __('Document2') ?>: </dt> 
        <dd><?= h($client->document2) ?></dd>
        <dt><?= __('Birthdate') ?>:</dt> 
        <dd><?= h($client->birthdate) ?></dd>
      </dl>
    </tr>

    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <dl class="dl-horizontal">
        <dt><?= __('Address') ?>: </dt> 
        <dd><?= $this->Text->autoParagraph(h($client->address)); ?><dd>
        <dt><?= __('Phone') ?>: </dt> 
        <dd><?= h($client->phone) ?><dd>
        <dt><?= __('Email') ?>: </dt> 
        <dd><?= h($client->email) ?></dd>
        <dt><?= __('Site') ?>: </dt> 
        <dd><?= h($client->site) ?></dd>

      </dl>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <dl class="dl-horizontal">
        <dt><?= __('Contact Name') ?>:</dt> 
        <dd><?= h($client->contact_name) ?></dd>
        <dt><?= __('User') ?>: </dt> 
        <dd><?= $client->has('user') ? $client->user->name : '' ?></dd>
        <dt><?= __('Created') ?>: </dt> 
        <dd><?= h($client->created) ?></dd>
        <dt><?= __('Modified') ?>:</dt> 
        <dd><?= h($client->modified) ?></dd>
      </dl>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <?php if (!$activities->isEmpty()): ?>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <p class="lead"><?= __('Next Activities') ?></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Activity Type') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= h($activity->id) ?></td>
                <td><?= h($activity->activity_type->name) ?></td>
                <td><?= h($activity->start_date) ?></td>
                <td><?= h($activity->end_date) ?></td>
                <td>
                  <?= $activity->getStatus($activity->status) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

  <!-- Table row -->
  <?php if (!$deals->isEmpty()): ?>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <p class="lead"><?= __('Current Deals') ?></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($deals as $deal): ?>
            <tr>
                <td><?= h($deal->id) ?></td>
                <td><?= h($deal->name) ?></td>
                <td><?= h($deal->start_date) ?></td>
                <td><?= h($deal->end_date) ?></td>
                <td><?= $this->Number->currency($deal->amount) ?></td>
                <td>
                  <?= $deal->getStatus($deal->status) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deals', 'action' => 'view', $deal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deals', 'action' => 'edit', $deal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deals', 'action' => 'delete', $deal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deal->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

  </section>



