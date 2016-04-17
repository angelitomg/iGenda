<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
    </ul>
</nav>
<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Document1') ?></th>
            <td><?= h($company->document1) ?></td>
        </tr>
        <tr>
            <th><?= __('Document2') ?></th>
            <td><?= h($company->document2) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($company->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($company->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Site') ?></th>
            <td><?= h($company->site) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($company->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($company->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($company->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->company_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($company->activities)): ?>
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
            <?php foreach ($company->activities as $activities): ?>
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
        <?php if (!empty($company->activity_types)): ?>
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
            <?php foreach ($company->activity_types as $activityTypes): ?>
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
        <?php if (!empty($company->client_services)): ?>
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
            <?php foreach ($company->client_services as $clientServices): ?>
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
        <?php if (!empty($company->clients)): ?>
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
            <?php foreach ($company->clients as $clients): ?>
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
        <?php if (!empty($company->services)): ?>
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
            <?php foreach ($company->services as $services): ?>
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
</div>
