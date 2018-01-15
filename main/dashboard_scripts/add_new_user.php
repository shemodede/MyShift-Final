<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

if (isset($_POST['id'])){
    $password = "";
    $user_id = $_POST['id'];
    $get_user_info = "SELECT * FROM pending_users WHERE pu_id = '$user_id'";
    $get_user_info_res = mysqli_query($db, $get_user_info);
    
    if($get_user_info_res){
        while ($row = $get_user_info_res->fetch_assoc()){
            $password = $row['password'];
        }
    }
    
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $username = $_POST['username'];
    $cell = $_POST['cell'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $acc_type = $_POST['acc_type'];
    
    $save_user = "INSERT INTO personnel(first_name, last_name, username, password, cell_number, email, role, company_id)VALUES('$first_name', '$last_name', '$username', '$password', '$cell', '$email', '$role', '$company_id')";
    $save_user_result = mysqli_query($db, $save_user);
    
    if($save_user_result){
        $pu_id = $_POST['id'];
        $update_pending = "UPDATE pending_users SET status = 'Accepted' WHERE pu_id = '$pu_id'";
        $update_pending_res = mysqli_query($db, $update_pending);
        if($update_pending_res){
            echo 'success';
        }
    } else {
        echo mysqli_error($db);
    }
    
}