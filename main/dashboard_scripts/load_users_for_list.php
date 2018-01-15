<?php

session_start();

include 'config.php';
if (isset($_POST['role'])) {

    $company_id = $_SESSION['user_info'][6];

    $role_group = $_POST['role'];
    $selected_persons = json_decode($_POST['selected_persons']);
    //var_dump($selected_persons);
    $getteamnames = "";

    if ($role_group == "All") {
        $getteamnames = "SELECT personnel_id, first_name, last_name FROM personnel WHERE company_id = '$company_id'";
    } else {
        $getteamnames = "SELECT personnel_id, first_name, last_name FROM personnel WHERE role = '$role_group' AND company_id = '$company_id'";
    }
    $result = mysqli_query($db, $getteamnames);
    $returned = array();
    if (!$result) {
        echo 'Error occured. ' . mysqli_error($db);
    } elseif ($result) {

        while ($row = $result->fetch_assoc()) {


            $prsonnel_id = $row["personnel_id"];
            if (!in_array($prsonnel_id, $selected_persons)) {
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                if (isset($_POST['role'])) {
                    echo '<option value="' . $prsonnel_id . '">' . $first_name . ' ' . $last_name . '</option>';
                } else if (isset($_POST['users'])) {

                    $names = $first_name . ' ' . $last_name;
                    array_push($returned, $names);
                }
            }
        }
        if (isset($_POST['users'])) {
            echo json_encode($returned);
        }
    }
}
