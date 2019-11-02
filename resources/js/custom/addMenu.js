window.onload = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    CheckOpenOrClosed();
    changeProductAmountInCart();

};

function changeProductAmountInCart() {

    let cartProductIds = $('.cartProductId');
    $.each(cartProductIds, function () {
        let cartProductId = $(this).val();
        let cartRefreshBtn = $('#cartRefreshBtn' + cartProductId);
        let cartProductAmount = $('#productAmount' + cartProductId);
        const cateringId = $('#cateringId');
        cartRefreshBtn.click(function () {

            $.ajax({
                type: 'POST',
                url: '/catering/' + cateringId.val() + '/cartProduct/update/',
                data: { cartProductId: cartProductId, cartProductAmount: cartProductAmount.val() },
                success: function () {
                    location.reload();
                }

            });
        });



    });
}

function CheckOpenOrClosed() {

    console.log();
    $('#openOrClosed').change(function () {
        if (this.checked) {
            $('.hiddenForm').fadeIn('slow');
            $('#openOrClosedLabel').html('Open');
        }
        else {
            $('.hiddenForm').fadeOut('fast');
            $('#openOrClosedLabel').html('Closed');
        }

    });
}