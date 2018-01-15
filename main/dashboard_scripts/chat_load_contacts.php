<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$get_users = "SELECT personnel_id, first_name, last_name, role, profile_pic FROM personnel WHERE company_id = '$company_id' AND personnel_id != '$user_id'";
$get_users_result = mysqli_query($db, $get_users);

if ($get_users_result) {

    $result = "";
    while ($row = $get_users_result->fetch_assoc()) {
        $personnel_id = $row['personnel_id'];
        $name = $row['first_name'] . ' ' . $row['last_name'];
        $profile_pic_path = "";
        if ($row['profile_pic'] == "") {
            $profile_pic_path = 'images/profile_pictures/profile_placeholder.jpg';
        } else {
            $profile_pic_path = $row['profile_pic'];
        }

        $role = $row['role'];


        $result .= '<li class="chat-persons">'
                . '<a href="#" id="'.$personnel_id.'"  class="user_link" data-toggle="modal" data-target="#largeModal">'
                . '<span class="pro-pic"><img  src="' . $profile_pic_path . '" alt=""></span>'
                . '<div class="user">'
                . '<p class = "u-name">' . $name . '</p>'
                . '<p class="u-designation">' . $role . '</p>'
                . '</div>'
                . '</a>'
                . '</li>';
    }
    echo $result;
}



/*
 *                                          <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face6.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">Gabriel</p>
                                                        <p class="u-designation">UI/UX Designer</p>
                                                    </div>
                                                </a>
                                            </li>
 */