<?php
session_start();

include 'config.php';
$company_id = $_SESSION['user_info'][6];
$select_role = "SELECT DISTINCT role FROM personnel WHERE company_id = '$company_id'";
$select_role_result = mysqli_query($db, $select_role);
$result = '<option value="select">[Select Role]</option>';
$result .= '<option value="all">All</option>';
if ($select_role_result) {
    while ($row = $select_role_result->fetch_assoc()) {
        $role = $row['role'];
        $result .= '<option value="'.$role.'">' . $role . '</option>';
    }
}
echo $result;