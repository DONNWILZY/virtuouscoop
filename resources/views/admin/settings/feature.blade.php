@extends('layouts.admin')

@section('title', 'System Features Setting')

@section('content')
					 <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
 
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">System Feature Settings</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Feature Settings</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
							 <form class="card" action="{{route('featuresSettings',['id'=>$settings->id])}}" method="post">
                                {{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Update Feature</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="form-label">Allow or Disallow User Investment </label>
													 <select name="invest" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->invest == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->invest == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Fund Withdrawal</label>
												<select  name="withdraw" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->withdraw == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->withdraw == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Fund Deposits</label>
                                            <select  name="deposit" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->deposit == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->deposit == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Buy Coin Shares</label>
												<select name="coin" class="form-control select2 custom-select" >
                                                <option value="0"
                                                        @if($settings->coinsystem == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->coinsystem == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Coin Shares Reselling</label>
												<select  name="coinsell" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->coinsell == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->coinsell == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Fund Transfer</label>
												<select name="transfer" class="form-control select2 custom-select" >
                                                <option value="0"
                                                        @if($settings->transfer == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->transfer == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Deposits & Withdrawal "Homepage View"</label>
												<select  name="latest_deposit" class="form-control select2 custom-select" >
												 <option value="0"
                                                        @if($settings->latest_deposit == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->latest_deposit == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
                                            </select>
												</div>
											</div>
											
											
											
												<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Gift Card</label>
												<select name="card" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->gift == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->gift == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Crypto-Currency</label>
												<select name="crypto" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->crypto == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->crypto == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Daily Login Reward</label>
												<select name="daily_login" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->login == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->login == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
										<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Loan Facility</label>
												<select name="loan" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->loan == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->loan == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											
																						
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update System Feature</button>
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

