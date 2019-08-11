$(function() {
    $('input[name="create-dep"]').daterangepicker({
        opens: 'center',
        drops: 'up',
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
    });

    $('input[name="create-dep"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY; hh:mm A'));
        $(this).val(picker.endDate.format('MMM DD, YYYY; hh:mm A'));
    });
  
    $('input[name="create-dep"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $("#form-create").submit(function(e) {

        e.preventDefault();
        
        var form = $(this);

        var name = form.find('#form-name').val();
        var content = form.find('#form-content').val();
        var contentType = form.find("#form-content-type").prop('selectedIndex');
        var desc = form.find('#form-desc').val();
        var loc = form.find('#form-loc').val();

        var deployDate = form.find('#form-d-date').val();
        deployDate = moment(deployDate, 'MMM DD, YYYY; hh:mm A').format('YYYY-MM-DD HH:mm:ss');

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: "POST",
            url: "/create",
            data: {
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

    $('.cancel-create-btn').click(function() {
        var form = $('#form-create');
        form.find("input[type='text']").val('');
        form.find("textarea").val('');
        form.find('input[name="create-dep"]').val('');
    });
});