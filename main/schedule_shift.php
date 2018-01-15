<?php
include 'session_header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Titan Admin</title>


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


    </head>

    <body>
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




            var firebaseRef = firebase.database().ref();
            var oneRef = firebaseRef.child('id');
            oneRef.on("value", function (snapshot) {
                console.log(snapshot.child);
            });
        </script>
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

                    <!--default modal-->
                    <div class="modal fade" id="add_team_member_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Manage User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <input id="user_id" hidden="hidden" type="number"/>
                                    <table id="user_edit_table">
                                        <tr class="user_row">
                                            <td class="user_row label_modal">First Name</td>
                                            <td class="user_row"><input type="text" name="" id="user_firstname"></td>
                                        </tr>
                                        <tr class="user_row">
                                            <td class="user_row label_modal">Last Name</td>
                                            <td class="user_row"><input type="text" name="" id="user_lastname"></td>
                                        </tr>
                                        <tr class="user_row">
                                            <td class="user_row label_modal">Username</td>
                                            <td class="user_row"><input type="text" name="" id="user_username"></td>
                                        </tr>
                                        <tr class="user_row">
                                            <td class="user_row label_modal">Cell</td>
                                            <td class="user_row"><input type="text" name="" id="user_cell"></td>
                                        </tr>
                                        <tr class="user_row">
                                            <td class="user_row label_modal">Email</td>
                                            <td class="user_row"><input type="text" name="" id="user_email"></td>
                                        </tr>
                                        <tr class="user_row">
                                            <td class="user_row label_modal">Role</td>
                                            <td class="user_row"><input type="text" name="" id="user_role"></td>
                                        </tr>
                                        <tr >
                                            <td class="user_row label_modal">Privilege</td>
                                            <td class="user_row">
                                                <select id="user_privilege">
                                                    <option>[Select]</option>
                                                    <option value="1">Administrator</option>
                                                    <option value="0">User</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="modal_close" data-dismiss="modal">Close</button>
                                    <button type="button" id="add_new_user" class="btn btn-primary">Add Member</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--default modal-->
                    <div class="modal fade" id="add_shift_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Shift</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <table id="add_shift_table">
                                        <tr>
                                            <td>

                                                <label for="shift-name" class="control-label">Shift Name:</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="shift-name" width="10">

                                            </td>
                                        <tr>
                                            <td>
                                                <label for="start_time" class="control-label">Shift Start:</label>
                                            </td>
                                            <td>
                                                <select type="time" class="form-control col-2" id="start_time_hours">

                                                </select>

                                                <select type="time" class="form-control col-2" id="start_time_mins" width="10">

                                                </select>
                                                <select type="time" class="form-control col-2" id="start_time_am_pm" width="10">

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="end_time" class="control-label">Shift End:</label>
                                            </td>
                                            <td>

                                                <select type="time" class="form-control col-2" id="end_time_hours">

                                                </select>
                                                <select type="time" class="form-control col-2" id="end_time_mins" width="10">

                                                </select>
                                                <select type="time" class="form-control col-2" id="end_time_am_pm" width="10">

                                                </select>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="shift_duration" class="control-label">Shift Duration:</label>
                                            </td>
                                            <td>
                                                <input  type="text" class="form-control col-3" id="shift_duration"/><button type="button" id="btn_calculate" class="btn btn-group-sm">Calculate</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>   
                                                <label for="group" class="control-label">Group:</label>
                                            </td>
                                            <td>
                                                <select name="select_role" id="select_role" class="custom-select b-0">
                                                    <option selected="">All</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="save_user_changes" class="btn btn-primary">Add Member</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- partial -->
                    <div class="content-wrapper">
                        <h3 class="page-title">Create Shift List</h3>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Shift Information</h5>
                                        <form id="example-form" action="#">
                                            <div>
                                                <h3>Start - End Dates</h3>
                                                <section>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body shiftdate_holder">
                                                                <h1>Shift Dates</h1>
                                                                <table id="table_dates">
                                                                    <tr>
                                                                        <td>
                                                                            <label for="shift_start_date"><strong>Start Date</strong></label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="shift_start_date" id="shift_start_date" value="" size="30" readonly="readonly" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <label for="shift_end_date"><strong>End Date</strong></label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="shift_end_date" id="shift_end_date" value="" size="30" readonly="readonly" />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <h3>Role Group</h3>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Personnel</label>
                                                        <select name="role_group" id="role_group">
                                                            <option value="">[Select Role]</option>
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <button type="button" id="add_team_member" class="btn btn-primary" data-toggle="modal" data-target="#add_team_member_modal">Add Team Member</button>
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="subject-info-box-1">
                                                                            <label for="lstBox1">Personnel List</label>
                                                                            <select multiple="multiple" name="lstBox1[]" id="lstBox1" class="form-control">

                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td align="centre">
                                                                        <div class="subject-info-arrows text-center">
                                                                            <input type="button" id="btnAllRight" value=">>" class="movebutton  btn btn-default" /><br />
                                                                            <input type="button" id="btnRight" value=">" class="movebutton btn btn-default" /><br />
                                                                            <input type="button" id="btnLeft" value="<" class="movebutton btn btn-default" /><br />
                                                                            <input type="button" id="btnAllLeft" value="<<" class="movebutton btn btn-default" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="subject-info-box-2">
                                                                            <label for="lstBox2">Available Personnel</label>
                                                                            <select multiple="multiple" name="lstBox2[]" id="lstBox2" class="form-control">
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </section>
                                                <h3>Select Shifts</h3>
                                                <section>

                                                    <div class="form-group">
                                                        <br>
                                                        <br>
                                                        <button type="button" id="add_shift" class="btn btn-primary" data-toggle="modal" data-target="#add_shift_modal">Add Team Member</button>
                                                        <br>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <div class="subject-info-box-1">
                                                                        <label for="lstBoxShifts1">Shifts List</label>
                                                                        <select multiple="multiple" name="lstBoxShifts1[]" id="lstBoxShifts1" class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td align="centre">
                                                                    <div class="subject-info-arrows text-center">
                                                                        <input type="button" id="btnAllRightShifts" value=">>" class="movebutton  btn btn-default" /><br />
                                                                        <input type="button" id="btnRightShifts" value=">" class="movebutton btn btn-default" /><br />
                                                                        <input type="button" id="btnLeftShifts" value="<" class="movebutton btn btn-default" /><br />
                                                                        <input type="button" id="btnAllLeftShifts" value="<<" class="movebutton btn btn-default" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="subject-info-box-2">
                                                                        <label for="lstBoxShifts2">Available Shifts</label>
                                                                        <select multiple="multiple" name="lstBoxShifts2[]" id="lstBoxShifts2" class="form-control">
                                                                        </select>
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
                                <a href="#">MyShift</a> &copy; 2017
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

        <script src="../js/schedule_shift.js" type="text/javascript"></script>

        <script src="js/wizard.js"></script>

        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/formpickers.js" type="text/javascript"></script>
        <script src="../js/load_notifications.js" type="text/javascript"></script>
        <script src="../js/load_profile_for_bar.js" type="text/javascript"></script>
        <script src="../js/team.js" type="text/javascript"></script>


    </body>

</html>
