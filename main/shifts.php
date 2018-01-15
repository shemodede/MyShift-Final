<?php
include 'session_header.php';
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
        <link rel="stylesheet" href="node_modules/jqvmap/dist/jqvmap.min.css" />
        <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
        <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css" />
        <link rel="stylesheet" href="node_modules/pwstabs/assets/jquery.pwstabs.min.css">
        <link rel="stylesheet" href="node_modules/icheck/skins/all.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link href="css/custom_classes.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/favicon.html" />

        <style>
            .main_tile{
                cursor: pointer;
            }
            
            td{
                padding: 10px;
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
                                No new notifications.
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
                                        <img src="images/faces/face6.jpg" alt="">
                                        <span class="badge badge-success">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">John Doe</p>
                                        <p class="Sender-message">Hey, We have a meeting planned at the end of the day.</p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="images/faces/face2.jpg" alt="">
                                        <span class="badge badge-success">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">Leanne Jones</p>
                                        <p class="Sender-message">Can we schedule a call this afternoon?</p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="images/faces/face3.jpg" alt="">
                                        <span class="badge badge-primary">&nbsp;</span>
                                    </div>
                                    <div class="sender">
                                        <p class="Sende-name">Stella</p>
                                        <p class="Sender-message">Great presentation the other day. Keep up the good work!</p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="sender-img">
                                        <img src="images/faces/face4.jpg" alt="">
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
                                <a class="nav-link"  href="index.php">
                                    <i class="mdi"></i>
                                    <span class="menu-title">Dashboard</span>
                                    <i class="mdi"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="team.php">
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
                        <div style="padding: 20px;">
                            <button id="create_swap_request" class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Add Shift</button>
                        </div>
                        
                        <div class="card-deck">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card" style="min-height:395px;">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title inline">Shifts</h5>
                                            <div class="align-right">
                                                <select id="roles_select" name="filter_roles" class="custom-select">

                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="table-responsive team-table-div" >
                                            <table class="table table-hover table-striped">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>Shift Name</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Duration</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="shifts_table">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="float-right">
                                <a href="#">MyShift</a> &copy; 2017
                            </span>
                        </div>
                    </footer>
                </div>
            </div>

        </div>
        
        
        
        
        <!-- Large modal -->

            <div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Shift</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table id="add_new_shift" style="margin: 0 auto;">

                                <tr>
                                    <td>Shift Name</td>
                                    <td><input type="text" name="shift_name" id="shift_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Start Time</td>
                                    <td><input type="time" name="shift_start" id="shift_start" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>End Time</td>
                                    <td><input type="time" name="shift_end" id="shift_end" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Shift Duration</td>
                                    <td><input type="number" name="shift_duration" id="shift_duration" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Role Group</td>
                                    <td>
                                        <select class="form-control" id="shift_role_group" name="shift_role_group">
                                            <option>[Select Role Group]</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save_shift_add">Add Shift</button>
                        </div>
                    </div>
                </div>
            </div>
        
        
        

        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/chart.js/dist/Chart.min.js"></script>
        <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="node_modules/progressbar.js/dist/progressbar.min.js"></script>
        <script src="node_modules/jquery-circle-progress/dist/circle-progress.min.js"></script>
        <script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="node_modules/pwstabs/assets/jquery.pwstabs.min.js"></script>
        <script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="node_modules/pwstabs/assets/jquery.pwstabs.min.js"></script>
        <script src="node_modules/icheck/icheck.min.js"></script>
        <script src="bower_components/chartist/dist/chartist.min.js"></script>
        <script src="js/off-canvas.js"></script>

        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
        <script src="node_modules/jquery-asColor/dist/jquery-asColor.min.js"></script>
        <script src="node_modules/jquery-asGradient/dist/jquery-asGradient.min.js"></script>
        <script src="node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
        <script src="node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="node_modules/bootstrap-daterangepicker/moment.min.js"></script>
        <script src="node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="js/chart.js" type="text/javascript"></script>
        <script src="js/maps.js"></script>
        <script src="js/circle-progress.js"></script>
        <script src="js/sparkline.js"></script>
        <script src="js/progress-bar.js"></script>
        <script src="js/chartist.js"></script>
        <script src="js/todolist.js"></script>
        <script src="js/tabs.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/iCheck.js"></script>

        <script src="js/alerts.js"></script>
        <script src="js/modalDemo.js"></script>


        <script src="../js/load_notifications.js" type="text/javascript"></script>

        <script src="js/off-canvas.js"></script>
        <script src="../js/shifts.js" type="text/javascript"></script>
        <script src="js/formpickers.js"></script>
        <script src="../js/load_profile_for_bar.js" type="text/javascript"></script>
    </body>
</html>
