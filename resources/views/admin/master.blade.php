<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/rukada/demo/vertical/dashboard-eCommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Dec 2022 14:21:47 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('admin')}}/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('admin')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('admin')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('admin')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="{{asset('admin')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('admin')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('admin')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('admin')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('admin')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('admin')}}/css/app.css" rel="stylesheet">
	<link href="{{asset('admin')}}/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('admin')}}/css/dark-theme.css" />
	<link rel="stylesheet" href="{{asset('admin')}}/css/semi-dark.css" />
	<link rel="stylesheet" href="{{asset('admin')}}/css/header-colors.css" />
	<title>Ecom </title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<h4 class="logo-text">ecommerce</h4>
				</div>
				
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="" class="">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<a class="" href="category">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
                    <a class="" href="subcategory">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">SubCategory</div>
					</a>
					 <a class="" href="products">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">add_products and view</div>
					</a>

					<a href="subadmins" class="">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">add subadmin</div>
					</a>
					<a href="" class="">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Orders</div>
					</a>

					<a href="/products-details" class="">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">products_details</div>
					</a>
					

					<a class="" href="tracking">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Tracking</div>
					</a>
					<a href="subadmin">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Sub Admin</div>
					</a>
					<a href="image-upload">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">image-upload</div>
					</a>
				</li>
				
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>	
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('admin')}}/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								{{-- <p class="user-name mb-0">{{ Auth::user()->name }} </p>
								<p class="designattion mb-0">hello admin</p> --}}
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{-- /super-admin/dashboard/changepassword --}}"><i class="bx bx-user"></i><span>change password</span></a>
							</li>
							<li><a class="dropdown-item" href="adminsetting"><i class="bx bx-cog"></i><span>Admin Settings</span></a>
							</li>
							
							
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->



 @yield('main_content')




<!--start overlay-->
<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode">
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark" checked>
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('admin')}}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('admin')}}/js/jquery.min.js"></script>
	<script src="{{asset('admin')}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('admin')}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('admin')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{asset('admin')}}/plugins/chartjs/chart.min.js"></script>
	<script src="{{asset('admin')}}/plugins/peity/jquery.peity.min.js"></script>
	<script src="{{asset('admin')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('admin')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('admin')}}/js/dashboard-eCommerce.js"></script>
	<!--app JS-->
	<script src="{{asset('admin')}}/js/app.js"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>
</body>



</html>
