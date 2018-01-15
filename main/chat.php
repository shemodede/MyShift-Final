<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from www.urbanui.com/titan/pages/tables/js-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2017 13:45:11 GMT -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MyShift | Team</title>
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" href="bower_components/jsgrid/dist/jsgrid.min.css" />
        <link rel="stylesheet" href="bower_components/jsgrid/dist/jsgrid-theme.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <style>
            .contacts_header
            {
                padding: 20px;
            }

            .ppic{
                width: 50px;
                height: 50px;
                border-radius: 30px;
            }
            
            
            .profile_pic_hold{
                display:inline-block;
            }

            .contact_name{
                display: inline-block;
            }
            
            
            .they_sent{
                float: left;
                display: block;
                clear: both;
                padding: 10px;
                border: solid 1px red;
                margin: 10px;
            }
            
            .i_sent{
                float: right;
                display: block;
                clear: both;
                padding: 10px;
                border: solid 1px #0074d9;
                margin: 10px;
            }
            
            .chat-modal-body{
                overflow: auto;
                height: 50%;
                
            }
            

        </style>
    </head>

    <body>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="bower_components/jsgrid/dist/jsgrid.min.js"></script>
        <script src="js/off-canvas.js"></script>

        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/js-grid.js"></script>
        <script src="js/db.js"></script>
        <script src="../js/load_notifications.js" type="text/javascript"></script>
        <script src="../js/load_profile_for_bar.js" type="text/javascript"></script>
        <script src="js/mail.js"></script>
        <script src="../js/chat_handler.js" type="text/javascript"></script>
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
                    <div class="content-wrapper p-0">
                        <!-- MAIL BODY STARTS HERE -->
                        <div class="email-wrapper wrapper col-12">
                            <div class="row">
                                <div class="mail-sidebar col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="menu-bar">
                                        <span class="logo">Chat</span>
                                        <!-- SIDE MENU END --
                                        <ul class="menu-items">
                                            <li class="compose"><a href="#"><i class="flaticon-draw"></i> Compose</a></li>
                                            <li class="active"><a href="#"><i class="flaticon-chat-3"></i> Inbox</a><span class="badges green">8</span></li>
                                            <li><a href="#"><i class="flaticon-email"></i> Sent</a></li>
                                            <li><a href="#"><i class="flaticon-work-tray"></i> Draft</a><span class="badges orange">14</span></li>
                                            <li><a href="#"><i class="flaticon-outbox"></i> Outbox</a><span class="badges red">3</span></li>
                                            <li><a href="#"><i class="flaticon-star"></i> Starred</a></li>
                                            <li><a href="#"><i class="flaticon-garbage"></i> Trash</a></li>
                                        </ul>
    
                                        <!-- CHAT LIST -->
                                        <div class="col-12">
                                            <div class="online-status d-flex justify-content-between align-items-center">
                                                <p class="chat">Chat</p>
                                                <span class="status offline online"></span>
                                            </div>
                                        </div>
                                        <ul class="mail-chats">
                                            <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face1.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">David</p>
                                                        <p class="u-designation">Python Developer</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- list person -->
                                            <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face2.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">Stella Johnson</p>
                                                        <p class="u-designation">SEO Expert</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- list person -->
                                            <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face3.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">Marina Michel</p>
                                                        <p class="u-designation">Business Development</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- list person -->
                                            <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face4.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">Edward Fletcher</p>
                                                        <p class="u-designation">UI/UX Designer</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- list person -->
                                            <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face5.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">Sophia</p>
                                                        <p class="u-designation">Business Development</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- list person -->
                                            <li class="chat-persons">
                                                <a href="#">
                                                    <span class="pro-pic"><img src="images/faces/face6.jpg" alt=""></span>
                                                    <div class="user">
                                                        <p class="u-name">Gabriel</p>
                                                        <p class="u-designation">UI/UX Designer</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- list person -->
                                        </ul>
                                        <hr>
                                        <h3 class="contacts_header">Contacts</h3>
                                        <!-- CHAT -->
                                        <ul class="mail-chats" id="contacts_tab">

                                        </ul>
                                        <!-- SIDE MENU END -->
                                    </div>
                                </div>
                                <!-- side bar ends -->
                                <div class="mail-body col-lg-9 col-md-9 col-sm-12 col-12 pt-5">

                                    <!-- HEADER -->
                                    <div class="row body-header">
                                        <div class="container w-100">
                                            <div class="header-top row pl-5">
                                                <div class="col-8 search-wrapper wrapper d-flex">
                                                    <input class="form-control mail-search" type="search" placeholder="Search mail" id="Mail-rearch">
                                                    <input class="btn" type="submit" value="Find">
                                                </div>
                                            </div>
                                            <div class="checkbox-wrapper selectall-checkbox-btn">
                                                <input class="checkbox-dib" type="checkbox" id="select-all-check-box">
                                                <label for="select-all-check-box"> Select all</label>
                                                <i class="flaticon-garbage"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- HEADER -->


                                    <div class="modal fade bd-example-modal-lg chat_modal" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog chat_modal_dialog modal-lg">
                                            <div class="modal-content">
                                                <input id="contac_id" hidden="hidden" type="text" />
                                                <div class="modal-header">
                                                    <div id="chat_window_title">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="chat-modal-body" id="chat-messages-body">
                                                    <p id="placehold_messages" align="center">No Messages</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <textarea id="message_text" rows="1" cols="100%"></textarea>
                                                    <button type="button" id="send_text" class="btn btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mail-container" id="chats_view_holder">
                                        <div class="col-12 p-0">
                                            <div class="mail-list">
                                                <div class="checkbox-wrapper label-clone">
                                                    <div class="profile_pic_hold">
                                                        <span class="pro-pic "><img class="ppic" src="images/faces/face6.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p class="sender-name">David</p>
                                                    <p class="message_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est quod accusamus tempore perspiciatis sint odit doloremque hic reiciendis, vel illum.</p>
                                                </div>
                                                <div class="details">
                                                    <p class="date">3 Hr ago</p>
                                                    <i class="flaticon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- mail list ends -->

                                    </div>
                                </div>
                                <!-- MAIL BODY -->
                            </div>
                            <!-- ROW ENDS -->
                        </div>
                        <!-- WRAPPER-ENDS -->
                        <!-- MAIL BODY ENDS HERE-->
                    </div>
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="float-right">
                                <a href="#">MyShift Admin</a> &copy; 2017
                            </span>
                        </div>
                    </footer>
                </div>
            </div>

        </div>


    </body>
</html>

