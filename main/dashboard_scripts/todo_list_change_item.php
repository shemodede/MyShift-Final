<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $state = $_POST['state'];
    $get_to_do_list = "";
    if ($state == "completed") {
        $get_to_do_list = "UPDATE todo_list SET completed = 1  WHERE company_id = '$company_id' AND item_id = '$id'";
    } elseif ($state == "not") {
        $get_to_do_list = "UPDATE todo_list SET completed = 0  WHERE company_id = '$company_id' AND item_id = '$id'";
    }
    $get_to_do_list_result = mysqli_query($db, $get_to_do_list);

    if ($get_to_do_list_result) {
        
    } else {
        echo mysqli_error($db);
    }
}