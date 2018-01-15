<?php

session_start();
include 'config.php';
$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

if (isset($_POST['id'])) {
    $shift_week_id = $_POST['id'];

    $shift_week_info = "SELECT * FROM compiled_list WHERE id = '$shift_week_id' AND company_id = '$company_id'";
    $shift_week_info_result = mysqli_query($db, $shift_week_info);
    $result = '<option value="blank">[Select Date]</option>';
    if ($shift_week_info_result) {
        $dates_array = array();
        while ($row = $shift_week_info_result->fetch_assoc()) {

            $dates_array = json_decode($row['dates_array'], TRUE);
            $count_places = count($dates_array);
            $k = 0;
            foreach ($dates_array as $date) {
                    $k++;
                    $result .= '<option value="' . $k . '">' . $date['date'] . '  --//--  ' . $date['day'] . '</option>';
                
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