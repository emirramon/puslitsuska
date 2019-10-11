<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url()?>assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?= base_url()?>assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Material Dashboard Pro by Creative Tim</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!-- Bootstrap core CSS     -->
	<link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="<?= base_url()?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="<?= base_url()?>assets/css/demo.css" rel="stylesheet" />
	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<div class="wrapper">
	<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?= base_url()?>assets/img/sidebar-1.jpg">
		<!--
	Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
	Tip 2: you can also add an image using data-image tag
	Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
		<div class="logo">
			<a href="http://www.creative-tim.com" class="simple-text logo-mini">
				CT
			</a>
			<a href="http://www.creative-tim.com" class="simple-text logo-normal">
				Creative Tim
			</a>
		</div>
		<div class="sidebar-wrapper">
			<div class="user">
				<div class="photo">
					<img src="<?= base_url()?>assets/img/faces/avatar.jpg" />
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                Tania Andrew
                                <b class="caret"></b>
                            </span>
					</a>
					<div class="clearfix"></div>
					<div class="collapse" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#">
									<span class="sidebar-mini">MP</span>
									<span class="sidebar-normal">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="sidebar-mini">EP</span>
									<span class="sidebar-normal">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="sidebar-mini">S</span>
									<span class="sidebar-normal">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav">
				<?php
				
					$sql_menu = "SELECT * FROM main_menu WHERE induk_menu=0";
					$main_menu = $this->db->query($sql_menu)->result();
					foreach($main_menu as $main){
						$submenu = $this->db->get_where('main_menu', array('induk_menu'=>$main->id));
						if($submenu->num_rows() > 0){
							echo '<li>
									<a data-toggle="collapse" href="#'.$main->link.'">
										<i class="material-icons">image</i>
										<p>'.$main->judul_menu.'
											<b class="caret"></b>
										</p>
									</a>
									<div class="collapse" id="'.$main->link.'">
										<ul class="nav">';

								foreach($submenu->result() as $sub){
									echo '<li>
											<a href="'.$sub->link.'">
												<i class="material-icons">'.$sub->icon.'</i>
												<p>'.$sub->judul_menu.'</p>
											</a>
										</li>';
								}

							echo 		'</ul>
									</div>
								</li>';
						} else {
							echo '<li class="">
									<a href="'.$main->link.'">
										<i class="material-icons">'.$main->icon.'</i>
										<p>'.$main->judul_menu.'</p>
									</a>
								</li>';
						}
					}
				
				?>
			</ul>
		</div>
	</div>
	<div class="main-panel">
		<nav class="navbar navbar-transparent navbar-absolute">
			<div class="container-fluid">
				<div class="navbar-minimize">
					<button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
						<i class="material-icons visible-on-sidebar-regular">more_vert</i>
						<i class="material-icons visible-on-sidebar-mini">view_list</i>
					</button>
				</div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"> Dashboard </a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
								<i class="material-icons">dashboard</i>
								<p class="hidden-lg hidden-md">Dashboard</p>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="material-icons">notifications</i>
								<span class="notification">5</span>
								<p class="hidden-lg hidden-md">
									Notifications
									<b class="caret"></b>
								</p>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Mike John responded to your email</a>
								</li>
								<li>
									<a href="#">You have 5 new tasks</a>
								</li>
								<li>
									<a href="#">You're now friend with Andrew</a>
								</li>
								<li>
									<a href="#">Another Notification</a>
								</li>
								<li>
									<a href="#">Another One</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
								<i class="material-icons">person</i>
								<p class="hidden-lg hidden-md">Profile</p>
							</a>
						</li>
						<li class="separator hidden-lg hidden-md"></li>
					</ul>
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group form-search is-empty">
							<input type="text" class="form-control" placeholder="Search">
							<span class="material-input"></span>
						</div>
						<button type="submit" class="btn btn-white btn-round btn-just-icon">
							<i class="material-icons">search</i>
							<div class="ripple-container"></div>
						</button>
					</form>
				</div>
			</div>
		</nav>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-icon" data-background-color="green">
								<i class="material-icons">&#xE894;</i>
							</div>
							<div class="card-content">
								<h4 class="card-title">Global Sales by Top Locations</h4>
								<div class="row">
									<div class="col-md-5">
										<div class="table-responsive table-sales">
											<table class="table">
												<tbody>
												<tr>
													<td>
														<div class="flag">
															<img src="<?= base_url()?>assets/img/flags/US.png">
														</div>
													</td>
													<td>USA</td>
													<td class="text-right">
														2.920
													</td>
													<td class="text-right">
														53.23%
													</td>
												</tr>
												<tr>
													<td>
														<div class="flag">
															<img src="<?= base_url()?>assets/img/flags/DE.png">
														</div>
													</td>
													<td>Germany</td>
													<td class="text-right">
														1.300
													</td>
													<td class="text-right">
														20.43%
													</td>
												</tr>
												<tr>
													<td>
														<div class="flag">
															<img src="<?= base_url()?>assets/img/flags/AU.png">
														</div>
													</td>
													<td>Australia</td>
													<td class="text-right">
														760
													</td>
													<td class="text-right">
														10.35%
													</td>
												</tr>
												<tr>
													<td>
														<div class="flag">
															<img src="<?= base_url()?>assets/img/flags/GB.png">
														</div>
													</td>
													<td>United Kingdom</td>
													<td class="text-right">
														690
													</td>
													<td class="text-right">
														7.87%
													</td>
												</tr>
												<tr>
													<td>
														<div class="flag">
															<img src="<?= base_url()?>assets/img/flags/RO.png">
														</div>
													</td>
													<td>Romania</td>
													<td class="text-right">
														600
													</td>
													<td class="text-right">
														5.94%
													</td>
												</tr>
												<tr>
													<td>
														<div class="flag">
															<img src="<?= base_url()?>assets/img/flags/BR.png">
														</div>
													</td>
													<td>Brasil</td>
													<td class="text-right">
														550
													</td>
													<td class="text-right">
														4.34%
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-6 col-md-offset-1">
										<div id="worldMap" class="map"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card card-chart">
							<div class="card-header" data-background-color="rose" data-header-animation="true">
								<div class="ct-chart" id="websiteViewsChart"></div>
							</div>
							<div class="card-content">
								<div class="card-actions">
									<button type="button" class="btn btn-danger btn-simple fix-broken-card">
										<i class="material-icons">build</i> Fix Header!
									</button>
									<button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
										<i class="material-icons">refresh</i>
									</button>
									<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
										<i class="material-icons">edit</i>
									</button>
								</div>
								<h4 class="card-title">Website Views</h4>
								<p class="category">Last Campaign Performance</p>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">access_time</i> campaign sent 2 days ago
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-chart">
							<div class="card-header" data-background-color="green" data-header-animation="true">
								<div class="ct-chart" id="dailySalesChart"></div>
							</div>
							<div class="card-content">
								<div class="card-actions">
									<button type="button" class="btn btn-danger btn-simple fix-broken-card">
										<i class="material-icons">build</i> Fix Header!
									</button>
									<button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
										<i class="material-icons">refresh</i>
									</button>
									<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
										<i class="material-icons">edit</i>
									</button>
								</div>
								<h4 class="card-title">Daily Sales</h4>
								<p class="category">
									<span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">access_time</i> updated 4 minutes ago
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-chart">
							<div class="card-header" data-background-color="blue" data-header-animation="true">
								<div class="ct-chart" id="completedTasksChart"></div>
							</div>
							<div class="card-content">
								<div class="card-actions">
									<button type="button" class="btn btn-danger btn-simple fix-broken-card">
										<i class="material-icons">build</i> Fix Header!
									</button>
									<button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
										<i class="material-icons">refresh</i>
									</button>
									<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
										<i class="material-icons">edit</i>
									</button>
								</div>
								<h4 class="card-title">Completed Tasks</h4>
								<p class="category">Last Campaign Performance</p>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">access_time</i> campaign sent 2 days ago
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="orange">
								<i class="material-icons">weekend</i>
							</div>
							<div class="card-content">
								<p class="category">Bookings</p>
								<h3 class="card-title">184</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons text-danger">warning</i>
									<a href="#pablo">Get More Space...</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="rose">
								<i class="material-icons">equalizer</i>
							</div>
							<div class="card-content">
								<p class="category">Website Visits</p>
								<h3 class="card-title">75.521</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">local_offer</i> Tracked from Google Analytics
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="green">
								<i class="material-icons">store</i>
							</div>
							<div class="card-content">
								<p class="category">Revenue</p>
								<h3 class="card-title">$34,245</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">date_range</i> Last 24 Hours
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="blue">
								<i class="fa fa-twitter"></i>
							</div>
							<div class="card-content">
								<p class="category">Followers</p>
								<h3 class="card-title">+245</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">update</i> Just Updated
								</div>
							</div>
						</div>
					</div>
				</div>
				<h3>Manage Listings</h3>
				<br>
				<div class="row">
					<div class="col-md-4">
						<div class="card card-product">
							<div class="card-image" data-header-animation="true">
								<a href="#pablo">
									<img class="img" src="<?= base_url()?>assets/img/card-2.jpeg">
								</a>
							</div>
							<div class="card-content">
								<div class="card-actions">
									<button type="button" class="btn btn-danger btn-simple fix-broken-card">
										<i class="material-icons">build</i> Fix Header!
									</button>
									<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
										<i class="material-icons">art_track</i>
									</button>
									<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
										<i class="material-icons">edit</i>
									</button>
									<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
										<i class="material-icons">close</i>
									</button>
								</div>
								<h4 class="card-title">
									<a href="#pablo">Cozy 5 Stars Apartment</a>
								</h4>
								<div class="card-description">
									The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
								</div>
							</div>
							<div class="card-footer">
								<div class="price">
									<h4>$899/night</h4>
								</div>
								<div class="stats pull-right">
									<p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-product">
							<div class="card-image" data-header-animation="true">
								<a href="#pablo">
									<img class="img" src="<?= base_url()?>assets/img/card-3.jpeg">
								</a>
							</div>
							<div class="card-content">
								<div class="card-actions">
									<button type="button" class="btn btn-danger btn-simple fix-broken-card">
										<i class="material-icons">build</i> Fix Header!
									</button>
									<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
										<i class="material-icons">art_track</i>
									</button>
									<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
										<i class="material-icons">edit</i>
									</button>
									<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
										<i class="material-icons">close</i>
									</button>
								</div>
								<h4 class="card-title">
									<a href="#pablo">Office Studio</a>
								</h4>
								<div class="card-description">
									The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
								</div>
							</div>
							<div class="card-footer">
								<div class="price">
									<h4>$1.119/night</h4>
								</div>
								<div class="stats pull-right">
									<p class="category"><i class="material-icons">place</i> London, UK</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-product">
							<div class="card-image" data-header-animation="true">
								<a href="#pablo">
									<img class="img" src="<?= base_url()?>assets/img/card-1.jpeg">
								</a>
							</div>
							<div class="card-content">
								<div class="card-actions">
									<button type="button" class="btn btn-danger btn-simple fix-broken-card">
										<i class="material-icons">build</i> Fix Header!
									</button>
									<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
										<i class="material-icons">art_track</i>
									</button>
									<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
										<i class="material-icons">edit</i>
									</button>
									<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
										<i class="material-icons">close</i>
									</button>
								</div>
								<h4 class="card-title">
									<a href="#pablo">Beautiful Castle</a>
								</h4>
								<div class="card-description">
									The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
								</div>
							</div>
							<div class="card-footer">
								<div class="price">
									<h4>$459/night</h4>
								</div>
								<div class="stats pull-right">
									<p class="category"><i class="material-icons">place</i> Milan, Italy</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left">
					<ul>
						<li>
							<a href="#">
								Home
							</a>
						</li>
						<li>
							<a href="#">
								Company
							</a>
						</li>
						<li>
							<a href="#">
								Portfolio
							</a>
						</li>
						<li>
							<a href="#">
								Blog
							</a>
						</li>
					</ul>
				</nav>
				<p class="copyright pull-right">
					&copy;
					<script>
                        document.write(new Date().getFullYear())
					</script>
					<a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
				</p>
			</div>
		</footer>
	</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?= base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="<?= base_url()?>assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="<?= base_url()?>assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?= base_url()?>assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?= base_url()?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?= base_url()?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?= base_url()?>assets/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?= base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?= base_url()?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="<?= base_url()?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?= base_url()?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?= base_url()?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="<?= base_url()?>assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?= base_url()?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?= base_url()?>assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="<?= base_url()?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?= base_url()?>assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url()?>assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>

</html>
