<?php use Cake\I18n\Time; ?>
<?php $this->assign('title', __('Dashboard')); ?>
<?php $this->assign('description', __('What is happening...')); ?>


  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $totalClients; ?></h3>

          <p><?= __('Clients') ?></p>
        </div>
        <div class="icon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'Clients', 'action' => 'index']) ?>" class="small-box-footer">
          <?= __('More info') ?> <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $totalCompletedActivities ?></h3>

          <p><?= __('Completed Activities (Last 7 Days)') ?></p>
        </div>
        <div class="icon">
          <i class="ion ion-wand"></i>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'Activities', 'action' => 'index']) ?>" class="small-box-footer">
          <?= __('More info') ?> <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $totalInProgressDeals ?></h3>

          <p><?= __('In Progress Deals') ?></p>
        </div>
        <div class="icon">
          <i class="ion ion-briefcase"></i>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'Deals', 'action' => 'index']) ?>" class="small-box-footer">
          <?= __('More info') ?> <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $totalPendingActivities ?></h3>

          <p><?= __('Pending Activities') ?></p>
        </div>
        <div class="icon">
          <i class="ion ion-compose"></i>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'Activities', 'action' => 'index']) ?>" class="small-box-footer">
          <?= __('More info') ?> <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Today Activities') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive with-border">
          <table class="table table-hover">
            <tr>
              <th><?= __('Type') ?></th>
              <th><?= __('Client') ?></th>
              <th><?= __('Status') ?></th>
              <th></th>
            </tr>
            <?php foreach ($todayActivities as $activity): ?>
              <tr>
                <td><?= $activity->activity_types->name ?></td>
                <td><?= $activity->client->name ?></td>
                <td><?= $activity->getStatus($activity->status) ?></td>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Upcoming Birthdays') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive with-border">
          <?php if (!empty($upcomingBirthdates)): ?>
            <table class="table table-hover">
              <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Birthdate') ?></th>
                <th></th>
              </tr>
              <?php foreach ($upcomingBirthdates as $ub): ?>
              <tr>
                <td><?= $this->Number->format($ub['id']) ?></td>
                <td><?= h($ub['name']) ?></td>
                <?php
                    $birthdate = Time::parse($ub['birthdate']);
                    $birthdate->i18nFormat(\IntlDateFormatter::SHORT); // Use the full date and time format
                ?>
                <td><?= format_date($birthdate); ?></td>
                <td><?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $ub['id']]) ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          <?php else: ?>
            <p><?= __('No birthdays in the coming days.') ?></p>
          <?php endif; ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

  </div>