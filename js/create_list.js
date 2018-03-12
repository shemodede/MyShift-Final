$(document).ready(function () {
    var company_id;
    var shift_week_id;





    $.ajax({
        url: 'dashboard_scripts/get_company_id.php',
        type: 'post',
        success: function (result) {
            var returned = JSON.parse(result);
            company_id = returned.company_id;
            shift_week_id = returned.shift_id;
        }
    });

    $('#preview_list').click(function () {

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
            url: 'dashboard_scripts/preview_table.php',
            type: 'post',
            data: {tablearray: array},
            success: function (returned) {

                $('#view-caser').html(returned);
            }
        });
    });
    $('#preview_hours').click(function () {
        var full_hours_array = [];
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
                                var shift_id = table_cell.children().attr('id');
                                //alert(shift_id);
                                row_array.push(shift_id);
                            } else {
                                row_array.push("OFF");
                            }
                        }
                        if (k === 8) {
                            full_hours_array.push(row_array);
                        }
                        k++;
                    }
                });

            }
        });

        console.log(full_hours_array);
        var array = JSON.stringify(full_hours_array);
        $.ajax({
            url: 'dashboard_scripts/preview_hours.php',
            type: 'post',
            data: {full_hours_array: array, wage: 20},
            success: function (returned) {
                console.log(returned);
                var result = JSON.parse(returned);
                var hours_table = result.fulltext;
                $('#view-caser').html(hours_table);
            }
        });
    });
    $('#preview_expense').click(function () {
        $('#view-caser').html('<input id="pay_rate" type="number" required="" name="pay_rate" step=".01"  class="rate"> /h  <hr><button class="rate" type="button" id="calculate_rate">Calculate</button><br><br><div id="grand_total"></div><br><br><div id="expense_holder"></div>');
        var full_hours_array = [];
        $('table#table2 tr').each(function () {
            var tableData = $(this).find('td');
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
            }

            if (tableData.length > 0) {

                var row_array = [];
                var k = 0;
                tableData.each(function () {
                    var table_cell = $(this);
                    if (table_cell.hasClass('value_cell')) {
                        //for (var i = 0; i < num_rows; i++) {

                        if (table_cell.hasClass('person_name')) {
                            k = 1;
                            row_array = [];
                            row_array.push(table_cell.attr('id'));
                        }
                        if (table_cell.hasClass('shift_values'))
                        {
                            if (table_cell.children().length > 0) {
                                var shift_id = table_cell.children().attr('id');
                                //alert(shift_id);
                                row_array.push(shift_id);
                            } else {
                                row_array.push("OFF");
                            }
                        }
                        if (k === 8) {
                            full_hours_array.push(row_array);
                        }
                        k++;
                    }
                });


            }
        });

        var array = JSON.stringify(full_hours_array);
        $(document).on('click', '#calculate_rate', function () {
            var rate = $('#pay_rate').val();
            $.ajax({
                url: 'dashboard_scripts/preview_shift_expense.php',
                type: 'post',
                data: {full_hours_array: array, wage: rate},
                success: function (returned) {

                    var result = JSON.parse(returned);
                    var wages_table = result.fulltext;
                    $('#expense_holder').html(wages_table);
                    $('#grand_total').html(result.total_expense);
                }
            });
        });
    });







    $('#save_n_notify').click(function () {

        var full_hours_array_h = [];
        var tableArray = [];


//        var firebaseRef = firebase.database().ref();
//        var oneRef = firebaseRef.child("/" + company_id + "/reports_dates/" + shift_week_id);
//
//        oneRef.on('value', gotData, errData);
//
//        var key = [];


        function errData(err) {
            console.log("Error!");
            console.log(err);
        }


        function Create2DArray(rows) {
            var arr = [];

            for (var i = 0; i < rows; i++) {
                arr[i] = [];
            }

            return arr;
        }
        var combined = [];

        function createUserShiftsArray(user_id, user_shifts_array) {

            var date_shift_array = [[]];
            date_shift_array.push([user_id, user_shifts_array]);



            combined.push(date_shift_array);
        }




//        combined_array[0][0] = "Hello";
//        combined_array[0][1] = "World";
//        combined_array.push(["World", "hello"]);
////        combined_array[1][1] = "World";

//        console.log(combined_array);
//        return;

        //var keys = [];



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

        var shift_list_display = [];


//        function gotData(data) {
//            console.log(data.val());
//            var dates = data.val();
//            key = Object.keys(dates);
//            console.log(key);
//            console.log("hi");
//
//
//        }
//


            $('table#table2 tr').each(function () {
            var combined_array = [[]];
            var shifts_array = [];
//            combined_array = Create2DArray(1);
//             for (var i = 0; i < keys.length; i++)
//            {
//                combined_array[i][0] = keys[i];
//            }
//                console.log(combined_array);

                var user_id = "";
                var shifts_array = [[]];
                var tableData = $(this).find('td');
                var shift_count = 0;
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

                }
                var values;
                if (tableData.length > 0) {

                    var row_array = [];
                    var k = 0;
                    tableData.each(function (index) {
                        var table_cell = $(this);
                        if (table_cell.hasClass('value_cell')) {

                            if (table_cell.hasClass('person_name')) {
                                k = 1;
                                row_array = [];
                                //console.log(table_cell.attr('id'));
                                values = table_cell.attr('id');
                                user_id = values;
                                //shifts_array.push(values);
                                row_array.push(table_cell.attr('id'));
                            }
                            if (table_cell.hasClass('shift_values'))
                            
                            {

                                if (table_cell.children().length > 0) {
                                    var shift_id = table_cell.children().attr('id')[0];
                                    //console.log(key[index - 1]);
                                    //shifts_array.push([key[index - 1], shift_id]);
                                    row_array.push(shift_id);
                                    shifts_array.push(values);
                                    var count = tableData.length - 2;
                                    
                                    
//                                    if(user_id !== ""){
//                                        var addShiftRef = firebaseRef.child("/" + company_id  + "/shift_list_display/" + shift_week_id + "/" + user_id + "/");
//                                        addShiftRef.child(key[index - 1]).set(table_cell.children().text() , function (error) {
//                                            if (error) {
//                                                console.log("Data could not be saved." + error);
//                                            } else {
//                                                console.log("Data saved successfully.");
//                                            }
//                                        });
//                                    }
//                                console.log(count);

                                } else {
                                    values += " OFF ";
                                    row_array.push("OFF");
                                    var count = tableData.length - 2;
//                                console.log(count);
                                   // shifts_array.push([key[index - 1], "OFF"]);
                                    if(user_id !== ""){
//                                        var addShiftRef = firebaseRef.child("/" + company_id  + "/shift_list_display/" + shift_week_id + "/" + user_id + "/" );
//                                        addShiftRef.child(key[index - 1]).set("OFF" , function (error) {
//                                            if (error) {
//                                                console.log("Data could not be saved." + error);
//                                            } else {
//                                                console.log("Data saved successfully.");
//                                            }
//                                        });
                                    }
                                }
                                shift_count++;
                            }
                            if (k === tableData.length) {
                                full_hours_array_h.push(row_array);
                            }
                            k++;
                        }
                    });

                    //console.log(values);
                    if (tableData !== 0) {
                        //console.log[keys];
                        //combined_array.push([keys[tableData.length - 1], shifts_array[tableData.length]]);
                    }
                    //console.log(full_hours_array_h);
                    //console.log(shifts_array);
                    if ($(this).hasClass('shifts_table_rows')) {
                        //console.log(user_id);
                        //console.log(shifts_array);
                        createUserShiftsArray(user_id, shifts_array);
                    } 

                }
            });

            var array = JSON.stringify(full_hours_array_h);
            console.log(full_hours_array_h);
            var tableDataJson = JSON.stringify(tableArray);
            
                    $.ajax({
            url: 'dashboard_scripts/save_shift_list.php',
            type: 'post',
            data: {full_hours_array: array, tablearray: tableDataJson},
            success: function (returned) {

            }
        });
        console.log(combined);
//        var firebaseRef = firebase.database().ref();
//        var weeksRef = firebaseRef.child(company_id + "/shift_list_display/" + shift_week_id);
//        weeksRef.push().set(JSON.stringify(combined), function (error) {
//            if (error) {
//                alert("Data could not be saved." + error);
//            } else {
//                alert("Data saved successfully.");
//            }
//        });


        



//        oneRef.once('value', function (snap) {
//            snap.forEach(function (item) {
//                var itemVal = item.val();
//                console.log(itemVal);
//                keys.push(itemVal);
//            });
//            for (i = 0; i < keys.length; i++) {
//                counts.push(keys[i].wordcount);
//            }
//        });
//        console.log(keys);


//        oneRef.on("value", function (snapshot) {
//            console.log(snapshot.toArray());
//        });


//        $.ajax({
//            url: 'dashboard_scripts/save_shift_list.php',
//            type: 'post',
//            data: {full_hours_array: array, tablearray: tableDataJson},
//            success: function (returned) {
//
//            }
//        });
//        console.log(combined);
//        var firebaseRef = firebase.database().ref();
//        var weeksRef = firebaseRef.child(company_id + "/shift_list_display/" + shift_week_id);
//        weeksRef.push().set(JSON.stringify(combined), function (error) {
//            if (error) {
//                alert("Data could not be saved." + error);
//            } else {
//                alert("Data saved successfully.");
//            }
//        });
        


    });
});