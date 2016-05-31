<?php $this->assign('title', __('Edit Client')); ?>
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <?= $this->Form->create($client) ?>
          <div class="box-body">

            <div class="form-group">
              <?= $this->Form->input('name', ['class' => 'form-control']) ?>
            </div>

            <div class="form-group">
              <label><?= __('Birthdate'); ?></label>
              <?= $this->Form->input('birthdate', ['class' => 'form-control', 'label' => false, 'minYear' => date('Y') - 100, 'maxYear' => date('Y')]) ?>
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

            <div class="form-group">
              <?= $this->Form->input('contact_name', ['class' => 'form-control']) ?>
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

