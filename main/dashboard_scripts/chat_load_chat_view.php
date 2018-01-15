<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if (isset($_POST['id'])) {
    $contact_id = $_POST['id'];

    $select_user_info = "SELECT personnel_id, first_name, last_name, role, profile_pic FROM personnel WHERE company_id = '$company_id' AND personnel_id = '$contact_id'";
    $select_user_info_result = mysqli_query($db, $select_user_info);

    if ($select_user_info_result) {
        $result = "";
        while ($row = $select_user_info_result->fetch_assoc()) {
            $personnel_id = $row['personnel_id'];
            $name = $row['first_name'] . ' ' . $row['last_name'];
            $profile_pic_path = "";
            if ($row['profile_pic'] == "") {
                $profile_pic_path = 'images/profile_pictures/profile_placeholder.jpg';
            } else {
                $profile_pic_path = $row['profile_pic'];
            }

            $role = $row['role'];

            $result .= '<div class="checkbox-wrapper label-clone">
                                                    <div class="profile_pic_hold">
                                                        <span class="pro-pic "><img class="ppic" src="'.$profile_pic_path.'" alt=""></span>
                                                    </div>
                                                </div>
                                                <div class="contact_name">
                                                    <p class="sender-name">'.$name.'</p>
                                                  </div>';
        }
        echo $result;
    }
}



/*
 *                                              <div class="checkbox-wrapper label-clone">
                                                    <div class="profile_pic_hold">
                                                        <span class="pro-pic "><img class="ppic" src="'.$.'" alt=""></span>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p class="sender-name">David</p>
 *                                              </div>
 */