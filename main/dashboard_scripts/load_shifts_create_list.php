<?php
session_start();
include 'config.php';
if (isset($_SESSION['user_info'][6]) && isset($_POST['role'])) {

    $company_id = $_SESSION['user_info'][6];
    $role = $_POST['role'];

    $select_shifts = "SELECT * FROM shifts WHERE company_id = '$company_id' AND role_group = '$role'";
    $select_shifts_result = mysqli_query($db, $select_shifts);

    if ($select_shifts_result) {
        while ($row = $select_shifts_result->fetch_assoc()) {
            $shift_id = $row['shift_id'];
            $shift_name = $row['shift_name'];
            //$shift_start = $row['shift_start'];
            //$shift_end = $row['shift_end'];
            //$shift_duration = $row['duration'];
            //$role_group = $row['role_group'];

            echo '<option value="' . $shift_id . '">' . $shift_name . '</option>';
        }
    }
}