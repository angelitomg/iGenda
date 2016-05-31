<?php $this->assign('title', __('Edit Deal')); ?>
<div class="row">

    <?= $this->Form->create($deal); ?>

    <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-body">

                <div class="form-group">
                  <?= $this->Form->input('name', ['class' => 'form-control']) ?>
                </div>

                <div class="form-group">
                  <?= $this->Form->input('client_id', ['class' => 'form-control', 'options' => $clients]) ?>
                </div>


                <div class="form-group">
                  <?= $this->Form->input('description', ['class' => 'form-control']) ?>
                </div>

                <div class="form-group">
                  <label><?= __('Start date') ?></label>
                  <?= $this->Form->input('start_date', ['class' => 'form-control', 'label' => false]) ?>
                </div>

                <div class="form-group">
                  <label><?= __('End date') ?></label>
                  <?= $this->Form->input('end_date', ['class' => 'form-control', 'label' => false]) ?>
                </div>

                <div class="form-group">
                  <?= $this->Form->input('status', ['class' => 'form-control', 'options' => $deal->getStatusList()]) ?>
                </div>

                <div class="form-group">
                  <?= $this->Form->input('amount', ['class' => 'form-control', 'value' => '0', 'label' => __('Total'), 'readonly' => 'readonly']) ?>
                </div>

            </div><!-- /.box-body -->
          
          <div class="box-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
          </div>
        
        </div><!-- /.box -->

    </div>

    <?= $this->element('Deals/services-list') ?>

    <?= $this->Form->end() ?>

</div>

<?= $this->element('Deals/deals-form-js') ?>
<?php if (!empty($deal->deal_services)): ?>
    <script>
        $(function(){
            <?php foreach ($deal->deal_services as $s): ?>
                <?php echo "addServiceListRow($s->service_id, $s->quantity, $s->price);"; ?>
            <?php endforeach; ?>
        });
    </script>
<?php endif; ?>

<!-- Service prices -->
<?php if (!empty($servicesData)): ?>
  <?php foreach ($servicesData as $service): ?>
    <input type="hidden" id="service-price-list-<?= $service->id ?>" value="<?= $service->price ?>" />
  <?php endforeach; ?>
<?php endif; ?>