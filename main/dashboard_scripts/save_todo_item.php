<?php
session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];
$item_title = $_POST['item_title'];

if(isset($_POST['item_title'])){
    $save_item = "INSERT INTO todo_list (item_desc, item_poster, completed, company_id)VALUES('$item_title', '$user_id', '0', '$company_id')";
    $save_item_result = mysqli_query($db, $save_item);
    
    if($save_item_result){
        echo 'success';
    }  else {
        echo mysqli_error($db);
    }
}
