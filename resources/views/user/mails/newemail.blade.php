@extends('layouts.dashboard')

@section('title', 'All Message From Admin')

@section('content')

<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">New Request/Complaints</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">New Message</li>
							</ol>
						</div>
						<div class="row">
							
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Compose new message</h3>
									</div>
									<div class="card-body">
									@auth

                                    <form action="{{route('userSupport.post')}}" role="form" id="contact-form"  method="POST">

                                        {{csrf_field()}}
                                    
											<div class="form-group">
												<div class="row align-items-center">
													<label class="col-sm-2">Subject</label>
													<div class="col-sm-10">
														<input type="text" id="subject" name="subject"  class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group mb-0">
												<div class="row ">
													<label class="col-sm-2">Message</label>
													<div class="col-sm-10">
														<textarea rows="10" name="body"  class="form-control"></textarea>
													</div>
												</div>
											</div>
											<div class="row message-box-last-content">
											<div class="col-sm-2"></div>
												<div class="col-sm-10">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-12 mb-0 ">
															
														</div>
														<div class="col-lg-6 mb-0 col-md-6 col-sm-12 text-right">
														<a href="{{route('userDashboard')}}"><button type="button" class="btn btn-secondary btn-space mt-2 mr-2">Cancel</button></a>
															<button type="submit" class="btn btn-primary btn-space mt-2">Send message</button>
														</div>
													</div>
												</div>
											</div>
										</form>
										  @endauth
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