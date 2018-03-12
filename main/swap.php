<?php
include 'session_header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MyShift || Swap</title>


        <link rel="stylesheet" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="../jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../jquery-ui/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <link href="../jquery-ui/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
        <link href="bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.png" />

        <style>
            .card-body{
                height: 75% !important;
            }
        </style>
    </head>

    <body>
        <script type="text/javascript">
            var redipsURL = '../main/';
        </script>

        <script src="../jquery-ui/jquery/jquery.js" type="text/javascript"></script>
        <script src="../jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/moment.js" type="text/javascript"></script>







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
                        <h3 class="page-title">Shift Swap</h3>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Swap Information</h5>
                                        <form id="example-form" action="#">
                                            <div>
                                                <h3>Swap Party 1</h3>
                                                <section>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body shiftdate_holder">
                                                                <h1>Shift Date</h1>
                                                                <table id="table_dates">
                                                                    <tr>
                                                                        <td>
                                                                            <label for="shift_week_select_party_1"><strong>Shift List</strong></label>
                                                                        </td>
                                                                        <td>
                                                                            <select  name="shift_week_party_1" id="shift_week_select_party_1" value="" >

                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <label for="shift_date_select_party_1"><strong>Shift Date</strong></label>
                                                                        </td>
                                                                        <td>
                                                                            <select name="shift_date_select_party_1" id="shift_date_select_party_1" value="">
                                                                                <option value="blank">[Select Date]</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="card-body shiftpersonnel_holder">
                                                                <h1>Current Shift</h1>
                                                                <table>
                                                                    <tr>
                                                                        <td align="centre">
                                                                            <label for="shift_party_1_select">Swap Party 1</label>
                                                                            <select name="shift_party_1_select" id="shift_party_1_select">
                                                                                <option value="blank">[Select Personnel]</option>
                                                                            </select>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="centre">
                                                                            <div class="swap_party_1">
                                                                                Current Shift
                                                                                <br>
                                                                                <div id="curr_shift_party_1"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <h3>Swap Party 2</h3>
                                                <section>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body shiftdate_holder">
                                                                <h1>Shift Date</h1>
                                                                <table id="table_dates">
                                                                    <tr>
                                                                        <td>
                                                                            <label for="shift_week_select_party_2"><strong>Shift List</strong></label>
                                                                        </td>
                                                                        <td>
                                                                            <select  name="shift_week_party_2" id="shift_week_select_party_2" value="" >

                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <label for="shift_date_select_party_2"><strong>Shift Date</strong></label>
                                                                        </td>
                                                                        <td>
                                                                            <select name="shift_date_select_party_2" id="shift_date_select_party_2" value=""  >
                                                                                <option value="blank">[Select Date]</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="card-body shiftpersonnel_holder">
                                                                <h1>Current Shift</h1>
                                                                <table>
                                                                    <tr>
                                                                        <td align="centre">
                                                                            <label for="shift_party_2_select">Swap Party 2</label>
                                                                            <select name="shift_party_2_select" id="shift_party_2_select">
                                                                                <option value="blank">[Select Personnel]</option>
                                                                            </select>
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="centre">
                                                                            <div class="swap_party_2">
                                                                                Current Shift
                                                                                <br>
                                                                                <div id="curr_shift_party_2"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <h3>Confirm Swap</h3>
                                                <section>

                                                    <div class="form-group">
                                                        <br>
                                                        <br>
                                                        <h3>Confirm Shift Swap</h3>
                                                        <br>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <label for="">Shift Party 1</label>
                                                                </td>
                                                                <td align="centre">

                                                                </td>
                                                                <td>
                                                                    <label for="">Shift Party 2</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div id="party_1_user_name">Hi</div>
                                                                </td>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                    <p id="party_2_user_name">Name</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div id="party_1_current_shift">

                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <div id="party_2_current_shift">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div id="party_1_new_shift">

                                                                    </div>
                                                                </td>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                    <div id="party_2_new_shift">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </section>

                                            </div>
                                        </form>
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
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.steps/build/jquery.steps.min.js"></script>
        <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
        <script src="js/off-canvas.js"></script>
        <script src="../js/shift_swap_wizard.js"></script>
        <script src="../js/shift_swap.js" type="text/javascript"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/formpickers.js" type="text/javascript"></script>
        <script src="../js/load_notifications.js" type="text/javascript"></script>
        <script src="../js/load_profile_for_bar.js" type="text/javascript"></script>
        <script src="../js/team.js" type="text/javascript"></script>


    </body>

</html>
