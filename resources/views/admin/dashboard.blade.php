<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html data-ng-app="e-shop">

<head>
	<title>Afiammuta | Dashboard</title>
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
	<!--static chart-->
	<script src="/js/Chart.min.js"></script>
	<!--//charts-->
	<!-- geo chart -->
	<script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
	<script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
	<!--<script src="lib/html5shiv/html5shiv.js"></script>-->
	<!-- Chartinator  -->
	<script src="/js/chartinator.js"></script>
	<script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
	<!--geo chart-->

	<!--skycons-icons-->
	<script src="/js/skycons.js"></script>
	<!--//skycons-icons-->
</head>

<body data-ng-controller="AdminController">
	<div class="page-container" data-ng-init="initialize()">
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
												<div class="user_img"><img src="images/p4.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li class="odd">
											<a href="#">
												<div class="user_img"><img src="images/p2.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor </p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user_img"><img src="images/p3.png" alt=""></div>
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
												<div class="user_img"><img src="images/p5.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li class="odd">
											<a href="#">
												<div class="user_img"><img src="images/p6.png" alt=""></div>
												<div class="notification_desc">
													<p>Lorem ipsum dolor</p>
													<p><span>1 hour ago</span></p>
												</div>
												<div class="clearfix"></div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user_img"><img src="images/p7.png" alt=""></div>
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
											<span class="prfil-img"><img src="images/p1.png" alt=""> </span>
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
										<li> <a href="/profile"><i class="fa fa-user"></i> Profile</a> </li>
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
					<!--market updates updates-->
					<div class="market-updates">
						<div class="col-md-4 market-update-gd">
							<div class="market-update-block clr-block-1">
								<div class="col-md-8 market-update-left">
									<h3 data-ng-bind="userCount"></h3>
									<h4>Total Users</h4>
								</div>
								<div class="col-md-4 market-update-right">
									<i class="fa fa-eye"> </i>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 market-update-gd">
							<div class="market-update-block clr-block-2">
								<div class="col-md-8 market-update-left">
									<h3 data-ng-bind="productCount"></h3>
									<h4>Total Products</h4>
								</div>
								<div class="col-md-4 market-update-right">
									<i class="fa fa-file-text-o"> </i>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 market-update-gd">
							<div class="market-update-block clr-block-3">
								<div class="col-md-8 market-update-left">
									<h3 data-ng-bind="saleCount"></h3>
									<h4>Total Sales</h4>
								</div>
								<div class="col-md-4 market-update-right">
									<i class="fa fa-line-chart"> </i>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
                        <div class="clearfix"> </div>
                        <br>
                        <br>
					</div>
					<!--market updates end here-->
					<!--mainpage chit-chating-->

					<!--main page chit chating end here-->
					<!--main page chart start here-->
					<div class="main-page-charts">
						<div class="main-page-chart-layer1">
							<div class="col-md-6 chart-layer1-left">
								<div class="glocy-chart">
									<div class="span-2c">
										<h3 class="tlt">Sales Analytics</h3>
										<canvas id="bar" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
										<script>
                            var barChartData = {
                            labels : ["Jan","Feb","Mar","Apr","May","Jun","jul"],
                            datasets : [
                                {
                                    fillColor : "#FC8213",
                                    data : [65,59,90,81,56,55,40]
                                },
                                {
                                    fillColor : "#337AB7",
                                    data : [28,48,40,19,96,27,100]
                                }
                            ]

                        };
                            new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

                        </script>
									</div>
								</div>
							</div>
                            <div class="clearfix"> </div>
                            <br>
                            <br>
						</div>
					</div>
				

					<!--climate start here-->
					<div class="climate">
						<div class="col-md-4 climate-grids">
							<div class="climate-grid1">
								<div class="climate-gd1-top">
									<div class="col-md-6 climate-gd1top-left">
										<h4>Aprill 6-wed</h4>
										<h3>12:30<span class="timein-pms">PM</span></h3>
										<p>Humidity:</p>
										<p>Sunset:</p>
										<p>Sunrise:</p>
									</div>
									<div class="col-md-6 climate-gd1top-right">
										<span class="clime-icon"> 
					  	<figure class="icons">
								<canvas id="partly-cloudy-day" width="64" height="64">
								</canvas>
							</figure>
						<script>
							 var icons = new Skycons({"color": "#fff"}),
								  list  = [
									"clear-night", "partly-cloudy-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>					  
				   </span>
										<p>88%</p>
										<p>5:40PM</p>
										<p>6:30AM</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="climate-gd1-bottom">
									<div class="col-md-4 cloudy1">
										<h4>Hongkong</h4>
										<figure class="icons">
											<canvas id="sleet" width="58" height="58">
											</canvas>
										</figure>
										<script>
								 var icons = new Skycons({"color": "#fff"}),
									  list  = [
										"clear-night", "clear-day",
										"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
										"fog"
									  ],
									  i;
	
								  for(i = list.length; i--; )
									icons.set(list[i], list[i]);
	
								  icons.play();
							</script>
										<h3>10c</h3>
									</div>
									<div class="col-md-4 cloudy1">
										<h4>UK</h4>
										<figure class="icons">
											<canvas id="cloudy" width="58" height="58"></canvas>
										</figure>
										<script>
							 var icons = new Skycons({"color": "#fff"}),
								  list  = [
									"clear-night", "cloudy",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
										<h3>6c</h3>
									</div>
									<div class="col-md-4 cloudy1">
										<h4>USA</h4>
										<figure class="icons">
											<canvas id="snow" width="58" height="58">
											</canvas>
										</figure>
										<script>
							 var icons = new Skycons({"color": "#fff"}),
								  list  = [
									"clear-night", "clear-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
										<h3>10c</h3>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<div class="col-md-4 climate-grids">
							<div class="climate-grid2">
								<span class="shoppy-rate"><h4>$180</h4></span>
								<ul>
									<li> <i class="fa fa-credit-card"> </i> </li>
									<li> <i class="fa fa-usd"> </i> </li>
								</ul>
							</div>
							<div class="shoppy">
								<h3>Those Who Hate Shopping?</h3>
							</div>
						</div>
						<div class="col-md-4 climate-grids">
							<div class="climate-grid3">
								<div class="popular-brand">
									<div class="col-md-6 popular-bran-left">
										<h3>Popular</h3>
										<h4>Brand of this month</h4>
										<p> Duis aute irure in reprehenderit.</p>
									</div>
									<div class="col-md-6 popular-bran-right">
										<h3>Polo</h3>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="popular-follow">
									<div class="col-md-6 popular-follo-left">
										<p>Lorem ipsum dolor sit amet, adipiscing elit.</p>
									</div>
									<div class="col-md-6 popular-follo-right">
										<h4>Follower</h4>
										<h5>2892</h5>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!--climate end here-->
				</div>
				<!--inner block end here-->
				<!--copy rights start here-->
				<div class="copyrights">
					<p>© <?php echo date("Y"); ?> Afiammuta. All Rights Reserved </p>
				</div>
				<!--COPY rights end here-->
			</div>
		</div>
		<!--slider menu-->
		<div class="sidebar-menu">
			<div class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
				<a href="#"> <span id="logo"></span>
					<!--<img id="logo" src="" alt="Logo"/>-->
				</a>
			</div>
			<div class="menu">
				<ul id="menu">
					<li id="menu-home"><a href="/admin/dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>

					<li><a href="/admin/add-product"><i class="fa fa-plus-circle"></i><span>Add New Product</span></a></li>
					<li><a href="/admin/view-products"><i class="fa fa-eye"></i><span>View Products</span></a></li>
                    <li><a href="/admin/view-products-list"><i class="fa fa-cogs"></i><span>View Product List</span></a></li>
                    <li><a href="/admin/view-sales-list"><i class="fa fa-line-chart"></i><span>View Sales List</span></a></li>
                    <li>
                        <a href="/admin/view-users">
                            <i class="fa fa-user"></i>
                            <span>View Users</span>
                        </a>
                    </li>

					<li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
                            <li id="menu-academico-avaliacoes">
                                <a href="#">Inbox</a>
                            </li>
                            <li id="menu-academico-boletim">
                                <a href="#">Compose email</a>
                            </li>
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
	<script type="text/javascript" src="/app/angular.js"></script>
	<script type="text/javascript" src="/app/config/config.js"></script>
	<script type="text/javascript" src="/app/service/api-service.js"></script>
	<script type="text/javascript" src="/app/admin.js"></script>
</body>

</html>