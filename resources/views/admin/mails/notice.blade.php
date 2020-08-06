@extends('layouts.admin')

@section('title', 'Send Message To User')
@section('content')

<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
   <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Send Message</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Send Message</li>
							</ol>
						</div>
						
					
						<div class="row">
							<div class="col-lg-12">
							<form action="{{route('adminMessage.send')}}" class="card" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Send Message</h3>
									</div>
									<div class="card-body">
										<div class="row">
										
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Receiver</label>
													 <select name="status" class="form-control select2"">
													 <option value="1">One User</option>
                                       				 <option value="2">All Users</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Receiver's Email</label>
													 <input type="email" id="email" name="email" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label class="form-label">Mail Image</label>
												<div class="custom-file">
												<input type="file" name="featured" class="custom-file-input" name="example-file-input-custom">
												<label class="custom-file-label">Choose Image</label>
											</div>
											</div>
											</div>
											
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Subject</label>
													 <input type="text" id="subject" name="subject" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Mail Priority</label>
													 <select name="priority"  class="form-control select2"">
													<option value="1">Normal</option>
													<option value="2">Medium</option>
													<option value="3">High</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Mail Content</label>
													<textarea name="body" rows="5" class="form-control" placeholder="Enter notification description"></textarea>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Send Message</button>
									</div>
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