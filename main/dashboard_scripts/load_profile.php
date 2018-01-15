<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$get_user_info = "SELECT * FROM personnel WHERE company_id = '$company_id' AND personnel_id = '$user_id'";
$get_user_info_result = mysqli_query($db, $get_user_info);

if ($get_user_info_result) {
    while ($row = $get_user_info_result->fetch_assoc()) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $username = $row['username'];
        $cell = $row['cell_number'];
        $email = $row['email'];
        $role = $row['role'];
        $bio = $row['bio'];
        $profile_pic_path = $row['profile_pic'];
        
        

        echo json_encode(array('fn' => $first_name, 'ln' => $last_name, 'un' => $username, 'cell' => $cell, 'em' => $email, 'role'=> $role, 'bio' => $bio, 'pic' => $profile_pic_path));
    }
} else {
    echo json_encode(array('error', mysqli_error($db)));
}