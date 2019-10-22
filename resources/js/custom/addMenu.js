// require('moment');

window.onload = function () {
    CheckOpenOrClosed();
    // $('#opening').timepicker();

};

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