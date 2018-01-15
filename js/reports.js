$(document).ready(function () {
    $('#hours_filter').hide();
    $.ajax({
        url: 'dashboard_scripts/get_shift_dates.php',
        type: 'post',
        success: function (result) {
            
           
            
            var returned = JSON.parse(result);
            $('#select_shifts').html(returned.select_text);
            
            //console.log(returned.json_weeks[0][0].id);return;
            
            var firebaseRef = firebase.database().ref();
            firebaseRef.child("reports_weeks").set(returned.json_weeks[0]);
        }
    });
    $('#select_shifts').change(function () {

        var list_id = $('#select_shifts').val();
        $.ajax({
            url: 'dashboard_scripts/load_reports.php',
            type: 'post',
            data: {shift_id: list_id},
            success: function (result) {
                $('#shift_table').html(result);
            }
        });

        $.ajax({
            url: 'dashboard_scripts/reports_load_hours.php',
            type: 'post',
            data: {shift_id: list_id},
            success: function (returned) {
                var result = JSON.parse(returned);
                if (result[0] === 'success') {
                    $('#shift_hours').html(result[1]);
                    
                    $('#hours_filter').show();
                }
            }
        });

    });
});
        