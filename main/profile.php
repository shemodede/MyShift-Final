<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MyShift</title>
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>

    <body>
        <div class=" container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar navbar-light col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-left navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="#"><i class="mdi mdi-cards-outline"></i>Titan</a>
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
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-birthday-cake text-success fa-fw"></i>
                                    <span class="notification-text">Today is John's birthday</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-phone text-danger fa-fw"></i>
                                    <span class="notification-text">Call John Doe</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-handshake-o text-primary fa-fw"></i>
                                    <span class="notification-text">Meeting Alisa</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-exclamation-triangle text-danger fa-fw"></i>
                                    <span class="notification-text">Server space almost full</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-bell text-warning fa-fw"></i>
                                    <span class="notification-text">Payment Due</span>
                                </a>
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
                        <h3 class="page-title">User Profile</h3>
                        <div class="row user-profile">
                            <div class="col-lg-4 side-left">
                                <div class="card mb-4">
                                    <div class="card-body avatar">
                                        <h2 class="card-title">Info</h2>
                                        <div id="profile_pic_case">
                                            <img src="images/profile_pictures/profile_placeholder.jpg" class="profile_image" width="300px" height="300px" alt="">
                                        </div><br>
                                        <p class="name">Name: </p>
                                        <p class="role">Role: </p>
                                        <a class="email" href="#">Email: </a><br><br>
                                        <a class="number" href="#">Cell: </a>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body overview">
                                        <div class="wrapper about-user">
                                            <h2 class="card-title mt-4 mb-3">Bio</h2>
                                            <p class="bio">About me..</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 side-right">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                                            <h2 class="card-title">Update Details</h2>
                                            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Avatar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Security</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wrapper">
                                            <hr>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="profile-tab">
                                                    <form action="#">
                                                        <div class="form-group">
                                                            <label for="name"><strong>First Name</strong></label>
                                                            <input type="text" class="form-control" id="firstname" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"><strong>Last Name</strong></label>
                                                            <input type="text" class="form-control" id="lastname" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="designation"><strong>Username</strong></label>
                                                            <input type="text" class="form-control" id="username" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mobile"><strong>Cell Number</strong></label>
                                                            <input type="text" class="form-control" id="cellnumber" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email"><strong>Email</strong></label>
                                                            <input type="email" class="form-control" id="email" placeholder="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="role"><strong>Role</strong></label>
                                                            <input type="text" class="form-control" id="role" placeholder="">
                                                        </div>
                                                        <div class="form-group mt-5">
                                                            <button type="button" id="update_particulars" class="btn btn-success mr-2">Update</button>
                                                            <button class="btn btn-outline-danger">Cancel</button>

                                                        </div>
                                                    </form>
                                                </div><!-- tab content ends -->
                                                <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="dropdown1-tab">
                                                    <div class="wrapper mb-5 mt-4">
                                                        <badge class="badge badge-warning text-white">Note : </badge>
                                                        <p class="d-inline ml-3 text-muted">Image size is limited to not greater than 1MB .</p>
                                                    </div>




                                                    <form id="imageUploadForm" action="dashboard_scripts/profile_pic_upload_handler.php" method="post">
                                                        <input type="file" name="file" class="dropify" data-max-file-size="1mb" data-default-file="images/profile_pictures/profile_placeholder.jpg"/>
                                                        <div class="form-group mt-5">
                                                            <button type="submit" id="upload_pic" class="btn btn-success mr-2">Update</button>
                                                            <button class="btn btn-outline-danger" id="remove_ppic">Remove</button>
                                                        </div>
                                                    </form>


                                                    <div id="image_preview">

                                                    </div>


                                                </div>
                                                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="dropdown2-tab">
                                                    <form action="#">
                                                        <div class="form-group">
                                                            <label for="change-password">Change password</label>
                                                            <input type="password" id="curr_pass" class="form-control"  placeholder="Enter you current password">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" id="new_pass"class="form-control" placeholder="Enter you new password">
                                                        </div>
                                                        <div class="form-group mt-5">
                                                            <button type="submit" id="update_password" class="btn btn-success mr-2">Update</button>
                                                            <button class="btn btn-outline-danger">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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

        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/chart.js/dist/Chart.min.js"></script>
        <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="../js/upload_profile_pic.js" type="text/javascript"></script>
        <script src="../js/profile_loader.js" type="text/javascript"></script>
        <script src="../js/load_notifications.js" type="text/javascript"></script>
    </body>
</html>
