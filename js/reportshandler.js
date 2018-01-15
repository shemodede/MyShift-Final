$(document).ready(function () {

    $('#view_hours').click(function () {

        var wage = $('#pay').val();

        var shift_hours;
        var shift_wage = 20;
        var shift_total_per_user;
        var shift_total_cost;

        var users_array = [];

        $('table#table2 tr').each(function () {

            var tableData = $(this).find('td');
            //alert($(this).size());
            var num_rows = 0;
            if (tableData.length > 0) {
                tableData.each(function () {
                    //var row_array = [];
                    if ($(this).hasClass('value_cell')) {
                        if ($(this).hasClass('person_name')) {
                            num_rows++;
                        }
                    }
                });

                //alert(num_rows);
            }

            if (tableData.length > 0) {
                var full_hours_array = [];
                var row_array = [];
                var k = 0;
                tableData.each(function () {
                    var table_cell = $(this);

                    if (table_cell.hasClass('value_cell')) {
                        //for (var i = 0; i < num_rows; i++) {

                        if (table_cell.hasClass('person_name')) {
                            k = 1;
                            row_array = [];
                            //alert(table_cell.attr('id'));
                            row_array.push(table_cell.attr('id'));

                        }
                        if (table_cell.hasClass('shift_values'))
                        {
                            if (table_cell.children().length > 0) {
                                var shift_id = table_cell.children().attr('id')[0];

                                //alert(shift_id);
                                row_array.push(shift_id);
                            } else {
                                row_array.push("");
                            }
                        }
                        if (k === 8) {
                            full_hours_array.push(row_array);
                        }
                        k++;

                    }
                });
                console.log(full_hours_array);

                var array = JSON.stringify(full_hours_array);



                $.ajax({
                    url: 'dashboard_scripts/load_calculator_names.php',
                    type: 'post',
                    data: {full_hours_array: array, wage: wage},
                    success: function (returned) {
                        var result = JSON.parse(returned);

                        $('.totals').text('Total Hours: ' + result.total_hours + ' hours                                     Total Expense: ' + result.total_expense);
                        $('#hours_table').html(result.fulltext);

                    }
                });

            }


        });
    });

    


    $("#show_emails_div").hide();
    $('#show_emails').click(function () {

        $.ajax({
            url: 'get_emails.php',
            type: 'post',
            success: function (emails) {
                $("#show_emails_div").show();
                $("#emails_table").html(emails);
            }
        });
    });
    //var table_code;
    $('#display_table').click(function () {

        var tableArray = [];
        $('table#table2 tr').each(function () {
            var arrayOfThisRow = [];
            var tableData = $(this).find('td');
            if (tableData.length > 0) {
                tableData.each(function () {
                    arrayOfThisRow.push($(this).text());
                });
                tableArray.push(arrayOfThisRow);
            }



        });



        console.log(tableArray);

        var array = JSON.stringify(tableArray);

        $.ajax({
            url: 'dashboard_scripts/save_completed_table_array.php',
            type: 'post',
            data: {tablearray: array},
            success: function (returned) {

                $('#view-table').html(returned);
            }
        });
    });

    $('#email_list').click(function () {

        var tableArray = [];
        $('table#table2 tr').each(function () {
            var arrayOfThisRow = [];
            var tableData = $(this).find('td');
            if (tableData.length > 0) {
                tableData.each(function () {
                    arrayOfThisRow.push($(this).text());
                });
                tableArray.push(arrayOfThisRow);
            }
        });



        console.log(tableArray);

        var array = JSON.stringify(tableArray);

        $.ajax({
            url: 'dashboard_scripts/save_completed_table_array.php',
            type: 'post',
            data: {table_html: array},
            success: function (returned) {
                $('#view-table').html(returned);
            }
        });
    });




    $('#fill_off').click(function () {
        var MyRows = $('table#table2').find('tbody').find('tr');

        for (var i = 0; i < MyRows.length; i++) {
            for (var j = 1; j < 8; j++) {
                var MyIndexValue = $(MyRows[i]).find('td:eq(' + j + ')').html();
                if (MyIndexValue === '') {
                    var off_day = '<div style="border-style: solid; cursor: move;" id="off_click" class="redips-drag shift-block">OFF</div>';
                    $(MyRows[i]).find('td:eq(' + j + ')').html(off_day);
                }
            }
        }
    });

    $('#unfill_off').click(function () {
        var MyRows = $('table#table2').find('tbody').find('tr');
        for (var i = 0; i < MyRows.length; i++) {
            for (var j = 1; j < 8; j++) {
                var MyIndexValue = $(MyRows[i]).find('td:eq(' + j + ')').html();
                if (MyIndexValue === '<div style="border-style: solid; cursor: move;" id="off_click" class="redips-drag shift-block">OFF</div>') {
                    var off_day = '';
                    $(MyRows[i]).find('td:eq(' + j + ')').html(off_day);
                }
            }
        }
    });
}
);

