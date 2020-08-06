@extends('layouts.app')
@section('title', 'Login To Control Panel')
@section('content')
@if($settings->userlogin == 0)

<? 
 print "
				<script language='javascript'>
					window.location = 'lockedlogin';
				</script>
			";
 ?>

@endif
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

		<!-- Title -->
		<title>{{config('app.name')}} | Account Login</title>
		 <script src='https://www.google.com/recaptcha/api.js'></script>
  		  <!-- CSRF Token -->
   		 <meta name="csrf-token" content="{{ csrf_token() }}">
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
					<div class="container">
						<div class="row authentication">
							<div class="col col-login mx-auto">
								<div class="text-center mb-6">
									<img src="assets\images\brand\logo.png" class="h-8" alt="">
								</div>
								<form class="card" method="POST" action="{{ route('login') }}">
								{{ csrf_field() }}
									<div class="card-body p-6 ">
										<div class="card-title text-center">Login to your Account</div>
										
										<div class="input-icon form-group wrap-input">
											<span class="input-icon-addon search-icon">
												<i class="mdi mdi-email"></i>
											</span>
											<input type="text" class="form-control" required name="email" value="{{ old('email') }}" placeholder="User's Email">
										</div>
										<script src="{{asset('assets\plugins\notify\js\loginerror.js')}}"></script>
										
										<div class="input-icon form-group wrap-input">
											<span class="input-icon-addon search-icon">
												<i class="zmdi zmdi-lock"></i>
											</span>
											<input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password" name="password" required>
											
										</div>
										
										<div class="form-group mt-5">
											<label class="custom-switch">
														<input type="checkbox"name="remember" required value="{{ old('remember') ? 'checked' : '' }}" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions</span>
													</label>
										</div>
										<div class="form-footer">
											<button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="text-center text-muted mt-3">
											Don't have account yet? <a href="{{ route('register') }}">Sign up</a>
										</div>
										<div class="flex-c-m text-center mt-5">
											
											<a href="{{ route('password.request') }}" class="login100-social-item bg3">
												<i class="fa fa-lock"></i>
											</a>
										</div>
									</div>
								</form>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		
		<!-- Dashboard js -->
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
				 
		 @if ($errors->has('password'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('password') }}"
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
				 
				 
		@if (session()->has('message'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.notice({
				message: "{!! session()->get('message')  !!}"
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
    </div>

@endsection
