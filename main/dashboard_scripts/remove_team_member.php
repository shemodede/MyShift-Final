<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

if(isset($_POST['id'])){
    $id  = $_POST['id'];
    
    $delete_user = "DELETE FROM personnel WHERE personnel_id = '$id' AND company_id = '$company_id'";
    $delete_user_result = mysqli_query($db, $delete_user);
    
    if($delete_user_result){
        echo 'success';
    }
 else {
        echo mysqli_error($db);
    }
}