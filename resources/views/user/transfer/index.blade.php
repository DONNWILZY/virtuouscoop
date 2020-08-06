@extends('layouts.dashboard')
@section('title', 'Balance Transfer')
@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
<link href="assets\plugins\select2\select2.min.css" rel="stylesheet">
						<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Transfer Fund</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Transfer Fund</li>
							</ol>
						</div>
						<div class="row row-deck">
							<div class="col-lg-6">
								<form class="card" action="{{route('userFundsTransfer.self')}}" method="post">
                                {{ csrf_field() }}
                          
									<div class="card-header">
										<h3 class="card-title">Convert Bonus & Earnings</h3>
									</div>
									<div class="card-body">
									
										<div class="form-group">
											<label class="form-label">Select Wallet To Transfer From</label>
										<select class="form-control select2" name="account" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" > Deposit Balance: {{config('app.currency_symbol')}} {{Auth::user()->profile->deposit_balance + 0}}</option>
                                            <option value="2" > Earning Balance: {{config('app.currency_symbol')}} {{Auth::user()->profile->main_balance + 0}}</option>
                                            <option value="3" selected> Referral Balance: {{config('app.currency_symbol')}} {{Auth::user()->profile->referral_balance + 0}}</option>
                                        </select>
										</div>
										
										<div class="form-group">
											<label class="form-label">Enter Amount</label>
											<input type="number" class="form-control" name="amount" placeholder="amount">
										</div>
										<div class="form-group">
											<label class="form-label">Select Receiving Wallet</label>
										<select class="form-control select2" name="transfer" >
										    
                                            <option value="1" selected >Deposit Balance</option>
                                            <option value="2" >Earning Balance</option>
                                        </select>
										</div>
										
									</div>
									<div class="card-footer text-right">
										<div class="d-flex">
											<a href="{{route('userDashboard')}}" class="btn btn-link">Cancel</a>
											<button type="submit" class="btn btn-primary ml-auto">Convert Fund</button>
										</div>
									</div>
								</form>
							</div>
							<div class="col-lg-6">
							    	
							     <form class="card" action="{{route('userFundsTransfer.others')}}" method="post">
                                {{ csrf_field() }}
                          
									<div class="card-header">
										<h3 class="card-title">Transfer Earnings To Users</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label class="form-label">Select Wallet To Transfer From</label>
											<select name="account" class="form-control select2">
											
											 <option value="1" selected >Main Balance: {{config('app.currency_symbol')}} {{Auth::user()->profile->main_balance + 0}}</option>
                                            <option value="2" >Deposit Balance: {{config('app.currency_symbol')}} {{Auth::user()->profile->deposit_balance + 0}}</option>

                                        	</select>
										</div>
										<div class="form-group">
											<label class="form-label">Amount</label>
											<input id="amount" name="amount" type="number" class="form-control">
										</div>	
										
										<div class="form-group">
											<label class="form-label">Receiver's Email</label>
											<input id="email" name="email" type="email" class="form-control">
										</div>	
										
									</div>
									<div class="card-footer text-right">
										<div class="d-flex">
											<a href="{{route('userDashboard')}}" class="btn btn-link">Cancel</a>
											<button type="submit" class="btn btn-primary ml-auto">Transfer Fund</button>
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
@endsection