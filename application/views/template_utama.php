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
				<?= $contents ?>
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
