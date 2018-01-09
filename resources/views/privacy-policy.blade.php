<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Privacy Policy | Afiammuta</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
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

<body data-ng-controller="UtilityController">
    <header id="header" data-ng-init="initialize()">
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

    <div id="contact-page" class="container">
        <div class="bg">
            <!-- <div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div> -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-form">
                        <h2 class="title text-center">Privacy Policy</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <div class="category-tab shop-details-tab">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    <div class="col-sm-12">
                                        This is the privacy policy page and it is expected to be edited with the company's privacy policy.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/#contact-page-->

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
                            <h2>Afiammuta</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <!-- <li>
                                    <a href="/company-info">Company Information</a>
                                </li> -->
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#storeLocationModal">Store Location</a>
                                </li>
                                <li>
                                    <a href="/terms-of-use">Terms of Use</a>
                                </li>
                                <li>
                                    <a href="/privacy-policy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="/refund-policy">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="/contact-us">Contact Us</a>
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

        <div id="storeLocationModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Afiammuta</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Find us at Enugu, Nigeria.</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart">Ok</a>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript" src="/app/angular.js"></script>
    <script type="text/javascript" src="/app/config/config.js"></script>
    <script type="text/javascript" src="/app/service/api-service.js"></script>
    <script type="text/javascript" src="/app/utility.js"></script>
</body>

</html>