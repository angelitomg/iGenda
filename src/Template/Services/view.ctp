<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Client Services'), ['controller' => 'ClientServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Service'), ['controller' => 'ClientServices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="services view large-9 medium-8 columns content">
    <h3><?= h($service->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($service->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $service->has('user') ? $this->Html->link($service->user->name, ['controller' => 'Users', 'action' => 'view', $service->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $service->has('company') ? $this->Html->link($service->company->name, ['controller' => 'Companies', 'action' => 'view', $service->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($service->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($service->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($service->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($service->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Client Services') ?></h4>
        <?php if (!empty($service->client_services)): ?>
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
            <?php foreach ($service->client_services as $clientServices): ?>
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
