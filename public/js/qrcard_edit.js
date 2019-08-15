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
});