<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if (isset($_POST['id'])) {
    $contact_id = $_POST['id'];


    $select_message_info = "SELECT * FROM chat WHERE company_id = '$company_id' AND (user1 = '$user_id' AND user2 = '$contact_id') OR (user1 = '$contact_id' AND user2 = '$user_id')";
    $select_message_info_result = mysqli_query($db, $select_message_info);

    if ($select_message_info_result) {

        $chat_id;
        $message_array = array();
        $result = "";
        while ($row = $select_message_info_result->fetch_assoc()) {
            $chat_id = $row['chat_id'];
            $message_array = json_decode($row['message_array'], TRUE);
        }
        foreach ($message_array as $value) {
            if ($value['sender'] == $user_id) {
                $result .= '<div class="i_sent"><p>' . $value['message'] . '</p></div>';
            } elseif ($value['sender'] == $contact_id) {
                $result .= '<div class="they_sent"><p>' . $value['message'] . '</p></div>';
            }
        }
        echo $result;
    }else{
        echo mysqli_error($db);
    }
}

