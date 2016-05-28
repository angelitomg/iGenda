<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Deals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deals form large-9 medium-8 columns content">
    <?= $this->Form->create($deal) ?>
    <fieldset>
        <legend><?= __('Edit Deal') ?></legend>
        <?php
            echo $this->Form->input('client_id', ['options' => $clients]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('quantity');
            echo $this->Form->input('price');
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
            echo $this->Form->input('status');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('services._ids', ['options' => $services]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
