<?php $this->assign('title', __('Login')); ?>
<div class="users form large-12 medium-12 columns">
    <div class="large-4 medium-4 center-block">
        <?= $this->Form->create(); ?>
        <fieldset>
            <legend>Login</legend>
            <?php
                echo $this->Form->input('email');
                echo $this->Form->input('password');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Sign in')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
