<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];


   
    $get_to_do_list = "SELECT * FROM todo_list WHERE company_id = '$company_id' ";
    $get_to_do_list_result = mysqli_query($db, $get_to_do_list);
    if ($get_to_do_list_result) {
        $result = "";
        $row_count = mysqli_num_rows($get_to_do_list_result);

        if ($row_count == 0) {
            $result .= '<p style="display:centre">There are no tasks to be completed</p>';
        } else {
            while ($row = $get_to_do_list_result->fetch_assoc()) {
                $item_id = $row['item_id'];
                
                $item_desc = $row['item_desc'];
                $item_poster = $row['item_poster'];
                $time_posted = $row['time_posted'];
                $task_deadline = $row['task_deadline'];
                $completed = $row['completed'];
                $status = $row['status'];



                if ($completed == 0) {
                    $result .= '<li class=""><input class="checkbox" id="'.$item_id.'" type="checkbox">' . $item_desc
                            . '<a class="remove deleted_item fa fa-times text-primary" id="'.$item_id.'"></a>'
                            . '<hr>'
                            . '</li>';
                }

                if ($completed == 1) {
                    $result .= '<li class="completed"><input class="checkbox" checked="checked" id="'.$item_id.'" type="checkbox">' . $item_desc
                            . '<a class="remove deleted_item fa fa-times text-primary" id="'.$item_id.'"></a>'
                            . '<hr>'
                            . '</li>';
                }
            }
        }
        echo $result;
    }else{
        echo mysqli_error($db);
    }
