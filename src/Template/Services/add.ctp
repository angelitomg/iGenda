<?php $this->assign('title', __('Add Service')); ?>
<div class="row">

    <?= $this->Form->create($service); ?>

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">

            <div class="form-group">
                <?= $this->Form->input('name', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->input('price', ['label' => __('Default price'), 'class' => 'form-control']) ?>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
      </div><!-- /.box -->

    </div><!-- /.col (left) -->

    <?= $this->Form->end() ?>

</div>