@extends('layouts.admin')

@section('title', 'Edit Payment Gateway')

@section('content')
	 <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
 
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Update Payment Gateway</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update Payment Gateway</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
							 <form class="card" action="{{route('admin.gateway.update',['id'=>$gateway->id])}}" method="post">
                                {{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Update {{$gateway->name}} Gateway</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label class="form-label">Payment Gateway Name</label>
													<input id="name" name="name" type="text" value="{{$gateway->name}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													 @if($gateway->id == 3)
													<label  class="control-label" for="account">Gateway Merchant ID</label>
												@else
													<label  class="control-label" for="account">Gateway Account</label>
												@endif

												<input id="account" name="account" type="text" value="{{$gateway->account}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label  class="control-label" for="fixed">Gateway Fixed Fee</label>
                                   					 <input id="fixed" name="fixed" type="text" value="{{$gateway->fixed}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label  class="control-label" for="percent">Gateway Percentage Fee</label>
                                   					 <input id="percent" name="percent" type="text" value="{{$gateway->percent}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													 @if($gateway->id == 3)
														<label  class="control-label" for="val1">Gateway Public Key</label>
													@else
														<label  class="control-label" for="val1">Gateway Client Id</label>
													@endif
													<input id="val1" name="val1" type="text" value="{{$gateway->val1}}" class="form-control">
													<input id="val1" name="mode" hidden type="text" value="@if($gateway->mode == 0)0 @endif @if($gateway->mode == 1)1 @endif" class="form-control">
												</div>
											</div>
												<div class="col-md-12">
													<div class="form-group">
													@if($gateway->id == 3)
												<label  class="control-label" for="val2">Gateway Private Key</label>
												@else
												<label  class="control-label" for="val2">Gateway Client Id</label>
												@endif
												<input id="val2" name="val2" type="text" value="{{$gateway->val2}}" class="form-control">
													</div>
												</div>
												@if($gateway->id == 3)
												<div class="col-md-12">
													<div class="form-group">
													<label  class="control-label" for="val3">Gateway IPN Secret Key</label>
                                       				 <input id="val3" name="val3" type="text" value="{{$gateway->val3}}" class="form-control">
                                                </div>
												</div>
												 @endif
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Allow or Deactivate Payment Gateway</label>
													<select  name="status" class="form-control select2 custom-select" >
													<option value="0"
													@if($gateway->status == 0)
													selected
													@endif
													>Not Active</option>
													<option value="1"
													@if($gateway->status == 1)
													selected
													@endif

													>Already Active</option>
												</select>
												</div>
											</div>
											
											
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update Payment Gateway</button>
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

