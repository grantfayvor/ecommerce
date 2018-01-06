<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Afiammuta | Profile</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/pace.css" rel="stylesheet">
    <script src="/js/pace.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body data-ng-controller="UserController" data-ng-init="initialize();getCurrentUser();">
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
                                <!-- TODO change logo -->
                                <a href="/">
                                    <img src="images/home/logo.png" alt="Afiammuta logo" />
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="search_box pull-right">
                                    <input type="text" placeholder="Search" />
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        @if(!$username)
                                        <li class="dropdown">
                                            <a href="#">
                                                <i class="fa fa-user"></i> Account
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul role="menu" class="sub-menu">
                                                <li>
                                                    <a href="/login" style="background-color: inherit!important;">
                                                        <i class="fa fa-sign-in"></i> Sign in</a>
                                                </li>
                                                <li>
                                                    <a href="/register" style="background-color: inherit!important;">
                                                        <i class="fa fa-user"></i> Create Account</a>
                                                </li>
                                            </ul>
                                        </li>
                                        @else
                                        <li class="dropdown">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-user"></i> {{ $username }}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul role="menu" class="sub-menu">
                                                @if($admin)
                                                <li>
                                                    <a href="/admin/dashboard" style="background-color: inherit!important;">
                                                        <i class="fa fa-dashboard"></i> Admin Dashboard</a>
                                                </li>
                                                @endif
                                                <li>
                                                    <a href="/profile" style="background-color: inherit!important;">
                                                        <i class="fa fa-eye"></i> Profile</a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: inherit!important;">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/logout" style="background-color: inherit!important;">
                                                        <i class="fa fa-power-off"></i> Sign Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                        @endif
                                        <!--<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>-->
                                        <li>
                                            <a href="/checkout">
                                                <i class="fa fa-crosshairs"></i> Checkout</a>
                                        </li>
                                        <li>
                                            <a href="/cart">
                                                <i class="fa fa-shopping-cart" style="float:left;"></i>
                                                <span style="float:left;"> Cart </span>
                                                <i data-ng-if="cartCount" style="display: block;height: 18px;width: 18px;line-height: 18px;-moz-border-radius: 50%;
                                                    border-radius: 50%;background-color: black;color: white;text-align: center;font-size: 1em;float:right;"
                                                    data-ng-bind="cartCount"></i>
                                            </a>
                                        </li>
                                        @if($username)
                                        <li>
                                            <a href="/logout">
                                                <i class="fa fa-power-off"></i> Sign out</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->


        </nav>

    </header>
    <!--/header-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li class="active">Profile</li>
                        </ol>
                    </div>
                    <div id="updateAlert" class="text-center alert alert-info" style="margin-left:auto;margin-right:auto;width:50%;background-color:#FE980F;color:white" data-ng-bind="updateMessage">
                    </div>
                    <div class="category-tab shop-details-tab">
                        <!--category-tab-->
                        <!-- <div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div> -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <div class="clearfix"></div>
                                    <ul>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-user"></i>
                                                <span>{{ $username }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-calendar-o"></i>
                                                <?php echo date('d, M Y') ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <p> -->
                                    <b>Edit your profile</b>
                                    </p>

                                    <form novalidate>
                                        <span>
                                            <input type="text" placeholder="Your Name" data-ng-model="user.name" required/>
                                            <input type="email" placeholder="Email Address" data-ng-model="user.email" required/>
                                        </span>
                                        <br>
                                        <span>
                                            <input style="margin-left:0%;" type="text" placeholder="Your phone number" data-ng-model="user.phone_number" required/>
                                        </span>
                                        <br>
                                        <span>
                                            <input type="password" placeholder="Old password" data-ng-model="user.oldPassword" required/>
                                            <input type="password" placeholder="New password or leave empty" data-ng-model="user.newPassword" />
                                        </span>
                                        <br>
                                        <hr>
                                        <b>Rating: </b>
                                        <img src="images/product-details/rating.png" alt="" />
                                        <button type="submit" data-ng-click="updateUser()" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

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
                                <a href="#">
                                    <div class="iframe-img">
                                        <img data-ng-src="../<% product.image_location %>" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>

                                <p>popular today</p>

                                <h2>24 DEC 2017</h2>
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
                            <h2>Contact Afiammuta</h2>

                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
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

    </footer>
    <!--/Footer-->


    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/price-range.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript" src="/app/angular.js"></script>
    <script type="text/javascript" src="/app/config/config.js"></script>
    <script type="text/javascript" src="/app/service/api-service.js"></script>
    <script type="text/javascript" src="/app/modules/user/user.js"></script>
</body>

</html>