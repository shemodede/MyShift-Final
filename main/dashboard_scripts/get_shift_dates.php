<?php
session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];

$result_array = array();
$result = "";
$result .= "<option>[Select List]</option>";

$get_dates = "SELECT id, start_date, end_date FROM compiled_list WHERE completed = 1 AND company_id = '$company_id'";
$get_dates_result = mysqli_query($db, $get_dates);

if ($get_dates_result) {

    while ($row = $get_dates_result->fetch_assoc()) {
        $id = $row['id'];

        $result .= '<option value="' . $row['id'] . '">' . $row['start_date'] . ' to ' . $row['end_date'] . '</option>';
        array_push($result_array, array($row['id'] => array('start' => $row['start_date'], 'end' => $row['end_date'])));
        
    }
    //echo $result;
    echo json_encode(array('select_text' => $result, 'json_weeks' => $result_array));
} else {
    echo mysqli_error($db);
}

