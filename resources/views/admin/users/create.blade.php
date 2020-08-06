@extends('layouts.admin')

@section('title', 'Create Member Profile')

@section('content')

					<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
					 <script src="{{asset('process/countries.js')}}"></script>	
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Create Users</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Users</li>
							</ol>
						</div>
  {{ csrf_field() }}
                       
						<div class="row row-cards">

							<div class="col-lg-12 col-12 col-xl-12">
								<div class="card">
									<div class="card-header border-bottom-0">
										<h3 class="card-title">Create Users</h3>
									</div>
									<div>
										<div class="table-responsive border-top">
										
								<form class="card authentication" method="post" action="{{route('admin.user.store')}}">
								 {{ csrf_field() }}
									<br>
										<span> @if(Cookie::get('code'))
										<p style="color:red;">You Were Referred By: <b>{{ Cookie::get('code') }}</b>. <br>Remember to share your referral link when you register too. It will fetch you {{config('app.currency_symbol')}} {{$settings->referral_signup}}</p></code>
											@endif</h1><br>
										</strong></center>
									     
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">Your Name </label>
												<input type="text" class="form-control" placeholder="First name and last name"  name="name" value="{{ old('name') }}" required autofocus >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">Phone </label>
											<input type="text" class="form-control" placeholder="(+000)0000000000"  name="mobile" required autofocus >
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email</label>
													<input type="text" class="form-control" placeholder="yourname@domain.com" type="email" class="form-control" name="email" required>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Username</label>
													<input type="text" class="form-control" placeholder="Username" name="username"  required autofocus>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Password</label>
													<input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Enter Password" type="password" class="form-control" name="password" required>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Confirm Password</label>
													<input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Enter Password Again" type="password" class="form-control" name="confirm-password" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">House Address</label>
													<input type="text" class="form-control" name ="address" placeholder="Enter Address">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Country</label>
													<select onchange="print_state('state', this.selectedIndex);" id="country" required  name ="country" class="form-control select2"/></select>
											 <script language="javascript">print_country("country");</script>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label class="form-label">State</label>
													<select  name ="state" required  id ="state" class="form-control select2">
													<option value="">Select state</option></select>
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label class="form-label">Zip Code</label>
													<input type="number" class="form-control" name ="zip" placeholder="Enter Zip Code" value="{{ old('zip') }}">
												</div>
											</div>
											 @if(Cookie::get('code'))
													<input type="text" hidden class="form-control mb-0" id="exampleInputPassword1" placeholder="Sponsor Username" name="referred" value="{{ Cookie::get('code') }}" disabled required autofocus>
												
											@endif
											<div class="col-md-12">
											{!! Recaptcha::render() !!}
											</div>
										</div>
									</div>
									<div class="col-md-3">
											<label class="custom-switch">
														<input type="checkbox" required  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions</span>
													</label>
										</div> <hr>
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary btn-block">Create new account</button>
										</div>
										<br><br>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
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
		   
		   @if(count($errors) > 0)
		    @foreach($errors->all() as $error)
		  <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{$error}} "
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
		  @endforeach
		   @endif
		
@endsection
