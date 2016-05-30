<script type="text/javascript">

    // replaceAll function
    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.split(search).join(replacement);
    };

    $(function () {

        rowID = 0;

        window.addServiceListRow = function(service_id, quantity, price) {


            var html = '<div class="services-row">';

            html += '<div class="col-xs-4">\
                        <div class="form-group">';

            price = parseFloat(price).toFixed(2);

            // Generate services combo
            html += '<?php echo $this->Form->input("deal_services[__ROWID__][service_id]", ["class" => "form-control service-name", "data-row-id" => "__ROWID__", "empty" => __("Select..."), "id" => "service-__ROWID__", "options" => $services, "label" => false]); ?>';

            total = 0;

            html += '</div>\
                    </div>\
                    <input type="hidden" name="deal_services[' + rowID + '][name]" value="" data-row-id="' + rowID + '" id="service-name-' + rowID + '"  />\
                    <div class="col-xs-2">\
                        <div class="form-group">\
                            <input type="text" data-row-id="' + rowID + '" id="service-quantity-' + rowID + '" class="form-control service-quantity" name="deal_services[' + rowID + '][quantity]" value="' + quantity + '" />\
                        </div>\
                    </div>\
                    <div class="col-xs-2">\
                        <div class="form-group">\
                            <input type="text" data-row-id="' + rowID + '" id="service-price-' + rowID + '" class="form-control service-price" name="deal_services[' + rowID + '][price]" value="' + price + '" />\
                        </div>\
                    </div>\
                    <div class="col-xs-2">\
                        <div class="form-group">\
                            <input type="text" data-row-id="' + rowID + '" id="service-total-' + rowID + '" disabled="disabled" class="form-control service-total" name="deal_services[' + rowID + '][total]" value="' + total + '" />\
                        </div>\
                    </div>\
                    <div class="col-xs-2">\
                        <div class="service-options">\
                            <a style="cursor: pointer;" class="btn-remove-service"><?= __("Delete") ?></a>\
                        </div>\
                    </div>\
                </div>';

            html = html.replaceAll("__ROWID__", rowID);

            $('#services-list').append(html);
            calcServicePrice(rowID);
            $('#service-' + rowID).val(service_id);

            rowID++;

        }

        // Remove service
        $('.services-list').on('click', '.btn-remove-service', function(){
            $(this).parent().parent().parent().remove();
            calcTotalAmount();
        });

        // Add service button
        $('#btn-add-service').click(function(){
            addServiceListRow(0, 1, 0);
        });

        // When service quantity is changed
        $('.services-list').on('keyup', '.service-quantity', function(){
            var row_id = $(this).attr('data-row-id');
            calcServicePrice(row_id);
        });

        // When service price is changed
        $('.services-list').on('keyup', '.service-price', function(){
            var row_id = $(this).attr('data-row-id');
            calcServicePrice(row_id);
        });

        // When service is changed
        $('.services-list').on('change', '.service-name', function(){

            var row_id = $(this).attr('data-row-id');
            var service_id = $(this).val();
            var price = $('#service-price-list-' + service_id).val();
            var service_name = $('#service-' + row_id +  ' option:selected').text();

            price = parseFloat(price).toFixed(2);

            $('#service-name-' + row_id).val(service_name);
            $('#service-price-' + row_id).val(price);

            calcServicePrice(row_id);
        });

        // Calculate and update total service price
        function calcServicePrice(row_id) {
            var quantity = $('#service-quantity-' + row_id).val();
            var price = $('#service-price-' + row_id).val();
            var total = calcTotalPrice(quantity, price);
            $('#service-total-' + row_id).val(total);
            calcTotalAmount();
        }

        // Calculate total service price
        function calcTotalPrice(quantity, price) {
            return parseFloat(quantity * price).toFixed(2);
        }

        // Calculate total amount
        function calcTotalAmount() {
            var total = 0;
            $('.service-total').each(function(){
                total += parseFloat($(this).val())
            });
            total = parseFloat(total).toFixed(2);
            $('#amount').val(total);
        }

    });


</script>