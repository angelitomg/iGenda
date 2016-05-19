<?php $this->assign('title', __('Activity') . ' # ' . $this->Number->format($activity->id)); ?>

<!-- Default box -->
<div class="box">

<div class="box-body">
  
  <div class="col-md-6">

    <dl class="dl-horizontal">

        <dt><?= __('Client') ?>:</dt>
        <dd><?= $activity->has('client') ? $activity->client->name : '' ?></dd>

        <dt><?= __('Activity Type') ?>:</dt>
        <dd><?= $activity->has('activity_type') ? $activity->activity_type->name : '' ?></dd>

        <dt><?= __('Description') ?>:</dt>
        <dd><?= h($activity->description) ?></dd>

        <dt><?= __('User') ?>:</dt>
        <dd><?= $activity->has('user') ? $activity->user->name : '' ?></dd>

    </dl>
  </div>

  <div class="col-md-6">
    
    <dl class="dl-horizontal">

        <dt><?= __('Start Date') ?>:</dt>
        <dd><?= h($activity->start_date) ?></dd>

        <dt><?= __('End Date') ?>:</dt>
        <dd><?= h($activity->end_date) ?></dd>

        <dt><?= __('Created') ?>:</dt>
        <dd><?= h($activity->created) ?></dd>

        <dt><?= __('Modified') ?>:</dt>
        <dd><?= h($activity->modified) ?></dd>

        <dt><?= __('Status') ?>:</dt>
        <dd><?= $activity->getStatus($activity->status) ?></dd>

    </dl>

  </div>

</div>
<!-- /.box-body -->

</div>
<!-- /.box -->
