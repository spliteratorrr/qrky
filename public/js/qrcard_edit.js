$(function() {
    $('input[name="edit-dep"]').daterangepicker({
        opens: 'center',
        drops: 'up',
        startDate: moment(),
        endDate: moment(),
        autoApply: true,
        autoUpdateInput: false,
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: false,
        buttonClasses: 'uk-button uk-button-default uk-button-small',
        applyButtonClasses: 'uk-button-secondary',
        locale: {
            format: 'MMM DD, YYYY; hh:mm A'
        }
    }),
    $('.cancel-btn').click(function() {
        var id = $(this).attr('target');
        var form = $('#form-' + id);
        var dateInput = form.find('li').last().find(':input');
        form.trigger("reset");
        dateInput.data('daterangepicker').setStartDate(moment());
    })
});