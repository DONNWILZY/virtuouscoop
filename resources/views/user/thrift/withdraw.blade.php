@extends('layouts.dashboard')
@section('title', 'Withdraw Contribution')
@section('content')

		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Withdraw Contribution</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Withdraw Contribution</li>
							</ol>
						</div>
						<div class="row row-deck">
						

						
								<form action="{{route('userWithdraw.post')}}" class="card" method="post">
                                        {{ csrf_field() }}
                                      
									<div class="card-header">
										<h3 class="card-title">Available For Withdrawal: <b>{{config('app.currency_symbol')}} {{$user->profile->contribution_balance +0}}</h3></b>
                               
									</div>
									
									
                                   		<div class="card-body ">
										<div class="form-group ">
											<label class="form-label">Select Withdrawal Method</label>
											<select class="form-control select2 custom-select" name="gateway" data-placeholder="Choose one">
												<option label="Choose one">
												</option>
												       @if($gate->status == 1)
                                                        <option value="1000">{{$gate->name}}  <b>(Service Charge: {{config('app.currency_symbol')}}{{$gate->fixed}} )</b></option>
                                                        @endif

                                                        @foreach($gateways as $gateway)
                                                            <option value="{{$gateway->id}}">{{$gateway->name}}  <b>(Service Charge: {{config('app.currency_symbol')}}{{$gateway->fixed}} + {{$gateway->percent}}% of request )</b></option>
                                                        @endforeach
                                                         <option value="Western Union">Western Union <b>(Service Charge: 3% of request)</b></option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label"> Enter Amount</label>
											<input id="amount" name="amount" type="text" placeholder="Enter Amount" class="form-control">
										</div>
										<div class="form-group">
											<label class="form-label">Enter Account Details</label>
											<textarea rows="5" name="account" class="form-control" placeholder="Enter About your account description"></textarea>
											
										</div>
										<button type="submit" class="btn btn-primary pull-right">Withdraw Fund</button>
									</div>
								</form>
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