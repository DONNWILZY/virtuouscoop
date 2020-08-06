@extends('layouts.dashboard')
@section('title', 'Sell Coin Shares')
@section('content')
        
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets\plugins\date-picker\spectrum.css')}}" rel="stylesheet" />
        <link href="{{asset('assets\plugins\fileuploads\css\dropify.min.css')}}" rel="stylesheet" />
		<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Sell Coins</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Sell Coins</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-12">
												
											
								<form action="{{route('userSellunits2')}}" class="card" method="post">
                                            {{ csrf_field() }}
                                        	<div class="card-header">
										<h3 class="card-title">Sell Coins</h3>
									</div>
									
									<div class=" card-body">
									<div style="width: 100%; height:62px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px;"><div style="height:40px;">
									<marquee><h3>
									@if($cryptocoins3)
                       				    	@foreach($cryptocoins3 as $cryptocoins3)
										  <b>Coin Name:</b><a style="color:purple;"> {{$cryptocoins3->name}} </a> <b>Cost Price: </b><a style="color:purple;">{{config('app.currency_symbol')}}{{$cryptocoins3->price}} /Unit</a> <b>Selling Price:</b> <a style="color:purple;">{{config('app.currency_symbol')}}{{$cryptocoins3->sell}} /Unit.......</a>
											@endforeach	
											@endif</marquee></h3>
									</div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing:content-box; margin: 5px 6px 10px 0px; font-family: Verdana, Tahoma, Arial, sans-serif;">Powered by&nbsp;<a href="#" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size: 11px;">{{$settings->company_name}}</a></div></div>
						<br>
										<div class="row">
											
											
											<br><br><br><br><br>
											
									<div class="col-lg-12 col-xl-12 col-sm-12">
									<div class="card">
									<div class="card-header">
									@if($count->done > 1)
										<div class="card-title" style="color:red;">You Have Not Purchased Any Coin Share</div>
									@endif
									@if($count->done == 1)
									<div class="card-title">My Coin Market Values</div>
									@endif
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table border table-bordered mb-0">
												<thead>
											
													<tr>
														<th>Purchase ID</th>
														<th>Icon</th>
														<th>Name</th>
														<th>Units</th>
														<th>Date</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
												@if($count->done == 1)
												
												@if($cryptocoins)
                       				  		    @foreach($cryptocoins as $cryptocoins)
													<tr>
														<td>{{$cryptocoins->transaction_id}}</td>
														<td><img src="{{asset('assets\images\crypto-currencies\iota.svg')}}" class="w-4 h-4" alt=""></td>
														<td>{{$cryptocoins->name}}</td>
														<td>{{$cryptocoins->units}} Units</td>
														<td>{{$cryptocoins->created_at->diffForHumans()}}</td>
														<td><span class="badge badge-gradient-info">Active</span></td>

													</tr>
											 @endforeach
											 @endif
											 
											 @endif
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div>
							</div>
										<br>
										@if($count->done == 1)
										<div class="form-group">
											<label class="form-label">Select Coin Type</label>
											<select name="id" class="form-control select2">
											@if($cryptocoins2)
                       				    	@foreach($cryptocoins2 as $cryptocoins2)
										    <option value="{{$cryptocoins2->id}}">{{$cryptocoins2->name}} {{$cryptocoins2->units}} Units</option>
											@endforeach	
											@endif
                                        	</select>
											
										</div>
										<br>
										<div class="wd-200 mg-b-30">
										<label class="form-label">Enter Units To Sell<br>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-qrcode tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" name="units" type="text" placeholder="Payment Transaction Number" type="text">
												<input class="form-control fc-datepicker" hidden name="name" type="text" value="{{$cryptocoins2->name}}" type="text">
												<input class="form-control fc-datepicker" hidden name="coin" type="text" value="{{$cryptocoins2->coinid}}" type="text">
											</div>
										</div>
										
										
										<br>

										<div class="col-md-12">
										<b style="color:red;">Terms & Condition: Coin trading on {{$settings->company_name}} is controlled by {{$settings->company_name}} robot. {{$settings->company_name}} will not be liable to any loss incurred from trading coin on our platform. </b>
											<br> <label class="custom-switch">
														<input type="checkbox" required  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions </span>
														<br>
														
													</label>
										</div> <hr>
										
										
										
										<div class="form-group">
										<br>
											
                                			<button type="submit" class="btn btn-primary pull-right">Sell Coins</button>
                                			<a href="{{route('userDashboard')}}"><button type="submit" class="btn btn-secondary">Cancel Sale</button></a>
                                		@endif
											
											
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
				 
@endsection