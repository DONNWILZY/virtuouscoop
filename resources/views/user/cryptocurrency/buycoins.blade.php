@extends('layouts.dashboard')
@section('title', 'Buy Cryptocurrency')
@section('content')

		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
			<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Buy Cryptocurrency</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Buy Crypto</li>
							</ol>
						</div>
						<div class="row row-deck">
						  
							<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Buy Crypto</h3>
									</div>
									<div class="card-body p-2">
										<div>
												
												
												<div style="height:433px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #7532a4; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #7532a4; padding: 0px; margin: 0px; width: 99%;"><div style="height:413px;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing:content-box; margin: 3px 6px 10px 0px; font-family: Verdana, Tahoma, Arial, sans-serif;"><b>Powered by&nbsp;<a href="#" style="font-weight: 500; color: #FFFFFF; text-decoration:none;font-size:11px">{{$settings->company_name}}</b></a></div></div>	
												
										
												
											   	<form action="{{route('userBuycoins2')}}" class="card" method="post">
                                        {{ csrf_field() }}
                                      
									<div class="card-header">
										<h3 class="card-title">Available Fund For Purchase: <b>{{config('app.currency_symbol')}} {{$user->profile->main_balance +0}}</h3></b>
                               
									</div>
									
									
                                   		<div class="card-body ">
										<div class="form-group ">
											<label class="form-label">Select Cryptocurrency</label>
											<select class="form-control select2 custom-select" name="gateway" data-placeholder="Choose one">
											<option value="">Select Card</option>
											<option value="Bitcoin">Bitcoin</option>
                                            <option value="Doge Coin">Doge Coin</option>
                                            <option value="Lite Coin">Lite Coin</option>
                                             <option value="Ethereum">Ethereum</option>
                                             <option value="Other Coins">Others "Please specify coin type using the coin delivery details field"</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label"> Enter Amount (in {{config('app.currency_symbol')}})</label>
											<input class="form-control" name="amount" placeholder="Enter Amount">
											
										</div>
										
										<div class="form-group">
											<label class="form-label">Enter Coin Delivery Details<br>
											<code>Please enter the wallet address or account ID of the receiving coin gateway. Please specify the correct coin payment gateway below</code></label>
											<textarea rows="5" name="account" class="form-control" placeholder="Wallet Address or Account ID"></textarea>
											
										</div>
										
										<div class="col-md-12">
										<b style="color:red;"> Terms & Condition: Coin value is calculated in accordance with the cryptocurrency & dollar market. {{$settings->company_name}} will not be liable to any loss or delay incurred from providing wrong account details or delay in bank transfer network. </b>
											<br> <label class="custom-switch">
														<input type="checkbox" required  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions </span>
														<br>
														
													</label>
										</div> <hr>
										
										
										<button type="submit" class="btn btn-primary pull-right">Buy Cryptocurrency</button>
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