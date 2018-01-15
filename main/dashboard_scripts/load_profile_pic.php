<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];


$get_profile_pic = "SELECT first_name, last_name, profile_pic FROM personnel WHERE company_id = '$company_id' AND personnel_id = '$user_id'";
$get_profile_pic_result = mysqli_query($db, $get_profile_pic);
if($get_profile_pic_result){
    while ($row = $get_profile_pic_result->fetch_assoc()){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $file_path = $row['profile_pic'];
        
        echo json_encode(array('fn'=>$first_name, 'ln'=>$last_name, 'file_path'=>$file_path));
    }
} else {
    echo mysqli_error($db);
}