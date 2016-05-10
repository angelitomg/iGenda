<?php $this->assign('title', __('Edit Company Info')); ?>
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <?= $this->Form->create($company) ?>
          <div class="box-body">

            <div class="form-group">
              <?= $this->Form->input('name', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <?= $this->Form->input('document1', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <?= $this->Form->input('document2', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <?= $this->Form->input('address', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <?= $this->Form->input('phone', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <?= $this->Form->input('email', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <?= $this->Form->input('site', ['class' => 'form-control']) ?>
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
      <!-- /.box -->
    </div>
</div>
