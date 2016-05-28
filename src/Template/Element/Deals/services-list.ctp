    <div class="col-md-12">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= __('Services') ?></h3>
                </div>
                <div class="box-body services-list" id="services-list">

                    <div class="">
                        <div class="col-xs-4">
                            <h4 class="box-title"><?= __('Service') ?></h4>
                        </div>
                        <div class="col-xs-2">
                            <h4 class="box-title"><?= __('Quantity') ?></h4>
                        </div>
                        <div class="col-xs-2">
                            <h4 class="box-title"><?= __('Price') ?></h4>
                        </div>
                        <div class="col-xs-2">
                            <h4 class="box-title"><?= __('Total') ?></h4>
                        </div>
                        <div class="col-xs-2">
                            
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <?= $this->Form->button(__('Add Service'), ['type' => 'button', 'class' => 'btn btn-primary', 'id' => 'btn-add-service']) ?>
                </div>
            </div>
        </div>

    </div>