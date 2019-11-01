window.onload = function () {
    CheckOpenOrClosed();

};

function CheckOpenOrClosed() {

    console.log();
    $('#activeCatering').change(function () {
        if (this.checked) {
            $('#activeCateringLabel').html('Active');
        }
        else {
            $('#activeCateringLabel').html('Inactive');
        }

    });
}