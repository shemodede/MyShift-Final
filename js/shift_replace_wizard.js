(function ($) {

    'use strict';
    var form = $("#example-form");

    var team_array = "";
    var shift_array = "";
    var role = "";
    var shift_week;
    var shift_date;
    var dayAndDate = [];

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex === 0) {
                shift_week = $('#shift_week_select_party_1').val();
                shift_date = $('#shift_date_select_party_1').val();
                if (shift_week === "blank" || shift_date === "blank")
                {
                    return false;
                } else {

                    return true;
                }
            }

            if ($('#shift_party_1_select').val() === "blank" || $('#shift_party_2_select').val() === "blank" || $('#shift_party_1_select').val() === $('#shift_party_2_select').val()) {
                return false;
            } else {
                var party_1_id = $('#shift_party_1_select').val();
                var party_2_id = $('#shift_party_2_select').val();


               
                $('#party_1_user_name').html(getShiftSwapPartyUser(party_1_id));
                $('#party_2_user_name').html(getShiftSwapPartyUser(party_2_id));

                return true;
            }

            function getShiftSwapPartyUser(id) {
                var name;
                $.ajax({
                    url: 'dashboard_scripts/shift_swap_load_user_name.php',
                    type: 'post',
                    data: {id: id},
                    success: function (result) {

                        name = result;
                    }
                });
                //alert("Function " + name);
                return name;
            }

            if (currentIndex === 2) {


            }
        },
        onFinished: function (event, currentIndex) {


            role = $('#role_group').val();
            $('#lstBox2 option').prop("selected", true);
            var personnel = $('#lstBox2').val();



            $('#lstBoxShifts2 option').prop("selected", true);
            var shifts = $('#lstBoxShifts2').val();


            team_array = JSON.stringify(personnel);
            shift_array = JSON.stringify(shifts);
            var dates_array_json = JSON.stringify(dayAndDate);
            console.log(dates_array_json);
            console.log(team_array + " <- JSON array          JS array -> " + personnel);


            $.ajax({
                url: 'dashboard_scripts/table_save_shift_info.php',
                data: {start_date: start_date, end_date: end_date, dates_array: dates_array_json, personnel_id: team_array, shifts_id: shift_array, role: role},
                type: 'post',
                success: function (result) {
                    alert(result);
                    if (result === "success") {
                        window.location.href = "create_shiftlist.php";
                    }
                }
            });
        }
    });
})(jQuery);


