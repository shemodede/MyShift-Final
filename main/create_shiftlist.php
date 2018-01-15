<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MyShift</title>
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <link href="../jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../jquery-ui/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <link href="../jquery-ui/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <link href="style.css" rel="stylesheet" type="text/css"/>

        <style>
            #control_panel{
                padding: 30px;
                align-content: center;
                float: right;
            }
            #view-caser{
                clear:both;
            }
        </style>

        
    </head>

    <body>

        <div class=" container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar navbar-light col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-left navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="#"><i class="mdi mdi-cards-outline"></i>MyShift</a>
                    <a class="navbar-brand brand-logo-mini" href="#"><i class="mdi mdi-cards-outline"></i></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-self-stretch align-items-center">
                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
                        <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
                    </form>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item nav-profile">
                            <a class="nav-link" id="profile_link" href="profile.php">
                                Profile<img src="images/profile_pictures/profile_placeholder.jpg" class="" />
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="count">7</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown notification-drop-down" id="notification_div" aria-labelledby="notificationDropdown">

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator" id="MailDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="count">4</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown mail-notification" aria-labelledby="MailDropdown">
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="../../images/faces/face6.jpg" alt="">
                                        <span class="badge badge-success">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">John Doe</p>
                                        <p class="Sender-message">Hey, We have a meeting planned at the end of the day.</p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="../../images/faces/face2.jpg" alt="">
                                        <span class="badge badge-success">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">Leanne Jones</p>
                                        <p class="Sender-message">Can we schedule a call this afternoon?</p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="../../images/faces/face3.jpg" alt="">
                                        <span class="badge badge-primary">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">Stella</p>
                                        <p class="Sender-message">Great presentation the other day. Keep up the good work!</p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="../../images/faces/face4.jpg" alt="">
                                        <span class="badge badge-warning">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">James Brown</p>
                                        <p class="Sender-message">Need the updates of the project at the end of the week.</p>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item view-all">View all</a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="row row-offcanvas row-offcanvas-right">
                    <!-- partial:../../partials/_sidebar.html -->
                    <nav class="sidebar sidebar-offcanvas" id="sidebar">
                        <ul class="nav">
                            <!--main pages start-->
                            <li class="nav-item nav-category">
                                <span class="nav-link">Main</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">
                                    <i class="mdi"></i>
                                    <span class="menu-title">Dashboard</span>
                                    <i class="mdi"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="team.php">
                                    <i class="mdi icon-people"></i>
                                    <span class="menu-title">Team Management</span>
                                    <i class="mdi icon-people"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shifts.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Shifts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="schedule_shift.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Schedule Shifts</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="requests.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Requests</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reports.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Reports</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shift_swap.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Shift Swap</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="announcements.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Announcements</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="chat.php">
                                    <i class="mdi icon-docs"></i>
                                    <span class="menu-title">Chat</span>
                                </a>
                            </li>
                            <!--main pages end-->

                        </ul>
                    </nav>

                    <!-- partial -->
                    <div class="content-wrapper">
                        <h3 class="page-title">Create List</h3>

                        <div class="row">
                            <div class="col-lg-12 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="main_container">
                                            <!-- tables inside this DIV could have draggable content -->
                                            <div id="redips-drag">



                                                <!-- left container (table with subjects) -->
                                                <div id="left">
                                                    <table id="table1">
                                                        <colgroup>
                                                            <col width="190"/>
                                                        </colgroup>
                                                        <tbody>
                                                            <?php
                                                            $company_id = $_SESSION['user_info'][6];

                                                            $date_start;
                                                            $date_end;
                                                            $selected_personnel_id = array();
                                                            $selected_shifts_id = array();
                                                            $selected_role;



                                                            $get_info_query = "SELECT * FROM compiled_list WHERE company_id = '$company_id' AND id = (SELECT max(id) FROM compiled_list) AND completed = false";
                                                            $get_info_query_result = mysqli_query($db, $get_info_query);

                                                            $get_compiled_list_id = "SELECT id FROM compiled_list WHERE id = (SELECT max(id) FROM compiled_list)";
                                                            $get_compiled_list_id_results = mysqli_query($db, $get_compiled_list_id);

                                                            if ($get_compiled_list_id_results) {
                                                                while ($row = $get_compiled_list_id_results->fetch_assoc()) {
                                                                    $_SESSION['shift_id'] = $row['id'];
                                                                }
                                                            }
                                                            if ($get_info_query_result) {
                                                                while ($row = $get_info_query_result->fetch_assoc()) {
                                                                    $date_start = $row['start_date'];
                                                                    $date_end = $row['end_date'];
                                                                    $_SESSION['table_id'] = $row['id'];
                                                                    $selected_personnel_id = json_decode($row['team_array']);
                                                                    $selected_shifts_id = json_decode($row['shifts_array']);
                                                                    $selected_role = $row['roles_positions'];
                                                                }

                                                                //var_dump($selected_shifts_id);

                                                                $array_shifts = array();
                                                                foreach ($selected_shifts_id as $value) {
                                                                    $get_actual_shifts_query = "SELECT shift_name FROM shifts WHERE shift_id = '$value'";
                                                                    $get_actual_shifts_query_result = mysqli_query($db, $get_actual_shifts_query);
                                                                    if ($get_actual_shifts_query_result) {
                                                                        while ($row = $get_actual_shifts_query_result->fetch_assoc()) {
                                                                            $array_shifts[] = array('shift_name' => $row["shift_name"], 'shift_id' => $value);
                                                                        }
                                                                    } elseif (!$get_actual_shifts_query_result) {
                                                                        echo 'Oh oh... ' . mysqli_error($db);
                                                                    }
                                                                }


                                                                foreach ($array_shifts as $value) {
                                                                    echo '<tr><td class="dark" align="center"><div id="' . $value['shift_id'] . '" class="redips-drag shift-block redips-clone ' . $value['shift_name'] . '">' . $value['shift_name'] . '</div><input id="b_' . $value['shift_name'] . '" class="' . $value['shift_name'] . '" type="button" value="R" onclick="redips.report("' . $value['shift_name'] . '")" title="Show only ' . $value['shift_name'] . '"/></td></tr>';
                                                                }
                                                            } elseif (!$get_info_query_result) {
                                                                echo 'Oh oh.... ' . mysqli_error($db);
                                                            }
                                                            ?>
                                                            <tr><td class="dark" align="center"><div id="off" class="redips-drag shift-block redips-clone">OFF</div><input id="b_off" class="off" type="button" value="R" onclick="redips.report(off)" title="Show only OFF"/></td></tr>
                                                            <tr><td class="redips-trash" title="Trash">Trash</td></tr>
                                                            <tr><td class="fill_button"><button id="fill_off" type="button">Fill</button><button id="unfill_off" type="button">Unfill</button></td></tr>
                                                        </tbody>
                                                    </table>
                                                </div><!-- left container -->

                                                <!-- right container -->
                                                <div id="right">
                                                    <table id="table2">
                                                        <colgroup>
                                                            <col width="150"/>
                                                            <?php
                                                            $select_shift_days_count = "SELECT dates_array FROM compiled_list WHERE id = (SELECT max(id) FROM compiled_list)";
                                                            $select_shift_days_count_result = mysqli_query($db, $select_shift_days_count);
                                                            $dates_array = [];
                                                            $result = "";

                                                            if ($select_shift_days_count_result) {
                                                                while ($row = $select_shift_days_count_result->fetch_assoc()) {
                                                                    $dates_array = json_decode($row['dates_array'], TRUE);
                                                                    $count_days = count($dates_array);
                                                                    for ($i = 0; $i < $count_days; $i++) {
                                                                        $result .= '<col width="100"/>';
                                                                    }
                                                                }
                                                            }
                                                            ?>




<!--<col width="100"/>
<col width="100"/>
<col width="100"/>
<col width="100"/>
<col width="100"/>
<col width="100"/>
<col width="100"/>-->
                                                        </colgroup>
                                                        <tbody><tr>
                                                                <td></td>
                                                                <?php
                                                                $count_days = count($dates_array);
                                                                for ($k = 0; $k < $count_days; $k++) {
                                                                    echo '<td class="redips-mark days dark">' . $dates_array[$k]['date'] . '</td>';
                                                                }
                                                                ?>
                                                                <!--<td class="redips-mark days dark">Monday</td>
                                                                <td class="redips-mark days dark">Tuesday</td>
                                                                <td class="redips-mark days dark">Wednesday</td>
                                                                <td class="redips-mark days dark">Thursday</td>
                                                                <td class="redips-mark days dark">Friday</td>
                                                                <td class="redips-mark days dark">Saturday</td>
                                                                <td class="redips-mark days dark">Sunday</td>-->
                                                            </tr>
                                                            </tr>

                                                            <tr>
                                                                <!-- if checkbox is checked, clone school subjects to the whole table row  -->
                                                                <td class="redips-mark blank">
                                                                    <input id="week" type="checkbox" title="Apply shifts to the week"/>
                                                                    <input id="report" type="checkbox" title="Show shift report"/>
                                                                </td>

                                                                <?php
                                                                $count_days = count($dates_array);
                                                                for ($k = 0; $k < $count_days; $k++) {
                                                                    echo '<td class="redips-mark days dark">' . $dates_array[$k]['day'] . '</td>';
                                                                }
                                                                ?>
                                                                <!--<td class="redips-mark days dark">Monday</td>
                                                                <td class="redips-mark days dark">Tuesday</td>
                                                                <td class="redips-mark days dark">Wednesday</td>
                                                                <td class="redips-mark days dark">Thursday</td>
                                                                <td class="redips-mark days dark">Friday</td>
                                                                <td class="redips-mark days dark">Saturday</td>
                                                                <td class="redips-mark days dark">Sunday</td>-->
                                                            </tr>
                                                            <?php
                                                            $array_personnel_names = array();

                                                            foreach ($selected_personnel_id as $value) {
                                                                $get_personnel_names = "SELECT first_name, last_name FROM personnel WHERE personnel_id = '$value'";
                                                                $get_personnel_names_result = mysqli_query($db, $get_personnel_names);

                                                                if ($get_personnel_names_result) {


                                                                    while ($row = $get_personnel_names_result->fetch_assoc()) {
                                                                        $array_personnel_names[] = array('first' => $row['first_name'], 'last' => $row['last_name'], 'name_id' => $value);
                                                                    }
                                                                } elseif (!$get_personnel_names_result) {
                                                                    echo 'Oh oh... 2' . mysqli_error($db);
                                                                }
                                                            }


                                                            foreach ($array_personnel_names as $value) {
                                                                echo '<tr class="shifts_table_rows"> '
                                                                . '<td class="value_cell redips-mark dark usable person_name" id="' . $value['name_id'] . '">' . $value['first'] . ' ' . $value['last'] . '</td>';
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>'

                                                                $count_days = count($dates_array);
                                                                for ($k = 0; $k < $count_days; $k++) {
                                                                    echo '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>';
                                                                }
                                                                //. '<td class="value_cell drop-table usable shift_values ' . $value['name_id'] . '"></td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>

                                                </div><!-- right container -->
                                            </div><!-- drag container -->
                                            <div id="message">Drag shifts to the timetable (clone shifts with SHIFT key)</div>
                                            <div>
                                                <!--<button type="button" id="display_table" name="display_table" value="Display">Display</button>
                                                <button type="button" id="show_emails" name="show_emails" value="Email" >Email Draft</button>
                                                <button type="button" id="view_hours" name="check_hours">Calculate Hours</button>-->

                                                <div id="control_panel">
                                                    <button type="button" class="btn-success btn" name="preview_list" id="preview_list">Preview List</button>
                                                    <button type="button" name="preview_hours" class="btn-success btn" id="preview_hours">Preview Hours</button>
                                                    <button type="button" name="preview_expense" class="btn-success btn" id="preview_expense">Preview Shift Expense</button>
                                                    <br><br>
                                                    <button type="button" name="save_n_notify" class="btn-outline-dark btn" id="save_n_notify">Save and Notify</button>
                                                    <button type="button" name="save_as_incomplete" class="btn-warning btn" id="save_as_draft">Save as Draft</button><br>
                                                    <input type="checkbox" value="" name="create_pdf" id="create_pdf"> Create PDF</input>
                                                </div>
                                            </div>

                                            <div id="view-caser" style="margin-top: 8%">

                                            </div>

                                            <script>

                                            </script>


                                        </div><!-- main container -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="float-right">
                                <a href="#">MyShift</a> &copy; 2018
                            </span>
                        </div>
                    </footer>
                </div>
            </div>

        </div>

        <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
        <script>
                                                // Initialize Firebase
                                                var config = {
                                                    apiKey: "AIzaSyAgHb-hS9FSiFFhmaLbz5fLnJkq-0yOE8k",
                                                    authDomain: "myshift-ce37f.firebaseapp.com",
                                                    databaseURL: "https://myshift-ce37f.firebaseio.com",
                                                    projectId: "myshift-ce37f",
                                                    storageBucket: "myshift-ce37f.appspot.com",
                                                    messagingSenderId: "252687042381"
                                                };
                                                firebase.initializeApp(config);
        </script>
        <script src="../jquery-ui/jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery-ui/jquery-ui.js" type="text/javascript"></script>

        <script src="../redips-drag-min.js" type="text/javascript"></script>
        <script src="script.js" type="text/javascript"></script>



        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/chart.js/dist/Chart.min.js"></script>
        <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="node_modules/chart.js/dist/Chart.min.js"></script>
        <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="js/off-canvas.js"></script>

        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/alerts.js"></script>
        <script src="js/modalDemo.js"></script>

        <script src="../js/reportshandler.js" type="text/javascript"></script>


        <script src="../js/load_notifications.js" type="text/javascript"></script>
        <script src="../js/load_profile_for_bar.js" type="text/javascript"></script>
        <script src="../js/create_list.js" type="text/javascript"></script>
    </body>
</html>
