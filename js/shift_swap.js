$(document).ready(function () {
    
    $.ajax({
        url: 'dashboard_scripts/shift_swap_load_shiftlist_select.php',
        type: 'post',
        success: function (result) {

            $('#shift_week_select_party_1').html(result);
            $('#shift_week_select_party_2').html(result);
        }
    });

    $('#shift_week_select_party_1').change(function () {
        var id = $('#shift_week_select_party_1').val();

        $.ajax({
            url: 'dashboard_scripts/shift_swap_load_dates.php',
            type: 'post',
            data: {id: id},
            success: function (result) {

                $('#shift_date_select_party_1').html(result);
            }
        });

        $.ajax({
            url: 'dashboard_scripts/shift_swap_load_personnel.php',
            type: 'post',
            data: {id: id},
            success: function (result) {

                $('#shift_party_1_select').html(result);
                $('#shift_party_2_select').html(result);

            }
        });
    });

    $('#shift_week_select_party_2').change(function () {
        var id = $('#shift_week_select_party_2').val();

        $.ajax({
            url: 'dashboard_scripts/shift_swap_load_dates.php',
            type: 'post',
            data: {id: id},
            success: function (result) {

                $('#shift_date_select_party_2').html(result);
            }
        });

        $.ajax({
            url: 'dashboard_scripts/shift_swap_load_personnel.php',
            type: 'post',
            data: {id: id},
            success: function (result) {

                $('#shift_party_1_select').html(result);
                $('#shift_party_2_select').html(result);

            }
        });
    });

    $('#shift_party_1_select').change(function () {
        if ($('#shift_party_1_select').val() === $('#shift_party_2_select').val()) {
            alert("Conflict");
        }
        if ($('#shift_party_1_select').val() !== "blank") {
            var id = $('#shift_week_select_party_1').val();
            var user = $('#shift_party_1_select').val();
            var date = $('#shift_date_select_party_1').val();
            // alert("id: " + id +"   User: " + user + "    Date: " + date);
            $.ajax({
                url: 'dashboard_scripts/shift_swap_get_current_shift.php',
                type: 'post',
                data: {id: id, user: user, date: date},
                success: function (result) {
                    //alert(result);
                    $('#curr_shift_party_1').html(result);
                }
            });
        }
    });


    $('#shift_party_2_select').change(function () {
         if ($('#shift_party_1_select').val() === $('#shift_party_2_select').val()) {
            alert("Conflict");
        }
        var id = $('#shift_week_select_party_2').val();
        var user = $('#shift_party_2_select').val();
        var date = $('#shift_date_select_party_2').val();
        // alert("id: " + id +"   User: " + user + "    Date: " + date);
        $.ajax({
            url: 'dashboard_scripts/shift_swap_get_current_shift.php',
            type: 'post',
            data: {id: id, user: user, date: date},
            success: function (result) {
                //alert(result);
                $('#curr_shift_party_2').html(result);
            }
        });
    });

    $('#select_dates').change(function () {
        $('#table_selection').show();
        if ($('#select_swap_type').val() === 'replace') {
            var id = $('#shift_week').val();

            $.ajax({
                url: 'dashboard_scripts/shift_swap_load_personnel.php',
                type: 'post',
                data: {id: id},
                success: function (result) {
                    $('#select_swap_personnel').html(result);
                }
            });

            $.ajax({
                url: 'dashboard_scripts/shift_swap_load_shifts.php',
                type: 'post',
                data: {id: id},
                success: function (result) {
                    $('#shift_party_1_select').html(result);
                }
            });
        }
    });

    $(document).on('change', '#select_shift_for_replace', function () {
        var shift_id = $('#select_shift_for_replace').val();
        $.ajax({
            url: 'dashboard_scripts/shift_swap_load_shifts.php',
            type: 'post',
            data: {shift_id: shift_id},
            success: function (result) {
                $('#new_shift').html(result);
            }
        });
    });

    $('#save_shift_swap').click(function () {
        if ($('#select_swap_type').val() === "replace") {
            if ($('#current_shift').html() !== "" && $('#new_shift').html() !== "") {
                var shift_id = $('#shift_week').val();
                var user = $('#select_swap_personnel').val();
                var curr_date = $('#select_dates').val();
                var replacement = $('#select_shift_for_replace').val();

                $.ajax({
                    url: 'dashboard_scripts/shift_swap_save_shift_coords.php',
                    type: 'post',
                    data: {id: shift_id, user: user, date: curr_date, new_shift: replacement},
                    success: function (result) {
                        alert(result);
                    },
                    error: function (r, s, e) {
                        alert(s + ": " + e);
                    }
                });
            } else {
                alert("Event");
            }
        }
    });

    $(document).on('change', '#select_swap_personnel', function () {
        var id = $('#shift_week').val();
        var user = $('#select_swap_personnel').val();
        var curr_date = $('#select_dates').val();
        $.ajax({
            url: 'dashboard_scripts/shift_swap_get_current_shift.php',
            type: 'post',
            data: {id: id, user: user, date: curr_date},
            success: function (result) {

                $('#current_shift').html(result);

            }
        });
    });

    $('#select_swap_type').change(function () {
        var type = $(this);
        if (type.val() === 'replace') {

            var id = $('#shift_week').val();
            $.ajax({
                url: 'dashboard_scripts/shift_swap_load_shifts.php',
                type: 'post',
                data: {id: id},
                success: function () {

                }
            });
            var value = '<tr><td><div class="row">'
                    + 'Select User:'
                    + '</div>'
                    + '</td>'
                    + '<td>'
                    + '<div>'
                    + 'Select Shift'
                    + '</div>'
                    + '</td></tr>'
                    + '<tr>'
                    + '<td>'
                    + '<select id="select_swap_personnel">'
                    + ''
                    + '</select>'
                    + '</td>'
                    + '<td>'
                    + '<select id="select_shift_for_replace"></select>'
                    + '</td>'
                    + '</tr>'
                    + '<tr id="row_user_info_for_shift">'
                    + '<td>'
                    + 'Current Shift'
                    + '</td>'
                    + '<td>'
                    + 'New Shift'
                    + '</td>'
                    + '</tr>'
                    + '<tr>'
                    + '<td id="current_shift">'
                    + ''
                    + '</td>'
                    + '<td id="new_shift">'
                    + ''
                    + '</td>'
                    + '</tr>'
                    ;
            $('#row_select_date').show();

            $('#table_selection').html(value);

        } else if (type.val() === 'swap') {
            $('#row_select_date').hide();
            var value = '<tr><td><div class="row">'
                    + 'Select User 1:'
                    + '</div>'
                    + '</td>'
                    + '<td>'
                    + '<div>'
                    + 'Select User 2'
                    + '</div>'
                    + '</td>'
                    + '<tr>'
                    + '<td>'
                    + '<select class="select_swap_personnel swap_user_1">'
                    + ''
                    + '</select>'
                    + '</td>'
                    + '<td>'
                    + '<select class="select_swap_personnel swap_user_2">'
                    + ''
                    + '</select>'
                    + '</td>'
                    + '</tr>';

            $('#table_selection').html(value);
        }

    });

});