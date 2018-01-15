<?php

session_start();
include 'config.php';

$company_id = $_SESSION['user_info'][6];

$get_announcements = "SELECT * FROM announcements WHERE company_id = '$company_id'";
$get_announcements_result = mysqli_query($db, $get_announcements);
$result = "";
if ($get_announcements_result) {
    while ($row = $get_announcements_result->fetch_assoc()) {
        $annc_id = $row['announce_id'];
        $title = $row['title'];
        $message = $row['message'];
        $poster = $row['poster_id'];
        $time_posted = $row['timestamp'];

        $get_poster_name = "SELECT first_name, last_name FROM personnel WHERE company_id = '$company_id' AND personnel_id = '$poster'";
        $get_poster_name_res = mysqli_query($db, $get_poster_name);

        if ($get_poster_name_res) {
            while ($row = $get_poster_name_res->fetch_assoc()) {
                $poster_name = $row['first_name'] . " " . $row['last_name'];

                $result .= '<li>'
                        . '<h5 class="name">'.$title.'</h5>'
                        . '<p class="">'.$message.'</p>   <div class="col-md-12"><button class="btn">Delete</button></div>'
                        . '<br><span class="col-2">'.$poster_name.'</span><span class="col-xs-11">'.$time_posted.'</span>'
                        . '</li>';
            }
        }

        
    }
    echo $result;
} else {
    echo mysqli_error($db);
}



/*
<li>
                                                          
 * 
 * 
 * <h5 class="name">Jonny Stromberg</h5>
                                                <p class="born">1986</p>
 * 
 * 
 *   <div class="row details">
                                                                <div class="profile"><img src="images/faces/face6.jpg" alt=""></div>
                                                                <div class="t-content">
                                                                    <div class="sender-content">
                                                                        <p class="sender-name">James :</p>
                                                                        <p class="ticket-no">[#23047]</p>
                                                                        <p class="subject">Lorem ipsum dolor sit amet, consectetur.</p>
                                                                    </div>
                                                                    <div class="message">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, tenetur.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="btn-group dropdown actions">
                                                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Manage
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-history fa-fw"></i>Another action</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row time-hist">
                                                                <p class="Last-responded">3 hours ago</p>
                                                                <p class="due-on">3 Days</p>
                                                            </div>
                                                        </li>
 *  */
