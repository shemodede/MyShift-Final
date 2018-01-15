<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];


$selected_personnel_id = array();
$selected_hours_array = array();
$shift_table;

if (isset($_POST['shift_id'])) {
    $shift_id = $_POST['shift_id'];
    $get_shift_info = "SELECT * FROM compiled_list WHERE id = '$shift_id'";
    $get_shift_info_result = mysqli_query($db, $get_shift_info);

    if ($get_shift_info_result) {
        while ($row = $get_shift_info_result->fetch_assoc()) {
            $shift_table = $row['table_html'];
            $date_start = $row['start_date'];
            $date_end = $row['end_date'];
            $selected_personnel_id = json_decode($row['team_array']);
            $selected_shifts_id = json_decode($row['shifts_array']);
            $selected_role = $row['roles_positions'];
        }

        echo $shift_table;
    } else {
        
    }


   
}