<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activity Types'), ['controller' => 'ActivityTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity Type'), ['controller' => 'ActivityTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Client Services'), ['controller' => 'ClientServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Service'), ['controller' => 'ClientServices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Permissions'), ['controller' => 'UserPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Permission'), ['controller' => 'UserPermissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($user->company_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Companies') ?></h4>
        <?php if (!empty($user->companies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Document1') ?></th>
                <th><?= __('Document2') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Site') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->companies as $companies): ?>
            <tr>
                <td><?= h($companies->id) ?></td>
                <td><?= h($companies->name) ?></td>
                <td><?= h($companies->document1) ?></td>
                <td><?= h($companies->document2) ?></td>
                <td><?= h($companies->address) ?></td>
                <td><?= h($companies->phone) ?></td>
                <td><?= h($companies->email) ?></td>
                <td><?= h($companies->site) ?></td>
                <td><?= h($companies->user_id) ?></td>
                <td><?= h($companies->created) ?></td>
                <td><?= h($companies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($user->activities)): ?>
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
            <?php foreach ($user->activities as $activities): ?>
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
    <div class="related">
        <h4><?= __('Related Activity Types') ?></h4>
        <?php if (!empty($user->activity_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->activity_types as $activityTypes): ?>
            <tr>
                <td><?= h($activityTypes->id) ?></td>
                <td><?= h($activityTypes->name) ?></td>
                <td><?= h($activityTypes->user_id) ?></td>
                <td><?= h($activityTypes->company_id) ?></td>
                <td><?= h($activityTypes->created) ?></td>
                <td><?= h($activityTypes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ActivityTypes', 'action' => 'view', $activityTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ActivityTypes', 'action' => 'edit', $activityTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ActivityTypes', 'action' => 'delete', $activityTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Client Services') ?></h4>
        <?php if (!empty($user->client_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Service Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->client_services as $clientServices): ?>
            <tr>
                <td><?= h($clientServices->id) ?></td>
                <td><?= h($clientServices->service_id) ?></td>
                <td><?= h($clientServices->client_id) ?></td>
                <td><?= h($clientServices->name) ?></td>
                <td><?= h($clientServices->quantity) ?></td>
                <td><?= h($clientServices->price) ?></td>
                <td><?= h($clientServices->start_date) ?></td>
                <td><?= h($clientServices->end_date) ?></td>
                <td><?= h($clientServices->status) ?></td>
                <td><?= h($clientServices->user_id) ?></td>
                <td><?= h($clientServices->company_id) ?></td>
                <td><?= h($clientServices->created) ?></td>
                <td><?= h($clientServices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ClientServices', 'action' => 'view', $clientServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ClientServices', 'action' => 'edit', $clientServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClientServices', 'action' => 'delete', $clientServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($user->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Birthdate') ?></th>
                <th><?= __('Document1') ?></th>
                <th><?= __('Document2') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Site') ?></th>
                <th><?= __('Contact Name') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->clients as $clients): ?>
            <tr>
                <td><?= h($clients->id) ?></td>
                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->birthdate) ?></td>
                <td><?= h($clients->document1) ?></td>
                <td><?= h($clients->document2) ?></td>
                <td><?= h($clients->address) ?></td>
                <td><?= h($clients->phone) ?></td>
                <td><?= h($clients->email) ?></td>
                <td><?= h($clients->site) ?></td>
                <td><?= h($clients->contact_name) ?></td>
                <td><?= h($clients->user_id) ?></td>
                <td><?= h($clients->company_id) ?></td>
                <td><?= h($clients->created) ?></td>
                <td><?= h($clients->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Services') ?></h4>
        <?php if (!empty($user->services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->services as $services): ?>
            <tr>
                <td><?= h($services->id) ?></td>
                <td><?= h($services->name) ?></td>
                <td><?= h($services->price) ?></td>
                <td><?= h($services->user_id) ?></td>
                <td><?= h($services->company_id) ?></td>
                <td><?= h($services->created) ?></td>
                <td><?= h($services->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Services', 'action' => 'view', $services->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Services', 'action' => 'edit', $services->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Services', 'action' => 'delete', $services->id], ['confirm' => __('Are you sure you want to delete # {0}?', $services->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Permissions') ?></h4>
        <?php if (!empty($user->user_permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Permission Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_permissions as $userPermissions): ?>
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
