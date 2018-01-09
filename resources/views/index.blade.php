<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Afiammuta</title>
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

<body data-ng-controller="MainController">
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
                                    <input type="text" placeholder="Search" data-ng-model="searchParam" data-ng-change="searchByParam()" />
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right" data-ng-show="page != 'product-details'">
                    <div class="category-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="javascript:void(0)" data-ng-click="getAllBooks()" data-toggle="tab">Books</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="getAllCards()" data-toggle="tab">Cards</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="getAllCharts()" data-toggle="tab">Charts</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="getAllLearningAids()" data-toggle="tab">Learning Aids</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt">
                                <div class="col-sm-3" data-ng-repeat="product in products.data">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="javascript:void(0)" data-ng-click="productInfo(product)">
                                                    <img data-ng-src="<%product.image_location%>" alt="product image" style="height:200px;" />

                                                    <h2>₦
                                                        <span data-ng-bind="product.selling_price"></span>
                                                    </h2>

                                                    <p data-ng-bind="product.name"></p>
                                                </a>
                                                <a href="javascript:void(0)" data-ng-click="addToCart(product)" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center" data-ng-show="products.next_page_url || products.prev_page_url">
                        <ul class="pagination" style="background-color:white!important;">
                            <li>
                                <a href="javascript:void(0)" data-ng-click="previousPage(products.prev_page_url)">Previous</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-ng-click="nextPage(products.next_page_url)">Next</a>
                            </li>
                        </ul>
                    </div>
                    <!--/category-tab-->

                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div id="<% $index %>" class="item" data-ng-repeat="product in recommendedProducts.data" data-ng-class="{'active': $index < 4}">
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="javascript:void(0)" data-ng-click="productInfo(product)">
                                                        <img data-ng-src="<%product.image_location%>" alt="product image" style="height:200px;" />
                                                        <h2>₦
                                                            <span data-ng-bind="product.selling_price"></span>
                                                        </h2>

                                                        <p data-ng-bind="product.name"></p>
                                                    </a>
                                                    <a href="javascript:void(0)" data-ng-click="addToCart(product)" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
                <div class="col-sm-12 padding-right" data-ng-show="page == 'product-details'">

                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li>
                                <a href="javascript:void(0)" data-ng-click="page = 'products'">Home</a>
                            </li>
                            <li class="active" data-ng-bind="currentProduct.name"></li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                    <div class="category-tab">
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="product-details">
                                <div class="col-sm-12">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <div class="col-sm-6 col-md-6">
                                                    <img data-ng-src="<%currentProduct.image_location%>" alt="product image" style="height:500px;" />
                                                </div>
                                                <div class="col-sm-6 col-md-6" style="position: relative;">
                                                    <p style="position: absolute; top: 50%; transform: translateY(-50%);">
                                                        <h2>₦
                                                            <span data-ng-bind="currentProduct.selling_price"></span>
                                                        </h2>

                                                        <h3 data-ng-bind="currentProduct.name"></h3>
                                                        <p data-ng-bind="currentProduct.details"></p>
                                                        <a href="javascript:void(0)" data-ng-click="addToCart(currentProduct)" class="btn btn-default add-to-cart">
                                                            <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)" data-ng-click="page = 'products'">Home</a>
                            </li>
                            <li class="breadcrumb-item active" data-ng-bind="currentProduct.name">
                            </li>
                        </ol>
                    </nav>
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
        <div id="cartModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Success</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>The product was successfully added to cart</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart">Ok</a>
                    </div>
                </div>
            </div>
        </div>

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

    <style>
        .my-circle {
            display: block;
            height: 60px;
            width: 60px;
            line-height: 60px;

            -moz-border-radius: 30px;
            /* or 50% */
            border-radius: 30px;
            /* or 50% */
            background-color: black;
            color: white;
            text-align: center;
            font-size: 2em;
        }
    </style>


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