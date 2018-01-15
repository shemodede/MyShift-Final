<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $cn = $_POST['cn'];
    $em = $_POST['em'];
    $rl = $_POST['rl'];
    $pr = $_POST['pr'];

    $copy_user_info_to_personnel = "INSERT INTO personnel (first_name, last_name, username, password, cell_number, email, role, admin, company_id)VALUES('$fn', '$ln', '$un', '$pw', '$cn', '$em', '$rl', '$pr', '$company_id')";
    $copy_user_info_to_personnel_result = mysqli_query($db, $copy_user_info_to_personnel);


    if ($copy_user_info_to_personnel_result) {
        $delete_request = "DELETE FROM pending_users WHERE company_id = '$company_id' AND pu_id = '$id'";
        $delete_request_result = mysqli_query($db, $delete_request);
        if ($delete_request_result) {
            echo 'success';
        } else {
            echo mysqli_error($query);
        }
    } elseif (!$copy_user_info_to_personnel_result) {
        echo mysqli_error($db);
    }
}