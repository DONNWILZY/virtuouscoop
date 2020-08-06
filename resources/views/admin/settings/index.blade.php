@extends('layouts.admin')

@section('title', 'System Settings')

@section('content')
					 <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
 
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">System Settings</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">System Settings</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
							 <form class="card" action="{{route('generalSettings',['id'=>$settings->id])}}" method="post">
                                {{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Update Settings</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label class="form-label">System Slogan</label>
													<input id="site_title" name="site_title" type="text" value="{{$settings->site_title}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label class="form-label">System Name</label>
													<input id="site_name" name="site_name" type="text" value="{{$settings->site_name}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Company Name</label>
													<input id="company_name" name="company_name" type="text" value="{{$settings->company_name}}" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Company's Email</label>
													<input id="contact_email" name="contact_email" value="{{$settings->contact_email}}" type="text" class="form-control">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Company's Phone</label>
													<input id="contact_number" name="contact_number" type="text" value="{{$settings->contact_number}}" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">System E-mail Address</label>
													<input id="app_contact" name="app_contact" type="text" value="{{$settings->app_contact}}" class="form-control">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Company's Address</label>
													<textarea rows="5" class="form-control" name="address" type="text" value="{{$settings->address}}"  placeholder="Enter Company's Address'">{{$settings->address}}</textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update System Settings</button>
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

