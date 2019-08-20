$(function() {
    $('.delete-btn').click(function() {
        var id = $(this).attr('target');

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: "POST",
            url: "/delete",
            data: {
                id: id
            },
            success: function(data) {
                location.reload();
            }
        });
    });
});