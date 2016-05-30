<?php $this->assign('title', __('Clients')); ?>
<?php $this->assign('description', __('All your clients can be managed in this section.')); ?>
<?php $clientName = (isset($this->request->query['name'])) ? $this->request->query['name'] : ''; ?>

<div class="row">

  <div class="col-md-12">    

    <p>
        <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php if ($clients->isEmpty()): ?>
      <!-- Empty list message -->
      <div class="callout callout-info alert-empty-list" style="background-color: #3c8dbc !important;">
        <h4><?= __('Hello!') ?></h4>
          <p><?= __('You have not registered any client. Click the New Client button to add a new client.') ?></p>
      </div>
    <?php endif; ?>


    <?= $this->Form->create('Clients', ['type' => 'get']) ?>

    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?= __('Search Clients') ?></h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="name"><?= __('Name') ?></label>
            <?= $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'value' => h($clientName)]) ?>
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
        </div>
      </form>
    </div><!-- /.box -->

    <?= $this->Form->end() ?>

    <div class="box">

        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px"><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('name') ?></th>
              <th><?= $this->Paginator->sort('birthdate') ?></th>
              <th><?= $this->Paginator->sort('phone') ?></th>
              <th><?= $this->Paginator->sort('email') ?></th>
              <th><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $this->Number->format($client->id) ?></td>
                    <td><?= h($client->name) ?></td>
                    <td><?= h($client->birthdate) ?></td>
                    <td><?= h($client->phone) ?></td>
                    <td><?= h($client->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
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
