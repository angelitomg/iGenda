<?php $this->assign('title', __('Deal') . ' # ' . $this->Number->format($deal->id)); ?>

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-folder-o"></i> 
        <?= $deal->name ?>
        <small class="pull-right"><?= __('Id') ?>: <?= $this->Number->format($deal->id) ?></small>
      </h2>
    </div>
    <!-- /.col -->
  </div>

  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <dl class="dl-horizontal">
        <dt><?= __('Name') ?>: </dt> 
        <dd><?= h($deal->name) ?><dd>
        <dt><?= __('Client') ?>: </dt> 
        <dd><?= $deal->has('client') ? $deal->client->name : '' ?></dd>
        <dt><?= __('Start Date') ?>: </dt> 
        <dd><?= h($deal->start_date) ?></dd>
        <dt><?= __('End Date') ?>:</dt> 
        <dd><?= h($deal->end_date) ?></dd>
      </dl>
    </tr>

    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <dl class="dl-horizontal">
        <dt><?= __('Description') ?>: </dt> 
        <dd><?= $this->Text->autoParagraph(h($deal->description)); ?><dd>

      </dl>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <dl class="dl-horizontal">
        <dt><?= __('Status') ?>:</dt> 
        <dd><?= $deal->getStatus($deal->status) ?></dd>
        <dt><?= __('User') ?>: </dt> 
        <dd><?= $deal->has('user') ? $deal->user->name : '' ?></dd>
        <dt><?= __('Created') ?>: </dt> 
        <dd><?= h($deal->created) ?></dd>
        <dt><?= __('Modified') ?>:</dt> 
        <dd><?= h($deal->modified) ?></dd>
      </dl>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <?php if (!empty($deal->deal_services)): ?>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <p class="lead"><?= __('Related Services') ?></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Total') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            <?php foreach ($deal->deal_services as $deal_service): ?>
            <tr>
                <td><?= h($deal_service->name) ?></td>
                <td><?= $this->Number->format($deal_service->quantity) ?></td>
                <td><?= $this->Number->currency($deal_service->price) ?></td>
                <td>
                    <?php 
                      $serviceTotal = $deal_service->quantity * $deal_service->price;
                      $total += $serviceTotal;
                    ?>
                    <?= $this->Number->currency($serviceTotal) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="3" class="text-right"><strong><?= __('Total') ?>:</strong> </td>
              <td><?= $this->Number->currency($total) ?></td>
            </tr>
            </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

  </section>




