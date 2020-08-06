@extends('layouts.dashboard')
@section('title', 'Buy Gift Card')
@section('content')

		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
			<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Buy Gift Card</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Buy Gift Card</li>
							</ol>
						</div>
						<div class="row row-deck">
						  
							<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Buy Gift Card</h3>
									</div>
									<div class="card-body p-2">
										<div>
											<div class="row img-gallery">
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{asset('cards\netflix.png')}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{asset('cards\amazon.png')}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{asset('cards\itunes.png')}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{asset('cards\wallmart.png')}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{asset('cards\google.png')}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{asset('cards\xbox.png')}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													</a>
												</div>
											</div>
											
												<form action="{{route('userBuy.post')}}" class="card" method="post">
                                        {{ csrf_field() }}
                                      
									<div class="card-header">
										<h3 class="card-title">Available Fund For Purchase: <b>{{config('app.currency_symbol')}} {{$user->profile->main_balance +0}}</h3></b>
                               
									</div>
									
									
                                   		<div class="card-body ">
										<div class="form-group ">
											<label class="form-label">Select Gift Card</label>
											<select class="form-control select2 custom-select" name="gateway" data-placeholder="Choose one">
											<option value="">Select Card</option>
											<option value="I-tunes Card">I-Tunes Card</option>
                                            <option value="Amazon Gift Card">Amazon Card</option>
                                             <option value="Netflix Gift Card">Netflix Gift Card</option>
                                             <option value="Wallmart Gift Card">Wallmart Gift Card</option>
                                             <option value="Google Play Gift Card">Google Play Gift Card</option>
                                             <option value="Xbox Gift Card">Xbox Gift Card</option>
                                             <option value="Playstation Gift Card">Playstation Gift Card</option>
                                             <option value="Other Gift Cards">Others "Please specify card type using the card delivery details field"</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label"> Enter Amount</label>
											<select class="form-control select2 custom-select" name="amount" data-placeholder="Choose one">
											<option value="">Select Amount</option>
											<option value="5">$ 5 <b>"Equivalent: {{$settings->dollar_rate * 5}}{{config('app.currency_symbol')}}"</b></option>
											<option value="15">$15 <b>"Equivalent: {{$settings->dollar_rate * 15}}{{config('app.currency_symbol')}}"</b></option>
											<option value="25">$ 25 <b>"Equivalent: {{$settings->dollar_rate * 25}}{{config('app.currency_symbol')}}"</b></option>
                                            <option value="50">$ 50 <b>"Equivalent: {{$settings->dollar_rate * 50}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="75">$ 75 <b>"Equivalent: {{$settings->dollar_rate * 75}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="100">$ 100 <b>"Equivalent: {{$settings->dollar_rate * 10}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="125">$ 125 <b>"Equivalent: {{$settings->dollar_rate * 125}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="150">$ 150 <b>"Equivalent: {{$settings->dollar_rate * 150}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="200">$ 200 <b>"Equivalent: {{$settings->dollar_rate * 200}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="500">$ 500 <b>"Equivalent: {{$settings->dollar_rate * 500}}{{config('app.currency_symbol')}}"</b></option>
                                             <option value="1000">$ 1000 <b>"Equivalent: {{$settings->dollar_rate * 1000}}{{config('app.currency_symbol')}}"</b></option>
											</select>
										</div>
										<input type="text" hidden name="currency" value="{{config('app.currency_symbol')}}" >
										
										<div class="form-group">
											<label class="form-label">Enter Delivery Details<br>
											<code>Please note that card price is calculated in {{config('app.currency_symbol')}}. Purchase will be charged based on conversion of $1 to {{$settings->dollar_rate}}{{config('app.currency_symbol')}}. there will be a service charge for home delivery of gift cards. You will be contacted by our customer's care representative to facilitate home delivery if requested.</code></label>
											<textarea rows="5" name="account" class="form-control" placeholder="Email Address or Home Address You Want Gift Card Delivered To"></textarea>
											
										</div>
										
										
										<button type="submit" class="btn btn-primary pull-right">Buy Gift Card</button>
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