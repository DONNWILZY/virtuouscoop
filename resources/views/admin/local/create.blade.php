@extends('layouts.admin')

@section('title', 'Create Payment Gateway')

@section('content')

     <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
 
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Create New Gateway</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">New Gateway</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
							 <form class="card" action="{{route('admin.local.store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Create New Gateway</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label class="form-label">Payment Gateway Name</label>
													<input id="name" name="name" type="text" Placeholder="Gateway Name" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label  class="control-label" for="account">Gateway Type</label>
												<input id="account" name="account" type="text" Placeholder="Gateway Type" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label  class="control-label" for="fixed">Gateway Fixed Fee</label>
                                   					 <input id="fixed" name="fixed" type="text" placeholder="Fixed fee" class="form-control">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
											<div class="form-group">
											<label  class="control-label" for="fixed">Gateway Icon</label>
											<div class="custom-file">
											
													<input class="custom-file-input" type="file" name="image">
													<label class="custom-file-label">Upload Image</label>
												</div>
											</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label  class="control-label" for="percent">Gateway Percentage Fee</label>
                                   					 <input id="percent" name="percent" type="text" placeholder="Percentage fee" class="form-control">
												</div>
											</div>
												<div class="col-md-12">
													<div class="form-group">
													<label  class="control-label" for="val3">Account Details</label>
                                       				<textarea class="form-control" name="details" id="details" rows="6">Account Details</textarea>
                                                </div>
												</div>
												
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Allow or Deactivate Payment Gateway</label>
													<select  name="status" class="form-control select2 custom-select" >
													<option value="0">Not Active</option>
													<option value="1">Active</option>
												</select>
												</div>
											</div>
											
											
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Create Payment Gateway</button>
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

