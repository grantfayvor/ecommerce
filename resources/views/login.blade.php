<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Afiammuta</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="/css/pace.css" rel="stylesheet">
    <script src="/js/pace.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body data-ng-controller="UserController" data-ng-cloak data-ng-init="getHotProducts()">
    <header id="header">
        <!--header-->

        <!--<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">-->
        <nav class="navbar navbar-custom" role="navigation">
            <!-- Collapsed Hamburger -->
            <button type="button" class="btn btn-navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="header-middle" style="background-color: white;">
                <!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <!-- TODO change logo to company logo-->
                                <a href="/">
                                    <img src="images/home/logo.png" alt="Afiammuta" />
                                </a>
                            </div>
                            <!-- <div class="btn-group pull-right">
                                <div class="search_box pull-right">
                                    <input type="text" placeholder="Search" />
                                </div>
                            </div> -->

                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="/">
                                                <i class="fa fa-home"></i> Home</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->


        </nav>
        <!--/header-middle-->
    </header>
    <!--/header-->

    <section id="form" style="margin-top:2px;margin-bottom:30px;">
        <!--form-->
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li class="active">Login or create new account</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form method="post" action="/api/user/authenticate">
                            @if($errors->any())
                            <div class="row text-center">
                            <span style="color:red;">{{ $errors->first() }}</span>
                            </div>
                            <hr>
                            @endif
                            {{ csrf_field() }}
                            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required/>
                            <input type="password" name="password" placeholder="Password" required/>
                            <span>
                                <input type="checkbox" class="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="post" action="/api/user/save">
                            {{ csrf_field() }}
                            <input type="text" placeholder="First Name" name="firstName" required/>
                            <input type="text" placeholder="Last Name" name="lastName" required/>
                            <span class="pull-right" data-ng-show="phoneError" style="color:red;" data-ng-bind="phoneError"></span>
                            <input type="text" placeholder="Phone Number" data-ng-model="phoneNumber" data-ng-change="confirmPhoneNumber()" name="phoneNumber" required/>
                            <input type="email" placeholder="Email Address" name="email" required/>
                            <input type="password" name="password" placeholder="Password" required/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->


    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2>
                                <span>Afiammuta</span>
                            </h2>

                            <p>The number one stop shop for your educational materials</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3" data-ng-repeat="product in hotProducts.data">
                            <div class="video-gallery text-center">
                                <a href="javascript:void(0)" data-ng-click="productInfo(product)">
                                    <div class="iframe-img">
                                        <img data-ng-src="<% product.image_location %>" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>

                                <p>popular today</p>

                                <h2><?php echo Date('d M Y') ?></h2>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="address text-center">
                            <img src="images/home/map.png" alt="" />

                            <p>Enugu, Nigeria</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="#">Online Help</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Order Status</a>
                                </li>
                                <li>
                                    <a href="#">FAQ’s</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="#">Terms of Use</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Afiammuta</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="#">Company Information</a>
                                </li>
                                <li>
                                    <a href="#">Store Location</a>
                                </li>
                                <li>
                                    <a href="#">Copyright</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="single-widget">
                            <!-- <h2>Contact Afiammuta</h2> -->

                            <form action="/" method="get" class="searchform">
                                <input type="text" placeholder="Afiammuta" disabled />
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-arrow-circle-o-right"></i>
                                </button>
                                <p>Get the most recent educational materials from
                                    <br/>from us at Afiammuta...</p>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="social-icons pull-left">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--modal-->

        <div class="footer-bottom">
            <div class="container">
                <div class="row" style="text-align: center;">
                    <p class="pull-left">Copyright ©
                        <?php echo date("Y"); ?>
                        <a href="/">Afiammuta.com</a> All rights reserved.</p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="js/jquery.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="/app/angular.js"></script>
    <script type="text/javascript" src="/app/config/config.js"></script>
    <script type="text/javascript" src="/app/service/api-service.js"></script>
    <script type="text/javascript" src="/app/modules/user/user.js"></script>

</body>

</html>