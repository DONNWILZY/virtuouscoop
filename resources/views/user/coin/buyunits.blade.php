@extends('layouts.dashboard')
@section('title', 'Buy Coin Share')
@section('content')
        
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
			<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Buy Coins Share</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Buy Coins Share</li>
							</ol>
						</div>
						<div class="row row-deck">
						  
							<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Buy Coins Shares</h3>
									</div>
									<div class="card-body p-2">
										<div>
												<form action="{{route('userBuyunits.submit')}}" class="card" method="post">
                                        {{ csrf_field() }}
                                      
									<div class="card-header">
										<h3 class="card-title">Available Fund For Purchase: <b>{{config('app.currency_symbol')}} {{$user->profile->main_balance +0}}</h3></b>
                               
									</div>
									
									
                                   		<div class="card-body ">
										<div class="form-group ">
											<label class="form-label">Select Coin To Purchase</label>
											<select class="form-control select2" name="coin" data-placeholder="Choose one">
											<option value="">Select Coin</option>
											@if($cryptocoins)
                       						 @foreach($cryptocoins as $cryptocoins)
						
											<option value="{{$cryptocoins->id}}">{{$cryptocoins->name}}</option>
											 @endforeach
                 	   						 @endif
											</select>
										
										</div>
										<div class="form-group">
											<label class="form-label"> Enter Units To Purchase</label>
											<input class="form-control" name="unit" placeholder="Please Enter Unit">
											<input class="form-control" hidden name="available" value="{{$user->profile->main_balance +0}}">
											<input class="form-control" hidden name="curr" value="{{config('app.currency_symbol')}}">
											
										</div>
											
										<div class="col-md-12">
										<b style="color:red;"> Terms & Condition:</b> <a style="color:red;">Coin trading on {{$settings->company_name}} is controlled by {{$settings->company_name}} robot. {{$settings->company_name}} will not be liable to any loss incurred from trading coin on our platform. </a>
											<br> <label class="custom-switch">
														<input type="checkbox" required  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions </span>
														<br>
														
													</label>
										</div> <hr>
										
										
										<button type="submit" class="btn btn-primary pull-right">Purchase Coins</button>
									</div>
								</form>
										</div>
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
		   return $.growl.error({
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
				message: "{{$error}}"
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