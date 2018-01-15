<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$select_all_open_chats = "SELECT * FROM chat WHERE company_id = '$company_id' AND (user1 = '$user_id' OR user2 = '$user_id')";
$select_all_open_chats_result = mysqli_query($db, $select_all_open_chats);

if ($select_all_open_chats_result) {

    $result = "";
    while ($row = $select_all_open_chats_result->fetch_assoc()) {

        $chat_id = $row['chat_id'];
        $chat_contact = "";
        $profile_pic = "";
        //$last_message_array = array();
        $user1 = $row['user1'];
        $user2 = $row['user2'];
        $other_user_id;

        
        $message_array = json_decode($row['message_array'], TRUE);
        $last_message_array = end($message_array);
        $last_message = $last_message_array['message'];
        $time_sent = $last_message_array['time'];

        if ($user1 == $user_id) {
            $other_user_id = $user2;
            $get_chat_contact = "SELECT first_name, last_name, profile_pic FROM personnel WHERE personnel_id = '$user2'";
            $get_chat_contact_result = mysqli_query($db, $get_chat_contact);
            while ($row = $get_chat_contact_result->fetch_assoc()) {
                if ($get_chat_contact_result) {
                    $chat_contact = $row['first_name'] . ' ' . $row['last_name'];
                    $profile_pic_path = $row['profile_pic'];
                    if ($profile_pic_path == "") {
                        $profile_pic = "images/profile_pictures/profile_placeholder.jpg";
                    } else {
                        $profile_pic = $profile_pic_path;
                    }
                }
            }
        } elseif ($user2 == $user_id) {
            $other_user_id = $user1;
            $get_chat_contact = "SELECT first_name, last_name, profile_pic FROM personnel WHERE personnel_id = '$user1'";
            $get_chat_contact_result = mysqli_query($db, $get_chat_contact);

            if ($get_chat_contact_result) {
                while ($row = $get_chat_contact_result->fetch_assoc()) {
                    $chat_contact = $row['first_name'] . ' ' . $row['last_name'];
                    $profile_pic_path = $row['profile_pic'];
                    if ($profile_pic_path == "") {
                        $profile_pic = "images/profile_pictures/profile_placeholder.jpg";
                    } else {
                        $profile_pic = $profile_pic_path;
                    }
                }
            }
        }



        $result .= '<div class="col-12 p-0 message_bar" id="' . $other_user_id . '" clickable="" data-toggle="modal" data-target="#largeModal">'
                . '<div class="mail-list">'
                . '<div class="checkbox-wrapper label-clone">'
                . '<div class="profile_pic_hold">'
                . '<span class="pro-pic "><img class="ppic" src="' . $profile_pic . '" alt=""></span>'
                . '</div>'
                . '</div>'
                . '<div class="content">'
                . '<p class="sender-name">' . $chat_contact . '</p>'
                . '<p class="message_text">' . $last_message . '</p>'
                . '</div>'
                . '<div class="details">'
                . '<p class="date">' . $time_sent . '</p>'
                . '<i class="flaticon-star"></i>'
                . '</div>'
                . '</div>'
                . '</div>'
                . '</a>';
    }

    echo $result;
}

