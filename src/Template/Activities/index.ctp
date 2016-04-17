<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activity Types'), ['controller' => 'ActivityTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity Type'), ['controller' => 'ActivityTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activities index large-9 medium-8 columns content">
    <h3><?= __('Activities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('client_id') ?></th>
                <th><?= $this->Paginator->sort('activity_type_id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('company_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= $this->Number->format($activity->id) ?></td>
                <td><?= $activity->has('client') ? $this->Html->link($activity->client->name, ['controller' => 'Clients', 'action' => 'view', $activity->client->id]) : '' ?></td>
                <td><?= $activity->has('activity_type') ? $this->Html->link($activity->activity_type->name, ['controller' => 'ActivityTypes', 'action' => 'view', $activity->activity_type->id]) : '' ?></td>
                <td><?= h($activity->description) ?></td>
                <td><?= h($activity->start_date) ?></td>
                <td><?= h($activity->end_date) ?></td>
                <td><?= $this->Number->format($activity->status) ?></td>
                <td><?= $activity->has('user') ? $this->Html->link($activity->user->name, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
                <td><?= $activity->has('company') ? $this->Html->link($activity->company->name, ['controller' => 'Companies', 'action' => 'view', $activity->company->id]) : '' ?></td>
                <td><?= h($activity->created) ?></td>
                <td><?= h($activity->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
