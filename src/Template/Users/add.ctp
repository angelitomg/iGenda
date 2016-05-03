<?php $this->assign('title', __('Add User')); ?>
<div class="row">

    <?= $this->Form->create($user); ?>

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-body">

            <div class="form-group">
                <?= $this->Form->input('name', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->input('email', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->input('password', ['class' => 'form-control']) ?>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
      </div><!-- /.box -->

    </div><!-- /.col (left) -->

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-body">

            <?php
                echo $this->Form->input(
                    'permissions._ids', 
                    [
                        'options' => $permissions, 
                        'multiple' => 'checkbox', 
                        'label' => ['text' => __('Permissions'), 'class' => 'label-association']]
                );
            ?>

        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col (right) -->

    <?= $this->Form->end() ?>

</div>