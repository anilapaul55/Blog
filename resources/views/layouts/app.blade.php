<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<!-- <link rel="icon" href="{{ asset('admin_assets/images/favicon-32x32.png') }}" type="image/png" /> -->
	<!--plugins-->
	<link href="{{ asset('admin_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/notifications/css/lobibox.min.css') }}"  rel="stylesheet"/>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin_assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin_assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin_assets/css/header-colors.css') }}" />
    
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin_assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

	<!-- sweetalert -->
	<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">

	<title>Blogs</title>
	@yield('styles')
</head>

<body class="bg-theme bg-theme2">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ url('/') }}">
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="menu-label">Menus</li>
				<li>
					<a href="javascript:;">
						<div class="menu-title">Blogs</div>
					</a>
					<ul>
                        <li> <a href="{{route('index')}}"><i class="bx bx-right-arrow-alt"></i>Blog</a></li>
						<li> <a href="{{route('create')}}"><i class="bx bx-right-arrow-alt"></i>Add Blog</a></li>
					</ul>
				</li>
			</ul><!--end navigation-->
		</div><!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
							</li>
							<li class="nav-item dropdown dropdown-large">
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
        <div style="min-height:600px;">
        	@yield('content')
		</div>	
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> 
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!-- <footer class="page-footer ">
			<p>Copyright © 2021. All right reserved.</p>
		</footer> -->
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
	<script src="{{asset('assets/plugins/jquery-validation/dist/jquery.validate.js')}}"></script>
	<script src="{{ asset('admin_assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/select2/js/select2.min.js') }}"></script>
    
    <script src="{{ asset('admin_assets/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<!--app JS-->
	<script src="{{ asset('admin_assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin_assets/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>

