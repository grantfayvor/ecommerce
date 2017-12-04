<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <title>E-commerce</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
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

<body data-ng-controller="MainController">
<header id="header">
    <!--header-->

    <!--<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">-->
    <nav class="navbar navbar-custom" role="navigation">
        <!-- Collapsed Hamburger -->
        <button type="button" class="btn btn-navbar navbar-toggle collapsed" data-toggle="collapse"
                data-target="#app-navbar-collapse">
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
                            <a href="/"><img src="images/home/logo.png" alt="e-shopper logo"/></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown"><a href="#"><i class="fa fa-user"></i> Account <i
                                                    class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="/login" style="background-color: inherit!important;"><i
                                                            class="fa fa-sign-in"></i> Sign in</a></li>
                                            <li><a href="/register" style="background-color: inherit!important;"><i
                                                            class="fa fa-user"></i> Create Account</a></li>
                                        </ul>
                                    </li>
                                    <!--<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>-->
                                    <li><a href="/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="/logout"><i class="fa fa-power-off"></i> Sign out</a></li>
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

<section id="slider" data-ng-init="initialize()">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="<% $index %>"
                            data-ng-repeat="p in hotProducts" data-ng-class="{'active': $first}"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item" data-ng-repeat="product in hotProducts" data-ng-class="{'active': $first}">
                            <div class="col-sm-6">
                                <h1 data-ng-bind="product.name"></h1>

                                <h2 data-ng-bind="product.brand"></h2>

                                <p data-ng-bind="product.description"></p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img data-ng-src="<%product.image_location%>" style="height: 100%;"
                                     class="girl img-responsive"
                                     alt=""/>
                                <img src="../images/home/pricing.png" style="width: 25%; height: 50%;" class="pricing"
                                     alt=""/>
                            </div>
                        </div>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="javascript:void(0)" data-ng-click="getAllPhones()"
                                                  data-toggle="tab">Phones</a></li>
                            <li><a href="javascript:void(0)" data-ng-click="getAllLaptops()"
                                   data-toggle="tab">Laptops</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt">
                            <div class="col-sm-3" data-ng-repeat="product in products">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img data-ng-src="<%product.image_location%>" alt="product image"
                                                 style="height:200px;"/>

                                            <h2>₦ <span data-ng-bind="product.selling_price"></span></h2>

                                            <p data-ng-bind="product.name"></p>
                                            <a href="javascript:void(0)" data-ng-click="addToCart(product)"
                                               class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/category-tab-->

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item" data-ng-repeat="product in recommendedProducts"
                                 data-ng-class="{'active': $index < 4}">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img data-ng-src="<%product.image_location%>" alt="product image"
                                                     style="height:200px;"/>

                                                <h2>₦ <span data-ng-bind="product.selling_price"></span></h2>

                                                <p data-ng-bind="product.name"></p>
                                                <a href="javascript:void(0)" data-ng-click="addToCart(product)"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add
                                                    to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

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
                        <h2><span>e</span>-shopper</h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>popular today</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe2.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>popular today</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe3.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>popular today</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe4.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                            <p>popular today</p>

                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address text-center">
                        <img src="images/home/map.png" alt=""/>

                        <p>Lagos, Nigeria</p>
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
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>

                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Get the most recent updates from <br/>our site and be updated your self...</p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="social-icons pull-left">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--modal-->
    <div id="cartModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label>The product was successfully added to cart</label></div>
                </div>
                <div class="modal-footer"><a href="#" data-dismiss="modal" class="btn btn-info">Ok</a></div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row" style="text-align: center;">
                <p>Copyright © 2013 <a href="#">E-SHOPPER</a> Inc. All rights reserved. <a
                            href="tel://+2348020188821"><i class="fa fa-phone"></i> +2348020188821</a></p>
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
<script type="text/javascript" src="/app/main.js"></script>
</body>

</html>