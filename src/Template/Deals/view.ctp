<div class="deals view large-9 medium-8 columns content">
    <h3><?= h($deal->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Client') ?></th>
            <td><?= $deal->client->name ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($deal->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $deal->has('user') ? $this->Html->link($deal->user->name, ['controller' => 'Users', 'action' => 'view', $deal->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $deal->has('company') ? $this->Html->link($deal->company->name, ['controller' => 'Companies', 'action' => 'view', $deal->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($deal->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($deal->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($deal->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($deal->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($deal->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($deal->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($deal->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($deal->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($deal->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Services') ?></h4>
        <?php if (!empty($deal->services)): ?>
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
            <?php foreach ($deal->services as $services): ?>
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
