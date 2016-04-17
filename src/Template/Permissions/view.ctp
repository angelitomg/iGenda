<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Permissions'), ['controller' => 'UserPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Permission'), ['controller' => 'UserPermissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissions view large-9 medium-8 columns content">
    <h3><?= h($permission->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($permission->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Path') ?></th>
            <td><?= h($permission->path) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($permission->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Permissions') ?></h4>
        <?php if (!empty($permission->user_permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Permission Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permission->user_permissions as $userPermissions): ?>
            <tr>
                <td><?= h($userPermissions->id) ?></td>
                <td><?= h($userPermissions->user_id) ?></td>
                <td><?= h($userPermissions->permission_id) ?></td>
                <td><?= h($userPermissions->created) ?></td>
                <td><?= h($userPermissions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserPermissions', 'action' => 'view', $userPermissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserPermissions', 'action' => 'edit', $userPermissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserPermissions', 'action' => 'delete', $userPermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPermissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
