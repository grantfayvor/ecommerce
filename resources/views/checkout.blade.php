<!DOCTYPE html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | Afiammuta</title>
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

<body data-ng-controller="CartController" data-ng-cloak>
    <header id="header" data-ng-init="initialize()">
        <!--header-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

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

                    </div>
                    <div class="col-sm-8">
                        <div class="mainmenu pull-right">
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
                                                <a href="/logout" style="background-color: inherit!important;">
                                                    <i class="fa fa-power-off"></i> Sign Out</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="/checkout">
                                            <i class="fa fa-crosshairs"></i> Checkout</a>
                                    </li>
                                    <li>
                                        <a href="/cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Cart</span>
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
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-ng-repeat="product in cart.data">
                            <td class="cart_product">
                                <a href="">
                                    <img data-ng-src="<%product.options.image_location%>" style="height:40px;width:40px;padding:0px 0px 0px;" alt="product image">
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="">
                                        <span data-ng-bind="product.name"></span>
                                    </a>
                                </h4>
                                <!-- <p>Web ID: 1089772</p> -->
                            </td>
                            <td class="cart_price">
                                <p>₦
                                    <span data-ng-bind="product.price"></span>
                                </p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input id="quantity_value<%$index%>" class="cart_quantity_input" style="width:20%!important" type="number" data-ng-model="productToUpdate.qty"
                                        name="quantity" value="<% product.qty %>" data-ng-change="updateProductInCart(product.rowId, $index)" min="1">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">₦
                                    <span data-ng-bind="product.price * product.qty"></span>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="javascript:void(0)" data-ng-click="removeFromCart(product.rowId)">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="col-sm-6">
                                    <div class="chose_area">
                                        <ul class="user_option">
                                            <li>Delivery address
                                                <span>
                                                    <input type="text" class="form-control" placeholder="Enter your delivery address here" name="deliveryAddress" data-ng-model="sale.deliveryAddress"/>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Cart Sub Total</td>
                                        <td>
                                            <span>₦
                                                <span data-ng-bind="cart.total_price"></span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Delivery Cost</td>
                                        <td>₦ 0</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>
                                            <span>₦
                                                <span data-ng-bind="cart.total_price"></span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                <div class="row" style="margin-bottom:40px;">
                                                    <div class="col-md-8 col-md-offset-2">

                                                        <input type="hidden" name="deliveryAddress" value="<% sale.deliveryAddress %>" required >
                                                        <input type="hidden" name="email" value="{{ $email }}" required> {{-- required email of the user making payments --}}
                                                        <input type="hidden" name="orderID" value="<% orderId %>" required>
                                                        <input type="hidden" name="amount" value="<% cart.total_price * 100 %>" required> {{-- required in kobo --}}
                                                        <input type="hidden" name="quantity" value="<% cartCount %>" required>
                                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}" required> {{-- required --}}
                                                        <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}" required> {{-- required --}} {{ csrf_field() }} {{-- works only when using
                                                        laravel 5.1, 5.2 --}}

                                                        <p>
                                                            <button class="btn btn-primary" data-ng-disabled="cart.total_price <= 0" type="submit" value="Pay Now!">
                                                                <i class="fa fa-credit-card"></i> Pay Now!
                                                            </button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->


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
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="/app/angular.js"></script>
    <script type="text/javascript" src="/app/config/config.js"></script>
    <script type="text/javascript" src="/app/service/api-service.js"></script>
    <script type="text/javascript" src="/app/modules/cart/cart.js"></script>
</body>

</html>