<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--plugins-->
    <link href="{{ asset('assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" type="text/css" />
       
	<!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
	<title>Blog Register</title>
</head>

<body class="bg-theme">	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start shop cart-->
				@if ($message = Session::get('success'))
				<div class="alert border-0 alert-dismissible fade show py-2">
					<div class="d-flex align-items-center">
						<div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-white">Success Alerts</h6>
							<div class="text-white">{{ $message }}</div>
						</div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@endif

				@if ($message = Session::get('errors1'))
				<div class="alert border-0 alert-dismissible fade show py-2">
					<div class="d-flex align-items-center">
						<div class="font-35 text-white"><i class='bx bx-info-circle'></i>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-white">Warning Alerts</h6>
							<div class="text-white">{{ $message }}</div>
						</div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@endif
				
				<section class="">
					<div class="container">
						<div class=" d-flex justify-content-center">
							<div class="row col-md-6">
							<div class="card forgot-box">
								<div class="card-body">
									<div class="text-center py-4 login-customer-logo"></div>
									<div class="p-4 rounded border" style="background-color:#c8def7">
										@if ($message = Session::get('login'))
                                            <div class="alert alert-warning" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endif
										<h6 class="my-4 font-weight-bold">{{ isset($url) ? ucwords($url) : ""}} {{ __('Sign in') }}</h6>
										<div class="form-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                                <div class="col-md-8">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                                <div class="col-md-8">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                                <div class="col-md-8">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-8">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
									</div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--end shop cart-->
	</div>
	</div>
	<!--end page wrapper -->
		<!--Start Back To Top Button--> 
                <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
	<!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/js/index.js') }}"></script>
	<!--Password show & hide js -->
	<script src="{{ asset('assets/js/show-hide-password.js') }}"></script>
</body>

</html>