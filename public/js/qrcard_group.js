$(function() {
    $('.group-btn').click(function() {
        var id = $(this).attr('target');
        var gid = $(this)
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: "POST",
            url: "/assign",
            data: {
                id: id,
                gid: gid
            },
            success: function(data) {
                location.reload();
            }
        });
    });
});