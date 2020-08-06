@extends('layouts.admin')

@section('title', 'User Settings')

@section('content')
					 <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
 
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">User Settings</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">User Settings</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
							 <form class="card" action="{{route('usersSettings',['id'=>$settings->id])}}" method="post">
                                {{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Update Feature</h3>
									</div>
									<div class="card-body">
										<div class="row">
											
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow User Login</label>
												<select name="login" class="form-control select2 custom-select" >
                                                <option value="0"
                                                        @if($settings->userlogin == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->userlogin == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow User Signup</label>
												<select  name="register" class="form-control select2 custom-select" >

                                                <option value="0"
                                                        @if($settings->userregister == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->userregister == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow Referral System</label>
												<select name="refer" class="form-control select2 custom-select" >
                                                <option value="0"
                                                        @if($settings->refer == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->refer == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Allow or Disallow User Account Verification</label>
												<select  name="verify" class="form-control select2 custom-select" >
												 <option value="0"
                                                        @if($settings->verify == 0)
                                                        selected
                                                        @endif
                                                >Turn Off</option>
                                                <option value="1"
                                                        @if($settings->verify == 1)
                                                        selected
                                                        @endif

                                                >Turn On</option>
                                            </select>
                                            </select>
												</div>
											</div>
											
											
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update User Settings</button>
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


