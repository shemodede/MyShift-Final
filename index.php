<?php
session_start();
?>
<!doctype html>
<html>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>MyShift |Home</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/slick.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="js/main.js"></script>
        <div id="header-holder">
            <div class="bg-animation"></div>
            <nav id="nav" class="navbar navbar-default navbar-full">
                <div class="container-fluid">
                    <div class="container container-nav">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="navbar-header">
                                    <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="logo-holder" href="index.html">
                                        <div class="logo" style="width:219px;height:124px"></div>
                                    </a>
                                </div>
                                <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
                                    <ul class="nav navbar-nav navbar-right" style="padding-top:30px">
                                        <li><a href="index.html">Home</a></li>
                                        <li class="dropdown mega">
                                            <a href="">Product <i class="fa fa-caret-down"></i></a>
                                            <ul class="dropdown-menu dropdown-mega">
                                                <li>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <a class="mega-link" href="attendance.html">
                                                                    <div class="mega-box m-color1">
                                                                        <div class="mega-icon">
                                                                            <i class="htfy htfy-technology"></i>
                                                                        </div>
                                                                        <div class="mega-title">
                                                                            Attendence reports
                                                                        </div>
                                                                        <div class="mega-details">
                                                                            Generate reports at any time pertaining attendance
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a class="mega-link" href="scheduling.html">
                                                                    <div class="mega-box m-color2">
                                                                        <div class="mega-icon">
                                                                            <i class="htfy htfy-cloud"></i>
                                                                        </div>
                                                                        <div class="mega-title">
                                                                            Shift scheduling
                                                                        </div>
                                                                        <div class="mega-details">
                                                                            Schedule shifts according to your business needs
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a class="mega-link" href="resource.html">
                                                                    <div class="mega-box m-color3">
                                                                        <div class="mega-icon">
                                                                            <i class="htfy htfy-computer"></i>
                                                                        </div>
                                                                        <div class="mega-title">
                                                                            Resource Management
                                                                        </div>
                                                                        <div class="mega-details">
                                                                            Manage your resources better and keep records 
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        <!--li><a href="#whmcs">WHMCS</a></li-->
                                        <li><a href="contact.html">Contact us</a></li>
                                        <li><a class="login-button" href="signin.php">Login</a></li>
                                        <li class="support-button-holder support-dropdown">
                                            <a class="support-button" href="#">Support</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#"><i class="fa fa-phone"></i>Tel +27 87 357 7004</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i>Start a Live Chat</a></li>
                                                <li><a href="#"><i class="fa fa-ticket"></i>Open a ticket</a></li>
                                                <li><a href="#"><i class="fa fa-book"></i>Knowledge base</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <script>
                $(document).ready(function () {
                    $.ajax({
                        url: 'get_company_names.php',
                        type: 'post',
                        success: function (result) {
                            var company_names_array = [];
                            company_names_array = JSON.parse(result);
                            $('#domain-text').autocomplete({
                                source: company_names_array
                            });

                        }
                    })
                });
            </script>
            <div id="top-content" class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="big-title">Join your team and get notified of shift changes in realtime<br>
                                with <span>Myshift.</span></div>
                            <div class="domain-search-holder">

                                <form id="domain-search" autocomplete="on">
                                    <input id="domain-text" type="text" name="domain" placeholder="Find your team" />


                                    <span class="inline-button">
                                        <input id="search-btn" type="button" name="submit" value="Go">
                                    </span>
                                </form>
                                <script>
                                    $(document).ready(function () {
                                        $('#search-btn').click(function () {
                                            var team_name;
                                            team_name = $('#domain-text').val();
                                            if (team_name.length === 0) {
                                                alert("Please insert your team name.");
                                            } else {
                                                alert("Going in");
                                                $.ajax({
                                                    url: 'save_company_info.php',
                                                    type: 'post',
                                                    data: {company_name: team_name},
                                                    success: function (result) {
                                                        if (result === "okay") {
                                                            window.location = "http://localhost/MyShift/signup.php";
                                                        }
                                                    }
                                                })
                                            }
                                        });
                                    });
                                </script>
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="arrow-button-holder">
                                <a href="#pricing">
                                    <div class="button-text">Pricing Plans</div>
                                    <div class="arrow-icon">
                                        <i class="htfy htfy-arrow-down"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="info" class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-text">When you need to keep your team informed of schedule changes and meetings and get realtime responses on the effect of the new changes, Myshift takes care of that.</div>

                        <a href="signup.php" class="ybtn ybtn-accent-color ybtn-shadow">Create Your Account</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="services" class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row-title">Our Services</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/service-icon1.png" alt="">
                            </div>
                            <div class="service-title"><a href="webhosting.html">Attendence reports</a></div>
                            <div class="service-details">
                                <p>Track your employee attendance trends and make informed decisions
                                    at the click of one button you can track employee monthly attendace
                                    .</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/service-icon2.png" alt="">
                            </div>
                            <div class="service-title"><a href="#">Hours worked</a></div>
                            <div class="service-details">
                                <p>Generate the number of hours worked by each employee easily with Myshift for payroll purpose, no more wasting time counting hours manually.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/service-icon3.png" alt="">
                            </div>
                            <div class="service-title"><a href="vpshosting.html">Resource management</a></div>
                            <div class="service-details">
                                <p>Notify your employees easily about resources assigned to them and how to take care of them, what to take and where to go.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/service-icon4.png" alt="">
                            </div>
                            <div class="service-title"><a href="cloudhosting.html">Schedule management</a></div>
                            <div class="service-details">
                                <p>Reach your employees, with one click they can be notified on their mobile phones using Myshift push notification service about any schedule changes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="message1" class="container-fluid message-area">
            <div class="bg-color"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="text-other-color1">Are you ready?</div>
                        <div class="text-other-color2">create an account, or contact us.</div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="buttons-holder">
                            <a href="signup.html" class="ybtn ybtn-accent-color">Create Your Account</a><a href="contact.html" class="ybtn ybtn-white ybtn-shadow">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div   id="custom-plan" class="container-fluid">
            <div id="pricing"  class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Pricing Plan</h4>
                        <p>Below is an indication on how little your we charge to help your business grow and improve efficiency.</p>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-plan-box">
                            <input id="c-plan" type="text" data-slider-min="100" data-slider-max="10000" data-slider-step="100" data-slider-value="5000" data-currency="R" data-unit="Users">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="testimonials" class="container-fluid">
            <div class="bg-color"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row-title">Testimonials</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div id="testimonials-slider">
                            <div>
                                <div class="details-holder">
                                    <img class="photo" src="images/person1.jpg" alt="">
                                    <h4>Chris Walker</h4>
                                    <h5>CEO & CO-Founder @HelloBrandio</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae odio eget orci finibus auctor ut eget magna.</p>
                                </div>
                            </div>
                            <div>
                                <div class="details-holder">
                                    <img class="photo" src="images/person2.jpg" alt="">
                                    <h4>Chris Walker</h4>
                                    <h5>CEO & CO-Founder @HelloBrandio</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae odio eget orci finibus auctor ut eget magna.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="more-features" class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row-title">Our Promise</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="mfeature-box">
                            <div class="mfeature-icon">
                                <i class="htfy htfy-tick"></i>
                            </div>
                            <div class="mfeature-title">%100 Uptime</div>
                            <div class="mfeature-details">We pride ourselves on the quality of our services and we can make such a promise.</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mfeature-box">
                            <div class="mfeature-icon">
                                <i class="htfy htfy-tick"></i>
                            </div>
                            <div class="mfeature-title">Money Back Guarantee</div>
                            <div class="mfeature-details">Should we not live up to our promise, expected delivarables we guarantee your money back.</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="mfeature-box">
                            <div class="mfeature-icon">
                                <i class="htfy htfy-tick"></i>
                            </div>
                            <div class="mfeature-title">Best Support</div>
                            <div class="mfeature-details">We provide 24 hour support to all our users big and small old and new.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="message2" class="container-fluid message-area normal-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="text-other-color1">Are you ready?</div>
                        <div class="text-other-color2">create an account, or contact us.</div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="buttons-holder">
                            <a href="signup.html" class="ybtn ybtn-accent-color">Create Your Account</a><a href="contact.html" class="ybtn ybtn-white ybtn-shadow">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer" class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="address-holder">
                            <div class="phone"><i class="fa fa-phone"></i> +27 87 357 7004</div>
                            <div class="email"><i class="fa fa-envelope"></i> <a href="" class="__cf_email__" data-cfemail="88e0ede4e4e7c8e0e7fbfce1eef1a6ebe7e5">[email&#160;protected]</a></div>
                            <div class="address">
                                <i class="fa fa-map-marker"></i> 
                                <div>CLower Chester Rd,<br>
                                    Sunnyridge, East London,<br>
                                    South Africa.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2 col-md-2">
                        <div class="footer-menu-holder">
                            <h4>Company</h4>
                            <ul class="footer-menu">
                                <li><a href="about.html">About us</a></li>
                                <li><a href="blog.html">News</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2 col-md-3">
                        <div class="footer-menu-holder">
                            <h4>Product</h4>
                            <ul class="footer-menu">
                                <li><a href="attendance.html">Attendence reports</a></li>
                                <li><a href="scheduling.html">Shift scheduling</a></li>
                                <li><a href="resource.html">Resource management</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="footer-menu-holder">
                            <h4>Get Myshift</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Transfer domains</a></li>
                                <li><a href="portal.html">Customer Portal</a></li>
                                <li><a href="#">Video Tutorials</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-md-1">
                        <div class="social-menu-holder">
                            <ul class="social-menu">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>!function (e, t, r, n, c, a, l) {
                function i(t, r) {
                    return r = e.createElement('div'), r.innerHTML = '<a href="' + t.replace(/"/g, '&quot;') + '"></a>', r.childNodes[0].getAttribute('href')
                }
                function o(e, t, r, n) {
                    for (r = '', n = '0x' + e.substr(t, 2) | 0, t += 2; t < e.length; t += 2)
                        r += String.fromCharCode('0x' + e.substr(t, 2) ^ n);
                    return i(r)
                }
                try {
                    for (c = e.getElementsByTagName('a'), l = '/cdn-cgi/l/email-protection#', n = 0; n < c.length; n++)
                        try {
                            (t = (a = c[n]).href.indexOf(l)) > -1 && (a.href = 'mailto:' + o(a.href, t + l.length))
                        } catch (e) {
                        }
                    for (c = e.querySelectorAll('.__cf_email__'), n = 0; n < c.length; n++)
                        try {
                            (a = c[n]).parentNode.replaceChild(e.createTextNode(o(a.getAttribute('data-cfemail'), 0)), a)
                        } catch (e) {
                        }
                } catch (e) {
                }
            }(document);</script>
    </body>


</html>