<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];


$get_swap_request = "SELECT * FROM shift_swap WHERE company_id = '$company_id'";
$get_swap_request_result = mysqli_query($db, $get_swap_request);

$result = "";
if ($get_swap_request_result) {
    while ($row = $get_swap_request_result->fetch_assoc()) {
        $swap_id = $row['swap_id'];
        $requesting_personnel1 = $row['requesting_personnel1'];
        $requesting_personnel2 = $row['requesting_personnel2'];

        $request_timestamp = $row['request_timestamp'];

        $current_shift_1 = $row['current_shift1'];
        $current_shift_2 = $row['current_shift2'];
        $new_shift_1 = $row['new_shift1'];
        $new_shift_2 = $row['new_shift2'];
        $status = $row['status'];

        $get_requestor_1_name = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$requesting_personnel1'";
        $get_requestor_1_name_result = mysqli_query($db, $get_requestor_1_name);
        $requestor_1_full_name;
        if ($get_requestor_1_name_result) {
            while ($row = $get_requestor_1_name_result->fetch_assoc()) {
                $requestor_1_full_name = $row['first_name'] . " " . $row['last_name'];
                $profile_pic_path_1 = $row['profile_pic'];
            }
        }


        $get_requestor_2_name = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$requesting_personnel2'";
        $get_requestor_2_name_result = mysqli_query($db, $get_requestor_2_name);
        $requestor_2_full_name;
        if ($get_requestor_2_name_result) {
            while ($row = $get_requestor_2_name_result->fetch_assoc()) {
                $requestor_2_full_name = $row['first_name'] . " " . $row['last_name'];
                $profile_pic_path_2 = $row['profile_pic'];
            }
        }


        if ($status == "Pending") {
            $result .= '<li  class="timeline-inverted">'
                    . '<div class="timeline-badge warning"><i class="mdi mdi-rocket warning"></i></div>'
                    . '<div class="timeline-panel">'
                    . '<div class="timeline-heading">
                                                    <div class="header-holder">
                                                    <h4 class="timeline-title">Shift Swap</h4><p>Requested By: ' . $requestor_1_full_name . '</p>
                                                    </div>
                                                    <div class="status_view">
                                                        <p><span class="status_label_text">Status: ' . $status . '</span></p>
                                                    </div>
                                                    <p><small class="text-muted">' . $request_timestamp . '</small></p>
                                                </div>
                                                <div class="timeline-body">

                                                    <table id="table_info">
                                                        <tr class="table_row">
                                                            <td class="table_cell"><div class="request_name">' . $requestor_1_full_name . '</div><div class="request_img"><img class="shift_swap_img" src="' . $profile_pic_path_1 . '" /></div></td>
                                                            <td class="table_column_2"><div class="request_name">' . $requestor_2_full_name . '</div> <div class="request_img"><img class="shift_swap_img" src="' . $profile_pic_path_2 . '" /></div></td>
                                                        </tr>
                                                        <tr class="table_row">
                                                            <td class="table_cell">Current Shift: ' . $current_shift_1 . '</td>
                                                            <td class="table_column_2">' . $current_shift_2 . '</td>
                                                        </tr>
                                                        <tr class="table_row">
                                                            <td class="table_cell">New Shift: ' . $new_shift_1 . '</td>
                                                            <td class="table_column_2">New Shift: ' . $new_shift_2 . '</td>
                                                        </tr>
                                                    </table>

                                                    <hr>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" id="' . $swap_id . '">
                                                            <a class="dropdown-item" href="#">Accept</a>
                                                            <a class="dropdown-item" href="#">Reject</a>
                                                            <a class="dropdown-item" href="#">Message</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Pending</a>
                                                        </div>
                                                    </div>
                                                </div>
            </li>';
        } elseif ($status == "Authorized") {
            $result .= '<li>'
                    . '<div class="timeline-badge warning"><i class="mdi mdi-rocket info"></i></div>'
                    . '<div class="timeline-panel">'
                    . '<div class="timeline-heading">
                                                    <div class="header-holder">
                                                    <h4 class="timeline-title">Shift Swap</h4><p>Requested By: ' . $requestor_1_full_name . '</p>
                                                    </div>
                                                    <div class="status_view">
                                                        <p><span class="status_label_text">Status: ' . $status . '</span></p>
                                                    </div>
                                                    <p><small class="text-muted">' . $request_timestamp . '</small></p>
                                                </div>
                                                <div class="timeline-body">

                                                    <table id="table_info">
                                                        <tr class="table_row">
                                                            <td class="table_cell"><div class="request_name">' . $requestor_1_full_name . '</div><div class="request_img"><img class="shift_swap_img" src="' . $profile_pic_path_1 . '" /></div></td>
                                                            <td class="table_column_2"><div class="request_name">' . $requestor_2_full_name . '</div> <div class="request_img"><img class="shift_swap_img" src="' . $profile_pic_path_2 . '" /></div></td>
                                                        </tr>
                                                        <tr class="table_row">
                                                            <td class="table_cell">Current Shift: ' . $current_shift_1 . '</td>
                                                            <td class="table_column_2">' . $current_shift_2 . '</td>
                                                        </tr>
                                                        <tr class="table_row">
                                                            <td class="table_cell">New Shift: ' . $new_shift_1 . '</td>
                                                            <td class="table_column_2">New Shift: ' . $new_shift_2 . '</td>
                                                        </tr>
                                                    </table>

                                                    <hr>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" id="' . $swap_id . '">
                                                            <a class="dropdown-item" href="#">Accept</a>
                                                            <a class="dropdown-item" href="#">Reject</a>
                                                            <a class="dropdown-item" href="#">Message</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Pending</a>
                                                        </div>
                                                    </div>
                                                </div>
            </li>';
        }
        elseif ($status == "Rejected") {
            $result .= '<li>'
                    . '<div class="timeline-badge warning"><i class="mdi mdi-rocket danger"></i></div>'
                    . '<div class="timeline-panel">'
                    . '<div class="timeline-heading">
                                                    <div class="header-holder">
                                                    <h4 class="timeline-title">Shift Swap</h4><p>Requested By: ' . $requestor_1_full_name . '</p>
                                                    </div>
                                                    <div class="status_view">
                                                        <p><span class="status_label_text">Status: ' . $status . '</span></p>
                                                    </div>
                                                    <p><small class="text-muted">' . $request_timestamp . '</small></p>
                                                </div>
                                                <div class="timeline-body">

                                                    <table id="table_info">
                                                        <tr class="table_row">
                                                            <td class="table_cell"><div class="request_name">' . $requestor_1_full_name . '</div><div class="request_img"><img class="shift_swap_img" src="' . $profile_pic_path_1 . '" /></div></td>
                                                            <td class="table_column_2"><div class="request_name">' . $requestor_2_full_name . '</div> <div class="request_img"><img class="shift_swap_img" src="' . $profile_pic_path_2 . '" /></div></td>
                                                        </tr>
                                                        <tr class="table_row">
                                                            <td class="table_cell">Current Shift: ' . $current_shift_1 . '</td>
                                                            <td class="table_column_2">' . $current_shift_2 . '</td>
                                                        </tr>
                                                        <tr class="table_row">
                                                            <td class="table_cell">New Shift: ' . $new_shift_1 . '</td>
                                                            <td class="table_column_2">New Shift: ' . $new_shift_2 . '</td>
                                                        </tr>
                                                    </table>

                                                    <hr>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" id="' . $swap_id . '">
                                                            <a class="dropdown-item" href="#">Accept</a>
                                                            <a class="dropdown-item" href="#">Reject</a>
                                                            <a class="dropdown-item" href="#">Message</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Pending</a>
                                                        </div>
                                                    </div>
                                                </div>
            </li>';
        }
    }
}
echo $result;



/*
     * <li class="timeline-inverted">
      <div class="timeline-badge warning"><i class="mdi mdi-rocket incon"></i></div>
      <div class="timeline-panel">
      <div class="timeline-heading">
      <div class="header-holder">
      <h4 class="timeline-title">Shift Swap</h4><p>Requested By: </p>
      </div>
      <div class="status_view">
      <p><span class="status_label_text">Status:</span></p>
      </div>
      <p><small class="text-muted">2 August 2017</small></p>
      </div>
      <div class="timeline-body">

      <table id="table_info">
      <tr class="table_row">
      <td class="table_cell"><div class="request_name">Major Tom</div><div class="request_img"><img class="shift_swap_img" src="images/faces/face9.jpg" /></div></td>
      <td class="table_column_2"><div class="request_name">Cassidi</div> <div class="request_img"><img class="shift_swap_img" src="images/faces/face9.jpg" /></div></td>
      </tr>
      <tr class="table_row">
      <td class="table_cell">Current Shift:</td>
      <td class="table_column_2">Current shift</td>
      </tr>
      <tr class="table_row">
      <td class="table_cell">New Shift:</td>
      <td class="table_column_2">New Shift</td>
      </tr>
      </table>

      <hr>
      <div class="btn-group">
      <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Accept</a>
      <a class="dropdown-item" href="#">Reject</a>
      <a class="dropdown-item" href="#">Message</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Pending</a>
      </div>
      </div>
      </div>
      </div>
      </li>
     */    