<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];
$user_id = $_SESSION['user_info'][0];

$select_count_pending = "SELECT COUNT(*) AS num FROM pending_users WHERE company_id = '$company_id' AND status = 'Pending'";
$select_count_pending_result = mysqli_query($db, $select_count_pending);
$result = "";
if ($select_count_pending_result) {
    while ($row = $select_count_pending_result->fetch_assoc()) {
        if ($row['num'] == 1) {
            $result .= '<a class="dropdown-item" href="requests.php">'
                    . '<i class="fa fa-user-o text-info fa-fw"></i>'
                    . '<span class="notification-text">You have ' . $row['num'] . ' new join request'
                    . '</a>';
        } elseif ($row['num'] > 1) {
            $result .= '<a class="dropdown-item" href="requests.php">'
                    . '<i class="fa fa-user-o text-info fa-fw"></i>'
                    . '<span class="notification-text">You have ' . $row['num'] . ' new join requests'
                    . '</a>';
        }
    }
    $zero = 0;
    $select_pending_shiftlists = "SELECT COUNT(*) AS num FROM compiled_list WHERE company_id = '$company_id' AND completed = 0";
    $select_pending_shiftlists_result = mysqli_query($db, $select_pending_shiftlists);
    if ($select_pending_shiftlists_result) {
        while ($row = $select_pending_shiftlists_result->fetch_assoc()) {
            if ($row['num'] == 1) {
                $result .= '<a class="dropdown-item" href="#">'
                        . '<i class="fa fa-th-list text-success fa-fw"></i>'
                        . '<span class="notification-text">You have ' . $row['num'] . ' incomplete shift list</span>'
                        . '</a>';
            } elseif ($row['num'] > 1) {
                $result .= '<a class="dropdown-item" href="#">'
                        . '<i class="fa fa-th-list text-success fa-fw"></i>'
                        . '<span class="notification-text">You have ' . $row['num'] . ' incomplete shift lists</span>'
                        . '</a>';
            }
        }
    }

    $select_unread_announcement = "SELECT * FROM announcements WHERE company_id = '$company_id'";
    $select_unread_announcement_result = mysqli_query($db, $select_unread_announcement);
    $array_announcements = array();
    $unviewed_annc = 0;
    if ($select_unread_announcement_result) {
        while ($row = $select_unread_announcement_result->fetch_assoc()) {
            $array_announcements[] = array($row['announce_id'] => unserialize($row['views']));
        }

        foreach ($array_announcements as $view) {
            if (in_array($user_id, $view)) {
                
            } else {
                $unviewed_annc++;
            }
        }

        if ($unviewed_annc == 1) {
            $result .= '<a class="dropdown-item" href="announcements.php">'
                    . '<i class="fa fa-bullhorn text-alert fa-fw"></i>'
                    . '<span class="notification-text">You have ' . $unviewed_annc . ' new announcement</span>'
                    . '</a>';
        } elseif ($unviewed_annc > 1) {
            $result .= '<a class="dropdown-item" href="announcements.php">'
                    . '<i class="fa fa-bullhorn text-alert fa-fw"></i>'
                    . '<span class="notification-text">You have ' . $unviewed_annc . ' new announcements</span>'
                    . '</a>';
        }
    }

    $select_unviewed_shift_requests = "SELECT * FROM shift_swap WHERE company_id = '$company_id' AND resolved = 0";
    $select_unviewed_shift_requests_result = mysqli_query($db, $select_unviewed_shift_requests);
    $unviewed_shifts_array = array();
    $unviewed_shift_req = 0;
    if ($select_unviewed_shift_requests_result) {
        while ($row = $select_unviewed_shift_requests_result->fetch_assoc()) {
            $unviewed_shifts_array[] = array($row['swap_id'] => unserialize($row['views']));
        }
        foreach ($unviewed_shifts_array as $view) {
            if (in_array($user_id, $view)) {
                
            } else {
                $unviewed_shift_req++;
            }
        }

        if ($unviewed_shift_req == 1) {
            $result .= '<a class="dropdown-item" href="shift_swap.php">'
                    . '<i class="fa fa-retweet text-warning fa-fw"></i>'
                    . '<span class="notification-text">You have ' . $unviewed_shift_req . ' new Shift Swap requests</span>'
                    . '</a>';
        } elseif ($unviewed_shift_req > 1) {
            $result .= '<a class="dropdown-item"  href="shift_swap.php">'
                    . '<i class="fa fa-retweet text-warning fa-fw"></i>'
                    . '<span class="notification-text">You have ' . $unviewed_shift_req . ' new Shift Swap requests</span>'
                    . '</a>';
        }
    }

    if ($result != "") {
        echo $result;
    } else {
        echo '<a class="dropdown-item" >'
        . '<i class="fa fa-bell text-other-color1 fa-fw"></i>'
        . '<span class="notification-text">No new notifications</span>'
        . '</a>';
    }
}
