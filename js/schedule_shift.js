$(document).ready(function () {




    $.ajax({
        url: 'dashboard_scripts/load_roles.php',
        type: 'post',
        success: function (result) {
            var full_result = result;
            $('#role_group').html(full_result);
        }
    });
    $(document).on('click', '#btnRight', function (e) {


        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnAllRight', function (e) {
        var selectedOpts = $('#lstBox1 option');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnLeft', function (e) {
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnAllLeft', function (e) {
        var selectedOpts = $('#lstBox2 option');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnRightShifts', function (e) {
        var selectedOpts = $('#lstBoxShifts1 option:selected');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBoxShifts2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnAllRightShifts', function (e) {
        var selectedOpts = $('#lstBoxShifts1 option');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBoxShifts2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnLeftShifts', function (e) {
        var selectedOpts = $('#lstBoxShifts2 option:selected');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBoxShifts1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $(document).on('click', '#btnAllLeftShifts', function (e) {
        var selectedOpts = $('#lstBoxShifts2 option');
        if (selectedOpts.length === 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBoxShifts1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });




    /*
     * ADD Shift Modal JS 
     *
     */

    var hours = 24;
    var text = "";
    for (var i = 0; i < hours; i++) {
        if (i === 0) {
            var option = '<option>00</option>';
            //$('#start_time_mins').append(option);
            text += option;
        } else {
            var formattedNumber = ("0" + i).slice(-2);
            var option = '<option>' + formattedNumber + '</option>';
            text += option;
        }


    }
    $('#start_time_hours').append(text);





    var mins = 60;
    var text = "";
    for (var i = 0; i < mins; i++) {
        if (i === 0) {
            var option = '<option>00</option>';
            //$('#start_time_mins').append(option);
            text += option;
        } else {
            var formattedNumber = ("0" + i).slice(-2);
            var option = '<option>' + formattedNumber + '</option>';
            text += option;
        }
    }
    $('#start_time_mins').append(text);




    var result = "";
    var text = ["PM", "AM"];

    for (var i = 0; i < 2; i++) {
        var option = '<option>' + text[i] + '</option>';
        result += option;
    }
    $('#start_time_am_pm').append(result);



    var hours = 24;
    var text = "";
    for (var i = 0; i < hours; i++) {
        if (i === 0) {
            var option = '<option>00</option>';
            //$('#start_time_mins').append(option);
            text += option;
        } else {
            var formattedNumber = ("0" + i).slice(-2);

            var option = '<option>' + formattedNumber + '</option>';
            text += option;
        }


    }
    $('#end_time_hours').append(text);



    var mins = 60;
    var text = "";
    for (var i = 0; i < mins; i++) {
        if (i === 0) {
            var option = '<option>00</option>';
            //$('#start_time_mins').append(option);
            text += option;
        } else {
            var formattedNumber = ("0" + i).slice(-2);
            var option = '<option>' + formattedNumber + '</option>';
            text += option;
        }
    }
    $('#end_time_mins').append(text);



    var result = "";
    var text = ["PM", "AM"];

    for (var i = 0; i < 2; i++) {
        var option = '<option>' + text[i] + '</option>';
        result += option;
    }
    $('#end_time_am_pm').append(result);


    /*
     * END
     */


    var role = "";
    $('#role_group').change(function () {
        role = $('#role_group').val();

        $('#lstBox2 option').prop("selected", true);
        var selected_personnel = $('#lstBox2').val();

        var json_sel_persnl = JSON.stringify(selected_personnel);


        $.ajax({
            url: 'dashboard_scripts/load_users_for_list.php',
            type: 'post',
            data: {role: role, selected_persons: json_sel_persnl},
            success: function (result) {
                $('#lstBox1').html(result);
            }
        });

        $.ajax({
            url: 'dashboard_scripts/load_shifts_create_list.php',
            type: 'post',
            data: {role: role},
            success: function (result) {
                $('#lstBoxShifts1').html(result);
            }
        });
    });

    $('#shift_start_date').focus(function () {
        $('#shift_start_date').datepicker({
            showAnim: 'slideDown',
            numberOfMonths: 1,
            dateFormat: 'dd/mm/yy',
            onClose: function (selectedDate) {
                $('#shift_end_date').datepicker("option", "minDate", selectedDate);

            }
        });
    });
    $('#shift_end_date').focus(function () {
        $('#shift_end_date').datepicker({
            showAnim: 'slideDown',
            numberOfMonths: 1,
            dateFormat: 'dd/mm/yy',
            onClose: function (selectedDate) {
                $('#shift_start_date').datepicker("option", "maxDate", selectedDate);
            }
        });
    });






});
