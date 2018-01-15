<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
if (isset($_POST['id'])) {
    $reject_user = "UPDATE pending_users SET status = 'Rejected' WHERE pu_id = '$id'";
    $reject_user_result = mysqli_query($db, $reject_user);
    if($reject_user_result){
        echo 'success';
    }
}