@extends('layouts.dashboard')

@section('title', 'Edit Profile')

@section('content')
 <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Edit Profile</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
							</ol>
						</div>
						<div class="row">

							<div class="col-lg-8 col-xl-12">
								<div class="card">
									<div class="card-header"><h2 class="card-title">Edit profile</h2></div>
										<div class="card-body">
											<div class="e-profile">
												<div class="row">
													<div class="col-12 col-sm-auto mb-3">
														<div class="mx-auto img-2">
															<img src="{{asset($user->profile->avatar)}}" style="width:68px;height:68px;" alt="">
														</div>
													</div>
													
													<div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
														<div class="text-center text-sm-left mb-sm-0">
															
														</div>
														<div class="text-center text-sm-right">
															<i class="fa fa-fw fa-calendar"></i>
																	<span>Joined {{$user->created_at->diffForHumans()}}</span>
														</div>
													</div>
												</div>
												<form   class="form" novalidate="" action="{{route('userProfile.update')}}" method="post" enctype="multipart/form-data">
														{{ csrf_field() }}
													
												<div class="tab-content pt-3">
													<div class="tab-pane active">
														@if(count($errors) > 0)
															<div class="alert alert-danger alert-with-icon" data-notify="container">
																<i class="material-icons" data-notify="icon">notifications</i>
																<span data-notify="message">

																	@foreach($errors->all() as $error)
																		<li><strong> {{$error}} </strong></li>
																	@endforeach

															</span>
															</div>
														@endif
															<div class="row">
																<div class="col">
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Account ID</label>
																				<input id="name" readonly name="act" type="text" value="{{$user->account}}" class="form-control">
																			</div>
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Username</label>
																				<input id="name" readonly type="text" value="{{$user->username}}" class="form-control">
																			</div>
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Full Name</label>
																				<input id="name" name="name" type="text" value="{{$user->name}}" class="form-control">
																			</div>
																		</div>
																		
																	</div>
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Email</label>
																				 <input id="email" name="email" value="{{$user->email}}" type="text" class="form-control">
																				 <input id="occupation" hidden name="occupation" type="text" value="{{$user->profile->occupation}}" class="form-control">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Phone</label>
																				<input id="mobile" name="mobile" type="text" value="{{$user->profile->mobile}}" class="form-control">
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col mb-3">
																			<div class="form-group">
																				<label class="form-label">About</label>
																				<textarea class="form-control" name="about" type="text" value="{{$user->profile->about}}" rows="2" >{{$user->profile->about}}</textarea>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col mb-3">
																		<div class="form-group">
																			<div class="custom-file">
																				<input type="file" name="avatar" class="custom-file-input" >
																				<label class="custom-file-label">Choose file</label>
																			</div>
																		</div>
																	</div>
																	</div>
																	
																</div>
															</div>
															<div class="row">
															  <div class="col-12 col-sm-6 mb-3">
																<div class="mb-2"><h2 class="card-title">Personal Info</h2></div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Country</label>
																			<input id="mobile" name="country" type="text" value="{{$user->profile->country}}" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="form-group ">
																			<label class="form-label">State - City - Zip</label>
																			<div class="row gutters-xs">
																				<div class="col-5">
																					<input id="mobile" name="state" type="text" value="{{$user->profile->state}}" class="form-control">
																				</div>
																				<div class="col-3">
																					<input id="mobile" name="city" type="text" value="{{$user->profile->city}}" class="form-control">
																				</div>
																				<div class="col-4">
																					<input id="postcode" name="postcode" type="text" value="{{$user->profile->postcode}}" class="form-control">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Address <span class="d-none d-xl-inline">No</span></label>
																			<input id="address" name="address" value="{{$user->profile->address}}"  type="text" class="form-control">
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-12 col-sm-6 mb-3">
																<div class="mb-2"><h2 class="card-title">Change Password (Leave empty if not changing)</h2></div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Current Password</label>
																			<input id="password" name="password" type="password" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Confirm Password</label>
																			<input id="password-confirm" name="password_confirmation" type="password" class="form-control">
																		</div>
																	</div>
																</div>
																
															</div>
														</div>
														<div class="float-right mt-0 mb-0">
															<button class="btn btn-secondary mr-3" >Cancel</button>
															<button class="btn btn-primary " type="submit">Update Profile</button>
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
