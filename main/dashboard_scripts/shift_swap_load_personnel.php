<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if (isset($_POST['id'])) {
    $shift_week_id = $_POST['id'];

    $shift_week_info = "SELECT * FROM compiled_list WHERE id = '$shift_week_id' AND company_id = '$company_id'";
    $shift_week_info_result = mysqli_query($db, $shift_week_info);
    $result = '<option value="">[Select Personnel]</option>';
    if ($shift_week_info_result) {
        $team_array = array();
        while ($row = $shift_week_info_result->fetch_assoc()) {
            $team_array = json_decode($row['team_array']);
            foreach ($team_array as $user) {
                $get_user_name = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$user'";
                $get_user_name_result = mysqli_query($db, $get_user_name);
                if ($get_user_name_result) {
                    while ($row = $get_user_name_result->fetch_assoc()) {
                        $names = $row['first_name'] . ' ' . $row['last_name'];
                        $result .= '<option value="' . $user . '">' . $names . '</option>';
                    }
                }
            }
        }

        echo $result;
        
    } else {
        echo mysqli_error($db);
    }
}



/*foreach ($team_array as $user){
            $get_user_name = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$user'";
            $get_user_name_result = mysqli_query($db, $get_user_name);
            if($get_user_name_result){
                while ($row = $get_user_name_result->fetch_assoc()){
                    $names = $row['first_name'] . ' ' . $row['last_name'];
                    $result .= '<option id="'.$user.'">'.$names.'</option>';
                }
            }
            
        }*/