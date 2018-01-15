<?php
session_start();
include 'config.php';

$company_id = $_SESSION['company_info'][0];
if(isset($company_id) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cellnumber']) && isset($_POST['email'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cellnumber = $_POST["cellnumber"];
    $email = $_POST['email'];
    
    $save_info = "INSERT INTO pending_users(first_name, last_name, username, password, cell_number, email, status, company_id)VALUES('$firstname', '$lastname', '$username', '$password', '$cellnumber', '$email', 'Pending', '$company_id')";
    $save_info_result = mysqli_query($db, $save_info);
    
    if($save_info_result){
        echo 'success';
    } else {
        echo mysqli_error($db);
    }
    
} else {
    echo 'unset vars';    
}
