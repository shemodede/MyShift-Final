<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if ($_FILES['file']['name'] != '') {
    $extension = end(explode(".", $_FILES['file']['name']));
    $allowed_type = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "GIF", "gif");

    if(in_array($extension, $allowed_type)){
        $new_name = rand(100, 100000000) . 'user'.$user_id.".".$extension;
        $path = "images/profile_pictures/" .  $new_name;
        $url = "\images\profile_pictures\\" ;
        if(move_uploaded_file($_FILES['file']['tmp_name'], realpath(dirname(getcwd())) . $url . $new_name)){
            $save_picture_path = "UPDATE personnel SET profile_pic = '$path' WHERE personnel_id = '$user_id'";
            $save_picture_path_result = mysqli_query($db, $save_picture_path);
            if($save_picture_path_result){
                $direct = realpath(dirname(getcwd()));
                echo $path;
            }  else {
                echo mysqli_error($db);
            }
        }
    }else{
        echo "Format not allowed";
    }
} else {
    echo 'Profile pic is unset';
}
