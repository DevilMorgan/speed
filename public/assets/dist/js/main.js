$(document).ready(function () {
    bsCustomFileInput.init();
    $('[data-mask]').inputmask();

    $('#governorate_id').change(function () {

        var id = $(this).val();
        $('#city_id').html('');
        $.get('/get-cities', {
            governorate_id: id
        }, function (data) {

            $.each(data, function (_index, city) {

                $('#city_id').append($('<option></option>').val(city.id).html(city.name));
            }, 'json');

            if ($('#city_id').attr('data')) {

                $('#city_id').val($('#city_id').attr('data'));
            }
            $('#city_id').removeAttr('data');
        });
    });

    $('#getCitiesPriceSelect').change(function () {
        $('#getCitiesPrice').submit();
    });

});

/*** get order charge price  */
function getOrderChargePrice() {
    var url = '/order/get-order-charge-price';
    var order_weight = $('input[name="order[order_weight]"]');
    var order_quantity = $('input[name="order[order_quantity]"]');
    var data = {
        order_weight: order_weight.val(),
        order_quantity: order_quantity.val()
    };
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $.get(url, data, function (data) {

        if (data.showModelAddPlacePrice == 1) {
            $('.modal-body').html('');
            $('#modal-default').modal('show');
        }
        $.each(data, function (key, val) {
            $('input[name="order[' + key + ']"]').val(val);

        });
    }).fail(function (errors) {
        $.each(errors.responseJSON.errors, function (key, val) {
            $('input[name="order[' + key + ']"]').addClass('is-invalid');
            $('input[name="order[' + key + ']"]').after('<span class="error invalid-feedback">' + val + '</span>');;
        });
    });
}
/*** get order charge price  */
var loadFile = function (event) {

    var output = document.getElementById('image-privew');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};
