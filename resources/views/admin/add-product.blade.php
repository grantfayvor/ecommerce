<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html data-ng-app="e-shop">

<head>
	<title>Affiamuta::Add Product</title>
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
	<!--icons-css-->
	<link href="/css/font-awesome.css" rel="stylesheet">
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>

	<!--//charts-->
	<!-- geo chart -->
	<script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
	<script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
	<!--<script src="lib/html5shiv/html5shiv.js"></script>-->

</head>

<body data-ng-controller="ProductController">
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<div class="header-main">
					<div class="header-left">
						<div class="logo-name">
							<a href="/admin/dashboard">
								<h1>Affiamuta</h1>
								<!--<img id="logo" src="" alt="Logo"/>-->
							</a>
                        </div>
                        <!--search-box-->
						<div class="search-box" style="float: right;">
							<form>
								<input type="text" placeholder="Search..." required="">
								<input type="submit" value="">
							</form>
						</div>
						<!--//end-search-box-->
						<div class="clearfix"> </div>
					</div>
					<div class="header-right">
						<div class="profile_details_left">
							<!--notifications of menu start -->
							<ul class="nofitications-dropdown">
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 3 new messages</h3>
											</div>
										</li>
										<li>
											<a href="#">
												<div class="user_img"><img src="/images/p4.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li class="odd">
											<a href="#">
												<div class="user_img"><img src="/images/p2.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor </p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user_img"><img src="/images/p3.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all messages</a>
											</div>
										</li>
									</ul>
								</li>
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 3 new notification</h3>
											</div>
										</li>
										<li>
											<a href="#">
												<div class="user_img"><img src="/images/p5.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li class="odd">
											<a href="#">
												<div class="user_img"><img src="/images/p6.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user_img"><img src="/images/p7.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all notifications</a>
											</div>
										</li>
									</ul>
								</li>
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">9</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 8 pending task</h3>
											</div>
										</li>
										<li>
											<a href="#">
												<div class="task-info">
													<span class="task-desc">Database update</span><span class="percentage">40%</span>
													<div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													<div class="bar yellow" style="width:40%;"></div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="task-info">
													<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
													<div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													<div class="bar green" style="width:90%;"></div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="task-info">
													<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
													<div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													<div class="bar red" style="width: 33%;"></div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="task-info">
													<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
													<div class="clearfix"></div>
												</div>
												<div class="progress progress-striped active">
													<div class="bar  blue" style="width: 80%;"></div>
												</div>
											</a>
										</li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all pending tasks</a>
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<div class="clearfix"> </div>
						</div>
						<!--notification menu end -->
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">
											<span class="prfil-img"><img src="/images/p1.png" alt=""> </span>
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
										<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
										<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
										<li> <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!--heder end here-->
				<!-- script-for sticky-nav -->
				<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">

					<!--mainpage chit-chating-->
					<div class="chit-chat-layer1">
						<div style="width:50%;margin:auto;">
							<div class="work-progres">
								<div class="chit-chat-heading">
									New Product
								</div>
								<div class="signup-block">
									<form class="form-horizontal form-label-left input_mask" enctype="MULTIPART/FORM-DATA" method="POST" action="/api/product/save" novalidate>
                                        {{ csrf_field() }}

										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<input type="text" name="name" data-ng-model="new_product.name" class="form-control" placeholder="Name">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<input type="text" name="brand" data-ng-model="new_product.brand" class="form-control" placeholder="Brand">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<input type="text" name="sellingPrice" data-ng-model="new_product.sellingPrice" class="form-control" placeholder="Selling Price">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<select name="categoryId" data-ng-model="new_product.categoryId" class="form-control">
                            						<option value="" selected>Category</option>
                            						<option value="1">Books</option>
                            						<option value="2">Cards</option>
                                                    <option value="3">Charts</option>
                            						<option value="4">Learning Aids</option>
                          						</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<input type="file" name="image" data-ng-model="new_product.image" class="form-control" placeholder="product image">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<textarea name="details" data-ng-model="new_product.details" class="form-control" rows="3" placeholder="Details about the product"></textarea>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
												<button type="button" class="btn btn-primary">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!--main page chit chating end here-->

				</div>
				<!--inner block end here-->
				<!--copy rights start here-->
				<div class="copyrights">
					<p>© 2016 Shoppy. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<!--COPY rights end here-->
			</div>
		</div>
		<!--slider menu-->
		<div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="/admin/dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		       
				<li><a href="/admin/add-product"><i class="fa fa-plus-circle"></i><span>Add New Product</span></a></li>
				<li><a href="/admin/view-products"><i class="fa fa-eye"></i><span>View Products</span></a></li>
				<li><a href="/admin/view-products-list"><i class="fa fa-cogs"></i><span>View Product List</span></a></li>	
		        
		        <li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="inbox.html">Inbox</a></li>
			            <li id="menu-academico-boletim" ><a href="inbox-details.html">Compose email</a></li>
		             </ul>
		        </li>
		        
		      </ul>
		    </div>
	 </div>
		<div class="clearfix"> </div>
	</div>
	<!--slide bar menu end here-->
	<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
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
	<script type="text/javascript" src="/app/modules/product/product.js"></script>
</body>

</html>