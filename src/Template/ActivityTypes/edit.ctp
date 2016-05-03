<?php $this->assign('title', __('Edit Activity Type')); ?>
<div class="row">

    <?= $this->Form->create($activityType); ?>

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">

            <div class="form-group">
                <?= $this->Form->input('name', ['class' => 'form-control']) ?>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
      </div><!-- /.box -->

    </div><!-- /.col (left) -->

    <?= $this->Form->end() ?>

</div>