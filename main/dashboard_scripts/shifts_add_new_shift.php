<?php
session_start();

include 'config.php';

if (isset($_POST["shift_name"]) && isset($_POST["shift_role_group"]) && isset($_POST['shift_duration']) && isset($_POST["shift_start"]) && $_POST["shift_start"] != "" && isset($_POST["shift_end"]) && $_POST["shift_end"] != "") {
    $shift_name = filter_input(INPUT_POST, 'shift_name');
    $shift_start = filter_input(INPUT_POST, 'shift_start');
    $shift_end = filter_input(INPUT_POST, 'shift_end');
    $duration = filter_input(INPUT_POST, 'shift_duration');   
    $company_id = $_SESSION['user_info'][6];
    $role = filter_input(INPUT_POST, 'shift_role_group');

    $query = "INSERT INTO shifts(shift_name, shift_start, shift_end, shift_duration, company_id, role_group)VALUES('$shift_name', '$shift_start', '$shift_end','$duration', '$company_id', '$role')";

    $result = mysqli_query($db, $query);

    if (!$result) {
        echo 'An error occured. ' . mysqli_error($db);
    } elseif ($result) {
        echo 'success';
    }
}
 else {
    echo 'Please fill all fields.';    
}