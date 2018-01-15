<!doctype html>
<html>

    <!-- Mirrored from brandio.io/envato/hostify/html/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Sep 2017 12:55:34 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>MyShift |Login</title>
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
        <div id="form-section" class="container-fluid signin">
            <div class="website-logo">
                <a href="index.php">
                    <div class="logo" style="width:219px;height:124px"></div>
                </a>
            </div>
            <div class="row">
                <div class="info-slider-holder">
                    <div class="bg-animation"></div>
                    <div class="info-holder">
                        <h6>A Service you can anytime modify.</h6>
                        <div class="bold-title">it’s not that hard to get<br>
                            a website <span>anymore.</span></div>
                        <div class="mini-testimonials-slider">
                            <div>
                                <div class="details-holder">
                                    <img class="photo" src="images/person1.jpg" alt="">
                                    <h4>Chris Walker</h4>
                                    <h5>CEO & CO-Founder @HelloBrandio</h5>
                                    <p>“In MyShift we trust. I've been with them for over
                                        7 months now. It always feels like home!
                                        I Love their customer support”</p>
                                </div>
                            </div>
                            <div>
                                <div class="details-holder">
                                    <img class="photo" src="images/person2.jpg" alt="">
                                    <h4>Chris Walker</h4>
                                    <h5>CEO & CO-Founder @HelloBrandio</h5>
                                    <p>“In MyShift we trust. I've been with them for over
                                        7 months now. It always feels like home!
                                        I Love their customer support”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-holder">
                    <div class="menu-holder">
                        <ul class="main-links">
                            <li><a class="normal-link" href="signup.html">Don’t have an account?</a></li>
                            <li><a class="sign-button" href="signup.html">Sign up</a></li>
                        </ul>
                    </div>
                    <div class="signin-signup-form">
                        <div class="form-items">
                            <div class="form-title">Sign in to your account</div>
                            <form>
                                <div class="form-text">
                                    <input type="text" id="username" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-text">
                                    <input type="password" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-button">
                                    <button id="submit" type="button" class="ybtn ybtn-accent-color">Sign in</button>
                                </div>
                            </form>
                            <script>
                                $(document).ready(function () {
                                    $('#submit').click(function () {
                                        var username = $('#username').val();
                                        var password = $('#password').val();

                                        if (username === "") {
                                            alert("Username cannot be blank");
                                        }
                                        if (password === "") {
                                            alert("Password cannot be blank");
                                        }
                                        if (username !== "" && password !== "") {
                                            $.ajax({
                                                url: 'script_login.php',
                                                data: {username: username, password: password},
                                                async: true,
                                                type: 'post',
                                                success: function (result) {
                                                    if (result === "success") {
                                                        window.location = "http://localhost/MyShiftNew/main/index.php";
                                                    } else {
                                                        alert(result);
                                                    }
                                                }

                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
