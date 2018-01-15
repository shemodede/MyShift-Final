<?php
session_start();

include 'config.php';

$filter = $_POST['filter'];

$company_id = $_SESSION['user_info'][6];
$personnel_id = $_SESSION['user_info'][0];

$get_team = "SELECT * FROM personnel WHERE company_id = '$company_id' AND personnel_id != '$personnel_id' AND role = '$filter'";
$get_team_result = mysqli_query($db, $get_team);

$result = "";

if ($get_team_result) {
    while ($row = $get_team_result->fetch_assoc()) {
        $name = $row['first_name'] . " " . $row['last_name'];
        $username = $row['username'];
        $cellnumber = $row['cell_number'];
        $email = $row['email'];
        $role = $row['role'];
        $first_letter = strtoupper($row['first_name'][0]);

        $result .= '<tr>'
                . '<td>' . $name . '</td>'
                . '<td>' . $role . '</td>'
                . '<td>' . $cellnumber . '</td>'
                . '</tr>';
    }

    echo $result;
}
?>

<!--<tr>
    <td style="width:50px;"><span class="round">S</span></td>
    <td>
        <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small></td>
    <td>Elite Admin</td>
    <td><span class="label label-success label-rounded">Low</span></td>
    <td>$3.9K</td>
</tr>-->