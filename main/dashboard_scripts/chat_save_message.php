<?php
session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if (isset($_POST['id']) && isset($_POST['text'])) {
    $contact_id = $_POST['id'];
    $text = $_POST['text'];
    $date = $_POST['date'];
    $chat_id = "";
    $message_array = array('sender' => $user_id, 'message'=>$text, 'time'=>$date); 
    
    $select_message_info = "SELECT * FROM chat WHERE (user1 = '$user_id' AND user2 = '$contact_id') OR (user2 = '$user_id' AND user1 = '$contact_id')";
    $select_message_info_result = mysqli_query($db, $select_message_info);
    
    if($select_message_info_result){
        $num_rows = mysqli_num_rows($select_message_info_result);
        $saved_array = array();
        if($num_rows > 0){
            while ($row = $select_message_info_result->fetch_assoc()) {
                $chat_id = $row['chat_id'];
                $saved_array = json_decode($row['message_array']);
               
            }
            array_push($saved_array, $message_array);
            
            $final = json_encode($saved_array);
           
            
            $update_chat_table = "UPDATE chat SET message_array = '$final', reciept = '$contact_id', viewed = 0 WHERE chat_id = '$chat_id' AND company_id = '$company_id'";
            $update_chat_table_result = mysqli_query($db, $update_chat_table);
            
            if($update_chat_table_result){
                echo 'success';
            }
            
        }elseif ($num_rows == 0) {
            
            array_push($saved_array, $message_array);
            $final = json_encode($saved_array);
            $insert_into_table = "INSERT INTO chat(user1, user2, message_array, reciept, viewed, company_id)VALUES('$user_id', '$contact_id', '$final', '$contact_id', '0', '$company_id')";
            $insert_into_table_result = mysqli_query($db, $insert_into_table);
            if($insert_into_table_result){
                echo 'success';
            }
        }
        
    }else{
        echo mysqli_error($db);
    }
    
}
