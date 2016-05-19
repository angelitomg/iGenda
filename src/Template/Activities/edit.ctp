<?php $this->assign('title', __('Add Activity')); ?>
<div class="row">

    <?= $this->Form->create($activity); ?>

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">

            <div class="form-group">
                <?= $this->Form->input('client_id', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->input('activity_type_id', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->input('description', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <label><?= __('Start date') ?></label>
                <?= $this->Form->input('start_date', ['label' => false, 'class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <label><?= __('End date') ?></label>
                <?= $this->Form->input('end_date', ['label' => false, 'class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->input('status', ['class' => 'form-control', 'options' => $activity->getStatusList()]) ?>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
      </div><!-- /.box -->

    </div><!-- /.col (left) -->

    <?= $this->Form->end() ?>

</div>