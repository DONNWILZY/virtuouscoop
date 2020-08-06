@extends('layouts.admin')

@section('title', 'Earnings Settings')

@section('content')
					 <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
 
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">System Earning Settings</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">System Earning</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
							 <form class="card" action="{{route('earningsSettings',['id'=>$settings->id])}}" method="post">
                                {{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Update Earning</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label class="form-label">Minimum Deposit</label>
													<input id="minimum_deposit" name="minimum_deposit" type="text" value="{{$settings->minimum_deposit +0}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label class="form-label">Minimum Withdrawal</label>
													<input id="minimum_withdraw" name="minimum_withdraw" type="text" value="{{$settings->minimum_withdraw +0}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Signup Bonus</label>
													 <input id="signup_bonus" name="signup_bonus" type="text" value="{{$settings->signup_bonus + 0}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Referral Signup Bonus</label>
													<input id="referral_signup" name="referral_signup" type="text" value="{{$settings->referral_signup + 0}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Referral Deposit Bonus</label>
													<input id="referral_deposit" name="referral_deposit" type="text" value="{{$settings->referral_deposit + 0}}" class="form-control">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Dollar Exchange Rate (to {{config('app.currency_symbol')}}) <code style="color:purple;">This is needed to facilitate Cryprocurrency Sales & Gift Card Sales</code></label>
													<input id="referral_deposit" name="rate" type="text" value="{{$settings->dollar_rate + 0}}" class="form-control">
												</div>
											</div>
											<br>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">System Gift Card Purchase Percent</label>
													<input id="referral_signup" name="giftcard" type="text" value="{{$settings->card_percent + 0}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">System Cryptocurrency Sales Percent</label>
													<input id="referral_deposit" name="crypto" type="text" value="{{$settings->coin_percent + 0}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label class="form-label">Daily Login Earning</label>
													<input id="daily_rewards" name="daily_rewards" type="text" value="{{$settings->daily_rewards + 0}}" class="form-control">
												</div>
											</div>
											
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label class="form-label">Minimum % Balance for Loan Request</label><br><code>This is the minimum % of loan request a user must have in the wallet before eligible for loan</code>
													<input id="daily_rewards" name="loan" type="text" value="{{$settings->loanpercent + 0}}" class="form-control">
												</div>
											</div>
											
											
											
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update System Earning</button>
									</div>
								</form>
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

