<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Client Services'), ['controller' => 'ClientServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Service'), ['controller' => 'ClientServices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= h($client->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Document1') ?></th>
            <td><?= h($client->document1) ?></td>
        </tr>
        <tr>
            <th><?= __('Document2') ?></th>
            <td><?= h($client->document2) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($client->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($client->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Site') ?></th>
            <td><?= h($client->site) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Name') ?></th>
            <td><?= h($client->contact_name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $client->has('user') ? $this->Html->link($client->user->name, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $client->has('company') ? $this->Html->link($client->company->name, ['controller' => 'Companies', 'action' => 'view', $client->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthdate') ?></th>
            <td><?= h($client->birthdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($client->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($client->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($client->activities)): ?>
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
            <?php foreach ($client->activities as $activities): ?>
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
        <h4><?= __('Related Client Services') ?></h4>
        <?php if (!empty($client->client_services)): ?>
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
            <?php foreach ($client->client_services as $clientServices): ?>
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
</div>
