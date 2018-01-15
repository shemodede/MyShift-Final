<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$clear_ppic = "UPDATE personnel SET profile_pic = '' WHERE company_id = '$company_id' AND personnel_id = '$user_id'";
$clear_ppic_result = mysqli_query($db, $clear_ppic);

if($clear_ppic_result){
    echo "success";
}