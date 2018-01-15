<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$fn = $_POST['fn'];
$ln = $_POST['ln'];
$un = $_POST['un'];
$cell = $_POST['cell'];
$email = $_POST['em'];
$role = $_POST['role'];


$save_info_update = "UPDATE personnel SET first_name = '$fn', last_name = '$ln', username = '$un', cell_number = '$cell', email = '$email', role = '$role' WHERE company_id = '$company_id' AND personnel_id = '$user_id'";
$save_info_update_result = mysqli_query($db, $save_info_update);

if($save_info_update_result){
    echo 'success';
}else{
    echo mysqli_error($db);
}

