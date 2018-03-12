
var form = $("#example-form");

(function ($) {

    'use strict';


    var team_array = "";
    var shift_array = "";
    var role = "";
    var start_date = "";
    var end_date = "";
    var dayAndDate = [];

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex === 0) {
                start_date = $('#shift_start_date').val();
                end_date = $('#shift_end_date').val();
                if (start_date === "" || end_date === "")
                {
                    return false;
                } else {
                    // console.log("Hey");

                    var weekday = new Array(7);
                    weekday[0] = "Monday";
                    weekday[1] = "Tuesday";
                    weekday[2] = "Wednesday";
                    weekday[3] = "Thursday";
                    weekday[4] = "Friday";
                    weekday[5] = "Saturday";
                    weekday[6] = "Sunday";



                    var start = $("#shift_start_date").datepicker("getDate"),
                            end = $("#shift_end_date").datepicker("getDate"),
                            currentDate = new Date(start),
                            between = [];




                    while (currentDate <= end) {

                        console.log(moment(currentDate).format('DD-MM-YYYY') + " " + weekday[currentDate.getUTCDay()]);
                        dayAndDate.push({"date": moment(currentDate).format('DD-MM-YYYY'), "day": weekday[currentDate.getUTCDay()]});
                        currentDate.setDate(currentDate.getDate() + 1);
                        //console.log(currentDate);
                        if (currentDate === end) {
                            weekday = between;
                        }
                    }
                    return true;
                }
            }

            if (currentIndex === 1) {
                var personnel = $('#lstBox2 option');
                if (currentIndex > newIndex) {
                    return true;
                } else
                if (personnel.length === 0) {
                    return false;
                } else {


                    return true;
                }

            }

            if (currentIndex === 2) {

                var shifts = $('#lstBoxShifts2 option');
                if (currentIndex > newIndex) {
                    return true;
                } else
                if (shifts.length === 0) {
                    return false;
                } else {

                    start_date = $('#shift_start_date').val();
                    end_date = $('#shift_end_date').val();
                }
            }
            if (currentIndex === 3) {
                return true;
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






            $.ajax({
                url: 'dashboard_scripts/table_save_shift_info.php',
                data: {start_date: start_date, end_date: end_date, dates_array: dates_array_json, personnel_id: team_array, shifts_id: shift_array, role: role},
                type: 'post',
                success: function (result) {



                    var returned = JSON.parse(result);


                    if (returned.success) {
                        location.href = "create_shiftlist.php";
                        var firebaseRef = firebase.database().ref();


                        var weeksRef = firebaseRef.child(returned.company_id).child("reports_weeks");


                        weeksRef.child(returned.weeks_array[0].id).child('start').set(returned.weeks_array[0].dates.start);
                        weeksRef.child(returned.weeks_array[0].id).child('end').set(returned.weeks_array[0].dates.end);


                        var datesRef = firebaseRef.child(returned.company_id).child("reports_dates");

                        var days_len = dayAndDate.length;
                        for (var i = 0; i < days_len; i++) {
                            var date = dayAndDate[i].date;
                            var day = dayAndDate[i].day;
                            datesRef.child(returned.weeks_array[0].id).child(date).set(day);
                            //datesRef.child(returned.weeks_array[0].id).child('day').push();
                            //console.log(dayAndDate[i].date);
                        }

                        var personsRef = firebaseRef.child(returned.company_id).child("shift_list_info");
                        var array_persons = returned.persons;


                        console.log(array_persons);


                        personsRef.child(returned.weeks_array[0].id).child('names').set(array_persons);



                        var shiftsRef = firebaseRef.child(returned.company_id).child("shift_list_info");
                        var array_shifts = returned.shifts;


                        console.log(array_persons);


                        shiftsRef.child(returned.weeks_array[0].id).child('shifts').set(array_shifts);





//                            if (error) {
//                                console.log("Data could not be saved.  " + error);
//
//                            } else {
//                                console.log("Data saved successfully");
//                                //window.location.href = "create_shiftlist.php";
//                            }
//                        });

//                        firebaseRef.child('reports_weeks').push('week').set(returned.weeks_array, function (error) {
//                            if (error) {
//                                console.log("Data could not be saved.  " + error);
//
//                            } else {
//                                console.log("Data saved successfully");
//                                //window.location.href = "create_shiftlist.php";
//                            }
//                        });


                    }
                }
            });
        }
    });
})(jQuery);
