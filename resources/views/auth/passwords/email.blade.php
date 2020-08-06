@extends('layouts.app')

@section('title', 'Reset Your Account Password')

@section('content')
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		 <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <script src="{{asset('process/countries.js')}}"></script>
		<!-- Title -->
		<title>{{config('app.name')}} | Reset Password</title>
		 <link href="{{asset('assets\fonts\fonts\font-awesome.min.css')}}" rel="stylesheet" />
        
		 <link href="{{asset('assets\plugins\sweet-alert\sweetalert.css')}}" rel="stylesheet" />
		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		
		<!-- Sidemenu Css -->
		 <link href="{{asset('assets\plugins\fullside-menu\css\style.css')}}" rel="stylesheet" />
		 <link href="{{asset('assets\plugins\fullside-menu\waves.min.css')}}" rel="stylesheet" />
		
		<!-- Dashboard Css -->
		 <link href="{{asset('assets\css\dashboard.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<!-- c3.js Charts Plugin -->
		 <link href="{{asset('assets\plugins\charts-c3\c3-chart.css')}}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		 <link href="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		 <link href="{{asset('assets\css\icons.css')}}" rel="stylesheet" />

	</head>

	<body>
		<div class="login-img">
			<div id="global-loader"></div>
			<div class="page">
				<div class="page-single">
					<div class="container ">
						<div class="row authentication">
							<div class="col col-login mx-auto">
								<div class="text-center mb-6">
									<img src="{{asset('assets\images\brand\logo.png')}}">
								</div>
								<form class="card" method="post" action="{{ route('password.email') }}">
                      			  {{ csrf_field() }}
									<div class="card-body p-6">
									
										<div class="text-center card-title">Forgot password</div>
											<div class="input-icon form-group">
												<span class="input-icon-addon search-icon">
													<i class="zmdi zmdi-email"></i>
												</span>
												<input class="form-control" placeholder="Please enter your email" type="email"  name="email" value="{{ old('email') }}" required>
											</div>
											<div class="form-footer">
												<button type="submit" class="btn btn-primary btn-block">Send</button>
											</div>
											<div class="text-center text-muted mt-3 ">
											Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!-- Dashboard Js -->
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\selectize.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\jquery.tablesorter.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\circle-progress.min.js')}}"></script>
		<script src="{{asset('assets\plugins\rating\jquery.rating-stars.js')}}"></script>
		
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets\plugins\fullside-menu\jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets\plugins\fullside-menu\waves.min.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('assets\js\custom.js')}}"></script>
		
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		@if ($errors->has('email'))
         <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('email') }}"
			});

	
		  });
		}).call(this);

		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31911059-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();</script>
		  @endif
	</body>
</html>
@endsection