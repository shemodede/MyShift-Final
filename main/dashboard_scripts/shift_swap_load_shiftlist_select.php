<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$result;
$shift_week_info = "SELECT id, start_date, end_date FROM compiled_list WHERE company_id = '$company_id'";
$shift_week_info_result = mysqli_query($db, $shift_week_info);
$result = "<option value='blank'>[Select List]</option>";
if ($shift_week_info_result) {
    
    while ($row = $shift_week_info_result->fetch_assoc()) {

        $id = $row['id'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];


        $result .= '<option value="' . $id . '">' . $start_date . '  --TO--  ' . $end_date . '</option>';
    }
}else{
    echo mysqli_error($db);
}

echo $result;


