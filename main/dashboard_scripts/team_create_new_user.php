<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$array_vars = array();
if (isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['un']) && isset($_POST['cn']) && isset($_POST['em']) && isset($_POST['role']) && isset($_POST['priv'])) {
    
   
        $first_name = filter_input(INPUT_POST, 'fn');
    
        $last_name = filter_input(INPUT_POST, 'ln');
    
        $username = filter_input(INPUT_POST, 'un');
    
        $cell_number = filter_input(INPUT_POST, 'cn');
    
        $email = filter_input(INPUT_POST, 'em');
    
        $role = filter_input(INPUT_POST, 'role');
    
        $admin = filter_input(INPUT_POST, 'priv');
   


    
    $add_new_user_info = "INSERT INTO personnel(first_name, last_name, username, cell_number, email, role, admin, company_id)VALUES('$first_name', '$last_name', '$username', '$cell_number', '$email', '$role', '$admin', '$company_id')";
    $add_new_user_info_result = mysqli_query($db, $add_new_user_info);
    //echo $update_user_info;
    if($add_new_user_info_result){
        echo 'success';
    } else {
        echo mysqli_error($db);
    }
}


