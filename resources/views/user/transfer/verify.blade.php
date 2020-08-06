@extends('layouts.dashboard')
@section('title', 'Enter OTP')
@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
						<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Enter OPT</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Enter OTP</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-12">
								<form class="card" action="{{route('userFundsTransfer.check',$transfer->reference)}}" method="post">
                                    {{ csrf_field() }}
                                   
									<div class="card-header">
										<h3 class="card-title">Enter Transfer OTP</h3>
									</div>
									<div class="card-body">
									    <div class="form-group">
											
											Enter the OTP sent to your mail below and click on confirm transfer button to verify code and execute transfer
										</div>
										
										<div class="form-group">
											<label class="form-label">Enter OTP</label>
										 <input id="code" name="code" type="text" placeholder="Enter One Time Password" required class="form-control">
										</div>
										
									</div>
									<div class="card-footer text-right">
										<div class="d-flex">
											<a href="{{route('userDashboard')}}" class="btn btn-link">Cancel</a>
											<button type="submit" class="btn btn-primary ml-auto">Confirm Transfer</button>&nbsp; &nbsp; 
											 <a href="{{route('userFundsTransfer.resend',$transfer->reference)}}" class="btn btn-info">Resend OTP</a>
										</div>
									</div>
								</form>
							</div>
							
						</div>
						
						</div>
					</div>
				</div>
			</div>
			
		<script src="assets\js\select2.js"></script>
		<script src="assets\plugins\select2\select2.full.min.js"></script>
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
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
		  
		   @if (session()->has('message'))
		  <script>
		 (function () {
		  $(function () {
		   return $.growl.warning({
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
@endsection