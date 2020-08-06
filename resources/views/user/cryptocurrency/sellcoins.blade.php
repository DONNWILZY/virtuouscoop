@extends('layouts.dashboard')
@section('title', 'Sell Cryptocurrency')
@section('content')
        
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets\plugins\date-picker\spectrum.css')}}" rel="stylesheet" />
        <link href="{{asset('assets\plugins\fileuploads\css\dropify.min.css')}}" rel="stylesheet" />
		<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Sell Crypto</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Sell Crypto</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-12">
								 <form action="{{route('userSellcoin.submit')}}" class="card" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                               
									<div class="card-header">
										<h3 class="card-title">Sell Cryptocurrency</h3>
									</div>
									<div class=" card-body">
										<div class="row">
										<div style="width: 100%; height:62px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #7532a4;padding:1px;padding: 0px; margin: 0px;"><div style="height:40px;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=light&pref_coin_id=1505&invert_hover=no" width="100%" height="36" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing:content-box; margin: 5px 6px 10px 0px; font-family: Verdana, Tahoma, Arial, sans-serif;"><b>Powered by&nbsp;<a href="#" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size: 11px;">{{$settings->company_name}}</p></a></div></div>
									<div class="col-md-12 col-lg-12 col-xl-12">
										<br>
								<div class="card">
									<div class="card-header border-bottom">
										<h5 class="card-title">Cryptocurrency Wallet Address</h5>
									</div>
									<div class="card-body">
										<div class="clearfix row border-bottom p-1">
											<div class="col">
												<div>
													<div class="float-left">
														<h5><strong>Bitcoin</strong></h5>
														
													</div>
												</div>
											</div>
											<div class="col">
												<div class="float-right">
												  <h4 class="font-weight-semibold label-medium-size mt-4 mb-0 text-primary">{{$settings->bitcoin}}</h4>
												</div>
											</div>
										</div>

										<div class="clearfix row mt-3 border-bottom p-1">
											<div class="col">
												<div>
													<div class="float-left">
														<h5><strong>Ethereum</strong></h5>
														
													</div>
												</div>
											</div>
											<div class="col">
												<div class="float-right">
												  <h4 class="font-weight-semibold label-medium-size mt-4 mb-0 text-success">{{$settings->ethereum}}</h4>
												</div>
											</div>
										</div>

										<div class="clearfix row mt-3 border-bottom p-1">
											<div class="col">
												<div>
													<div class="float-left">
														<h5><strong>Lite Coin</strong></h5>
														
													</div>
												</div>
											</div>
											<div class="col">
												<div class="float-right">
												  <h4 class="font-weight-semibold label-medium-size mt-4 mb-0 text-warning">{{$settings->lite}}</h4>
												</div>
											</div>
										</div>

										<div class="clearfix row mt-3 p-1">
											<div class="col">
												<div>
													<div class="float-left">
														<h5><strong>Ripple </strong></h5>
														
													</div>
												</div>
											</div>
											<div class="col">
												<div class="float-right">
												  <h4 class="font-weight-semibold label-medium-size mt-4 mb-0 text-secondary">{{$settings->ripple}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
										<br>
										<div class="form-group">
											
											<label class="form-label">Select Coin Type</label>
											<select name="name" class="form-control select2">
											
											<option value="">Select Coin</option>
											<option value="Bitcoin">Bitcoin</option>
											<option value="Ripple">Ripple</option>
                                            <option value="Doge Coin">Doge Coin</option>
                                            <option value="Lite Coin">Lite Coin</option>
                                             <option value="Ethereum">Ethereum</option>

                                        	</select>
											
										</div>
										
										
										<br>
										<div class="wd-200 mg-b-30">
										<label class="form-label">Enter Transaction ID<br>
										<code>Please note that entering fake transaction ID or Transaction Number will result to your transaction being marked as fraud and your account banned</code></label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-qrcode tx-16 lh-0 op-6"></i>
													</div>
												</div><input class="form-control fc-datepicker" name="number" type="text" placeholder="Payment Transaction Number" type="text">
											</div>
										</div>
										
										
										<br>
										<div class="form-group">
											
												<label class="form-label">Enter coin value</label>
											<input type="text" class="form-control" placeholder="Units of coin. e.g 00000.002"name="amount">
											
											
										</div>
										<div class="form-group">
										<label class="form-label">Upload Payment Screenshot</label>
											<div class="custom-file">
											
												<input type="file" class="custom-file-input" name="photo">
												<label class="custom-file-label">Select Image</label>
											</div>
										</div>
										
										<div class="form-group">
											<label class="form-label">Receiving Account's Details<br>
											<code>Please enter the receivers account details. For bank transfer please provide complete bank details with your bank's SWIFT code. If you want coins sales remitted to your {{$settings->company_name}} online wallet please specify below</code></label>
											<textarea rows="5" name="account" class="form-control" placeholder="Bank account details, Paypal Username, etc"></textarea>
											
										</div>
										<div class="col-md-12">
										<b style="color:red;"> Terms & Condition: Coin value is calculated in accordance with the dollar market. {{$settings->company_name}} will not be liable to any loss or delay incurred from providing wrong account details or delay in bank transfer network. </b>
											<br> <label class="custom-switch">
														<input type="checkbox" required  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions </span>
														<br>
														
													</label>
										</div> <hr>
										
										
										
										<div class="form-group">
										<br>
											
                                			<button type="submit" class="btn btn-primary pull-right">Sell Cryptocurrency</button>
                                			<a href="{{route('userDashboard')}}"><button type="submit" class="btn btn-secondary">Cancel Sale</button></a>
                                			
											
											
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			
			
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="assets\js\select2.js"></script>
		<script src="assets\plugins\select2\select2.full.min.js"></script>
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		
		<!-- Custom Js-->
		  <script src="{{asset('assets\plugins\fileuploads\js\dropify.min.js')}}"></script>
        
        
		<script src="{{asset('assets\plugins\date-picker\spectrum.js')}}"></script>
		<script src="{{asset('assets\plugins\date-picker\jquery-ui.js')}}"></script>
		<script src="{{asset('assets\plugins\input-mask\jquery.maskedinput.js')}}"></script>
		
		
		<script src="{{asset('assets\plugins\time-picker\jquery.timepicker.js')}}"></script>
		<script src="{{asset('assets\plugins\time-picker\toggles.min.js')}}"></script>
		
        <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a clear image of your giftcard here or click to upload. <b><br>Ensure to upload a clear image as blurry or unclear image will not be processed</b>',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (2M max).'
                }
            });
        </script>
        
        
          @if(count($errors) > 0)
         @foreach($errors->all() as $error) <script>
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