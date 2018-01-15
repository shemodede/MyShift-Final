<?php
session_start();
include 'config.php';

if(isset($_SESSION['user_info'])){
    $company_id = $_SESSION['user_info'][6];
    $get_shift_list_id = "SELECT MAX(id) AS id FROM compiled_list WHERE $company_id = '$company_id'";
    $get_shift_list_id_result = mysqli_query($db, $get_shift_list_id);
    if($get_shift_list_id_result){
        while($row = $get_shift_list_id_result->fetch_assoc()){
            $shift_id = $row['id'];
        
            echo json_encode(array('shift_id' => $shift_id, 'company_id' => $company_id));
        }
    }
    
}  else {
    unset($_SESSION);return;
}

