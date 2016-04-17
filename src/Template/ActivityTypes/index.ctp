<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Activity Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activityTypes index large-9 medium-8 columns content">
    <h3><?= __('Activity Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('company_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activityTypes as $activityType): ?>
            <tr>
                <td><?= $this->Number->format($activityType->id) ?></td>
                <td><?= h($activityType->name) ?></td>
                <td><?= $activityType->has('user') ? $this->Html->link($activityType->user->name, ['controller' => 'Users', 'action' => 'view', $activityType->user->id]) : '' ?></td>
                <td><?= $activityType->has('company') ? $this->Html->link($activityType->company->name, ['controller' => 'Companies', 'action' => 'view', $activityType->company->id]) : '' ?></td>
                <td><?= h($activityType->created) ?></td>
                <td><?= h($activityType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activityType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activityType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activityType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityType->id)]) ?>
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
