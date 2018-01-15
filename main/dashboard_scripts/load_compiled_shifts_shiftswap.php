<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$select_compiled_shifts = "SELECT * FROM compiled_list WHERE company_id = '$company_id' AND completed = 1";
$select_compiled_shifts_result = mysqli_query($db, $select_compiled_shifts);
$result = "<option>[SELECT SHIFT]</option>";
if($select_compiled_shifts_result){
    while ($row = $select_compiled_shifts_result->fetch_assoc()){
        $result .= '<option value="'.$row['id'].'">'.$row['start_date'] .' to '.$row['end_date'].'</option>';
    }
    echo $result;
}
