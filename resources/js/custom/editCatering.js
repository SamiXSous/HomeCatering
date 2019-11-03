window.onload = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    CheckOpenOrClosed();

};

function CheckOpenOrClosed() {

    console.log();
    $('#activeCatering').change(function () {
        const cateringId = $('#cateringId');
        if (this.checked) {

            $.ajax({
                type: 'POST',
                url: '/catering/edit/' + cateringId.val() + '/updateActiveState',
                data: { active: this.checked, cateringId: cateringId.val() },
                success: function (data) {

                    // console.log(data.success);

                }

            });
            $('#activeCateringLabel').html('Active');
        }
        else {
            $.ajax({
                type: 'POST',
                url: '/catering/edit/' + cateringId.val() + '/updateActiveState',
                data: { active: this.checked, cateringId: cateringId.val() },
                success: function (data) {

                    // console.log(data.success);

                }

            });
            $('#activeCateringLabel').html('Inactive');
        }

    });
}