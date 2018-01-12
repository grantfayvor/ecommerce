<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html data-ng-app="e-shop">

<head>
    <title>Afiammuta | Users List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--js-->
    <script src="/js/jquery-2.1.1.min.js"></script>
    <link href="/css/pace.admin.css" rel="stylesheet">
    <script src="/js/pace.min.js" type="text/javascript"></script>
    <!--icons-css-->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <!--//skycons-icons-->
</head>

<body data-ng-controller="UserController">
    <div class="page-container" data-ng-init="getAllUsers()">
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo-name">
                            <a href="/admin/dashboard">
                                <h1>Afiammuta</h1>
                                <!--<img id="logo" src="" alt="Logo"/>-->
                            </a>
                        </div>
                        <!--search-box-->
                        <div class="search-box" style="float: right;">
                            <form>
                                <input type="text" data-ng-model="searchParam" placeholder="Search..." required="">
                                <input type="submit" value="" data-ng-click="searchByParam()">
                            </form>
                        </div>
                        <!--//end-search-box-->
                        <div class="clearfix"> </div>
                    </div>
                    <div class="header-right">
                        
                        <!--notification menu end -->
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">
                                            <span class="prfil-img">
                                                <!-- <img src="images/p1.png" alt=""> </span> -->
                                            <div class="user-name">
                                                <p>{{ $username }}</p>
                                                <span>Administrator</span>
                                            </div>
                                            <i class="fa fa-angle-down lnr"></i>
                                            <i class="fa fa-angle-up lnr"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <!-- <li>
                                            <a href="#">
                                                <i class="fa fa-cog"></i> Settings</a>
                                        </li> -->
                                        <li>
                                            <a href="/profile">
                                                <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="/logout">
                                                <i class="fa fa-sign-out"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!--heder end here-->
            <!-- script-for sticky-nav -->
            <script>
                $(document).ready(function () {
                    var navoffeset = $(".header-main").offset().top;
                    $(window).scroll(function () {
                        var scrollpos = $(window).scrollTop();
                        if (scrollpos >= navoffeset) {
                            $(".header-main").addClass("fixed");
                        } else {
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block" style="min-height:600px;">
                <div class="inbox">
                    <h2>All Users</h2>

                    <div class="col-md-12 mailbox-content  tab-content tab-content-in">
                        <div class="tab-pane active text-style" id="tab1">
                            <div class="mailbox-border">
                                <div class="mail-toolbar clearfix">

                                </div>
                                <table class="table tab-border table-hover table-responsive">
                                    <thead>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Account Type</th>
                                        <th>Administrator</th>
                                        <th>Delete User</th>
                                    </thead>
                                    <tbody>
                                        <tr class="unread checked" data-ng-repeat="user in users.data | filter: search">
                                            <td class="hidden-xs">
                                                <input type="checkbox" class="checkbox">
                                            </td>
                                            <td class="hidden-xs">
                                                <span data-ng-bind="user.name"></span>
                                            </td>
                                            <td class="hidden-xs">
                                                <span data-ng-bind="user.email"></span>
                                            </td>
                                            <td>
                                                <span data-ng-bind="user.phone_number"></span>
                                            </td>
                                            <td>
                                                <span data-ng-bind="user.admin ? 'Administrator' : 'User'"></span>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input id="adminToggle<%$index%>" type="checkbox" data-ng-checked="user.admin" data-ng-click="showMakeAdminModal(user.id, $index)">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" style="color: red!important;" data-ng-click="showDeletePage(user.id)">
                                                    <span class="fa fa-trash"></span> Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center" data-ng-show="users.next_page_url || users.prev_page_url">
                            <ul class="pagination" style="background-color:white!important;">
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="previousPage(users.prev_page_url)">Previous</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="nextPage(users.next_page_url)">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <!--inner block end here-->
            <!--copy rights start here-->
            <div class="copyrights">
                <p>©
                    <?php echo date("Y"); ?> Afiammuta. All Rights Reserved
                </p>
            </div>
            <!--COPY rights end here-->
        </div>

        <!--slider menu-->
        <div class="sidebar-menu">
            <div class="logo">
                <a href="#" class="sidebar-icon">
                    <span class="fa fa-bars"></span>
                </a>
                <a href="#">
                    <span id="logo"></span>
                    <!--<img id="logo" src="" alt="Logo"/>-->
                </a>
            </div>
            <div class="menu">
                <ul id="menu">
                    <li id="menu-home">
                        <a href="/admin/dashboard">
                            <i class="fa fa-tachometer"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/add-product">
                            <i class="fa fa-plus-circle"></i>
                            <span>Add New Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/add-category">
                            <i class="fa fa-plus-square"></i>
                            <span>Add New Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/view-categories">
                            <i class="fa fa-eye"></i>
                            <span>View Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/view-products">
                            <i class="fa fa-eye"></i>
                            <span>View Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/view-products-list">
                            <i class="fa fa-cogs"></i>
                            <span>View Product List</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/view-sales-list">
                            <i class="fa fa-line-chart"></i>
                            <span>View Sales List</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/view-users">
                            <i class="fa fa-user"></i>
                            <span>View Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Go to Market</span>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            <span>Mailbox</span>
                            <span class="fa fa-angle-right" style="float: right"></span>
                        </a>
                        <ul id="menu-academico-sub">
                            <li id="menu-academico-avaliacoes">
                                <a href="#">Inbox</a>
                            </li>
                            <li id="menu-academico-boletim">
                                <a href="#">Compose email</a>
                            </li>
                        </ul>
                    </li> -->

                </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--slide bar menu end here-->

    <a href="#" class="scrollToTop"></a>

    <!--modal-->
    <div id="deleteModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center" data-ng-show="deleteUserMessage">
                        <label class="alert alert-warning" data-ng-bind="deleteUserMessage"></label>
                    </div>
                    <div class="form-group">
                        <label>Please put your password to delete the user.</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" data-ng-model="confirmPassword"
                            required />
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart" data-ng-click="deleteUserMessage = ''">Cancel</a>
                    <a href="javascript:void(0)" data-ng-click="deleteUser()" class="btn btn-danger">Ok</a>
                </div>
            </div>
        </div>
    </div>
    <div id="makeAdminModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center" data-ng-show="makeAdminMessage">
                        <label class="alert alert-warning" data-ng-bind="makeAdminMessage"></label>
                    </div>
                    <div class="form-group">
                        <label>Please put your password to make the user an administrator</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" data-ng-model="confirmPassword"
                            required />
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart" data-ng-click="makeAdminMessage = ''">Cancel</a>
                    <a href="javascript:void(0)" data-ng-click="makeAdmin()" class="btn btn-danger">Ok</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var toggle = true;

        $(".sidebar-icon").click(function () {
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({ "position": "absolute" });
            }
            else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function () {
                    $("#menu span").css({ "position": "relative" });
                }, 400);
            }
            toggle = !toggle;
        });
        $(document).ready(function () {

            //Check to see if the window is top if not then display button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });

            //Click event to scroll to top
            $('.scrollToTop').click(function () {
                $('html, body').animate({ scrollTop: 0 }, 800);
                return false;
            });

        });
    </script>
    <!--scrolling js-->
    <script src="/js/jquery.nicescroll.js"></script>
    <script src="/js/scripts.js"></script>
    <!--//scrolling js-->
    <script src="/js/bootstrap.js"> </script>
    <!-- mother grid end here-->
    <!--app here-->
    <script type="text/javascript" src="/app/angular.js"></script>
    <script type="text/javascript" src="/app/config/config.js"></script>
    <script type="text/javascript" src="/app/service/api-service.js"></script>
    <script type="text/javascript" src="/app/modules/user/user.js"></script>
</body>

</html>