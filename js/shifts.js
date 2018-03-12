$(document).ready(function () {
    $.ajax({
        url: 'dashboard_scripts/load_shifts_view.php',
        type: 'post',
        success: function (result) {
            $('#shifts_table').html(result);
        }
    });


    $.ajax({
        url: 'dashboard_scripts/load_roles.php',
        type: 'post',
        success: function (result) {
            $('#roles_select').html(result);
            $('#shift_role_group').html(result);
        }
    });

    $('select[name="filter_roles"]').change(function () {

        $.ajax({
            url: 'dashboard_scripts/shifts_load_filtered.php',
            type: 'post',
            success: function (result) {
                $('#shifts_table').html(result);
            }
        });

        var filter = $(this).val();
        $.ajax({
            url: 'dashboard_scripts/shifts_load_filtered.php',
            type: 'post',
            data: {filter: filter},
            success: function (result) {
                $('#shifts_table').html(result);
            }
        });

    });

    $('#save_shift_add').click(function () {

        var shift_name = $('#shift_name').val();
        var shift_start = $('#shift_start').val();
        var shift_end = $('#shift_end').val();
        var shift_duration = $('#shift_duration').val();
        var shift_role_group = $('#shift_role_group').val();

        if (shift_name && shift_start && shift_end && shift_duration && shift_role_group !== "" && shift_role_group !== 0) {
           
            $.ajax({
                url: 'dashboard_scripts/shifts_add_new_shift.php',
                type: 'post',
                data: {shift_name: shift_name, shift_start: shift_start, shift_end: shift_end, shift_duration: shift_duration, shift_role_group: shift_role_group},
                success: function (result) {
                    if (result !== "success") {
                        alert("Please fill the form in as required.");
                    } else if (result === "success") {
                        $.ajax({
                            url: 'dashboard_scripts/load_shifts_view.php',
                            type: 'post',
                            success: function (result) {
                                $('#shifts_table').html(result);
                            }
                        });
                        $('#largeModal').modal('hide');
                    }
                }
            });
        } else {
            alert("Empty fields");
        }


    });

});