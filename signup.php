<?php
    session_start();
   
?>
<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>MyShift | Sign Up</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/slick.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body class="fullpage">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/main.js"></script>
        <div id="form-section" class="container-fluid signup">
            <div class="website-logo">
                <a href="index.php">
                    <div class="logo" style="width:62px;height:18px"></div>
                </a>
            </div>
            <div class="row">
                <div class="info-slider-holder">
                    <div class="bg-animation"></div>
                    <div class="info-holder">
                        <h6>Team:</h6>
                        <div class="bold-title"><span><?php 
                            echo $_SESSION['company_info'][1];
                            
                        ?></span></div>
                        <!--<div class="mini-testimonials-slider">--
                            <div>
                                <div class="details-holder">
                                    <img class="photo" src="images/person1.jpg" alt="">
                                    <h4>Chris Walker</h4>
                                    <h5>CEO & CO-Founder @HelloBrandio</h5>
                                    <p>“In hostify we trust. I am with them for over
                                        7 years now. It always felt like home!
                                        Loved their customer support”</p>
                                </div>
                            </div>
                            <div>
                                <div class="details-holder">
                                    <img class="photo" src="images/person2.jpg" alt="">
                                    <h4>Chris Walker</h4>
                                    <h5>CEO & CO-Founder @HelloBrandio</h5>
                                    <p>“In hostify we trust. I am with them for over
                                        7 years now. It always felt like home!
                                        Loved their customer support”</p>
                                </div>
                            </div>
                        <!--</div>-->
                    </div>
                </div>
                <div class="form-holder">
                    <div class="menu-holder">
                        <ul class="main-links">
                            <li><a class="normal-link" href="signin.php">You have an account?</a></li>
                            <li><a class="sign-button" href="signin.php">Sign in</a></li>
                        </ul>
                    </div>
                    <div class="signin-signup-form">
                        <div class="form-items">
                            <div class="form-title">Sign up for new account</div>
                            <form id="signupform">
                                <div class="row">
                                    <div class="col-md-6 form-text">
                                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                                    </div>
                                    <div class="col-md-6 form-text">
                                        <input type="text" name="lastname" id="lastname" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="form-text">
                                    <input type="text" name="email" id="email" placeholder="E-mail Address" required>
                                </div>
                                <div class="form-text">
                                    <input type="tel" name="cell" id="cellnumber" placeholder="Cell Number" required>
                                </div>
                                <div class="form-text">
                                    <input type="text" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="form-text">
                                    <input type="password" name="password" id="password" placeholder="Password" required>
                                </div>
                                <!--<div class="form-text text-holder">
                                    <span class="text-only">Preferred method of payment.</span>
                                    <input type="radio" name="pmethod" class="hno-radiobtn" id="rad1"><label for="rad1">Paypal</label>
                                    <input type="radio" name="pmethod" class="hno-radiobtn" id="rad2"><label for="rad2">Credit Card</label>
                                </div>-->
                                <div class="form-button">
                                    <button id="submit" type="button" class="ybtn ybtn-accent-color">Create new account</button>
                                </div>
                                <script>
                                    $('#submit').click(function(){
                                        var firstname = $('#firstname').val();
                                        var lastname = $('#lastname').val();
                                        var username = $('#username').val();
                                        var password = $('#password').val();
                                        var email = $('#email').val();
                                        var cellnum = $('#cellnumber').val();
                                        
                                        $.ajax({
                                           url: 'save_new_user.php',
                                           type: 'post',
                                           data:{firstname: firstname, lastname: lastname, username: username, password: password, cellnumber: cellnum, email: email},
                                           success: function(result){
                                               if(result === "success")
                                               {
                                                   alert("Your request has been sent to your team admin.. keep an eye out for the acceptance..")
                                               }
                                           }
                                        });
                                    });
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>

    <!-- Mirrored from brandio.io/envato/hostify/html/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Sep 2017 12:55:35 GMT -->
</html>
