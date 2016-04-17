<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity Type'), ['action' => 'edit', $activityType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity Type'), ['action' => 'delete', $activityType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activity Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activityTypes view large-9 medium-8 columns content">
    <h3><?= h($activityType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($activityType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $activityType->has('user') ? $this->Html->link($activityType->user->name, ['controller' => 'Users', 'action' => 'view', $activityType->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $activityType->has('company') ? $this->Html->link($activityType->company->name, ['controller' => 'Companies', 'action' => 'view', $activityType->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($activityType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($activityType->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($activityType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($activityType->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Activity Type Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activityType->activities as $activities): ?>
            <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->client_id) ?></td>
                <td><?= h($activities->activity_type_id) ?></td>
                <td><?= h($activities->description) ?></td>
                <td><?= h($activities->start_date) ?></td>
                <td><?= h($activities->end_date) ?></td>
                <td><?= h($activities->status) ?></td>
                <td><?= h($activities->user_id) ?></td>
                <td><?= h($activities->company_id) ?></td>
                <td><?= h($activities->created) ?></td>
                <td><?= h($activities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
