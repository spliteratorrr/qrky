$(function() {
    $('input[name="edit-dep"]').daterangepicker({
        opens: 'center',
        drops: 'up',
        autoUpdateInput: false,
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: false,
        buttonClasses: 'uk-button uk-button-default uk-button-small',
        applyButtonClasses: 'uk-button-secondary',
        locale: {
            format: 'MMM DD, YYYY; hh:mm A'
        }
    });
    
    $('input[name="edit-dep"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY; hh:mm A'));
    });
  
    $('input[name="edit-dep"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('.cancel-btn').click(function() {
        var id = $(this).attr('target');
        var form = $('#form-' + id);
        form.trigger("reset");
    });

    $('.print-btn').click(function() {
        var id = $(this).attr('target');

        window.location = '/print?' + $.param({
            id: id
        });
    });

    $('.save-btn').click(function() {
        var id = $(this).attr('target');
        var form = $('#form-' + id);

        var name = form.find('#form-name').val();
        var content = form.find('#form-content').val();
        var contentType = form.find("#form-content-type").prop('selectedIndex');
        var desc = form.find('#form-desc').val();
        var loc = form.find('#form-loc').val();

        var deployDate = form.find('#form-d-date').val();
        
        if (deployDate)
            deployDate = moment(deployDate, 'MMM DD, YYYY; hh:mm A').format('YYYY-MM-DD HH:mm:ss');

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: "POST",
            url: "/update",
            data: {
                id: id,
                name: name,
                content: content,
                contentType: contentType,
                desc: desc,
                loc: loc,
                deployDate: deployDate
            },
            success: function(data) {
                location.reload();
            }
        });
    });
});