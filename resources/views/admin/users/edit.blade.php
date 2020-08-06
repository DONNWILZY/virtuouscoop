@extends('layouts.admin')

@section('title', 'Edit Member Profile')

@section('content')
 				<link href="{{asset('assets\plugins\fileuploads\css\dropify.min.css')}}" rel="stylesheet" />
				<script src="{{asset('process/countries.js')}}"></script>
				<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />

 				  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Update User</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update User</li>
							</ol>
						</div>
						<div class="row">
							
							   

							<div class="col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-header"><h2 class="card-title">Edit profile</h2></div>
										<div class="card-body">
											<div class="e-profile">
												<div class="row">
													<div class="col-12 col-sm-auto mb-3">
														<div class="mx-auto img-2">
														<center>	<img src="{{asset($user->profile->avatar)}}" style="width:108px;height:108px; alt=""> </center>
														</div>
													</div>
													
												</div>

												<div class="tab-content pt-3">
													<div class="tab-pane active">
													<form action="{{route('admin.user.update',['id'=>$user->id])}}" class="form" novalidate="" method="post" enctype="multipart/form-data">
                     							     {{ csrf_field() }}
                     							   
																		<input type="file" name="avatar" class="dropify" data-height="180">
																
															
														<div class="row">
																
																<div class="col">
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Full Name</label>
																				<input name="name" class="form-control"type="text" value="{{$user->name}}" placeholder="Name">
																			</div>
																		</div>
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Username</label>
																				<input class="form-control"  value="{{$user->username}}" readonly type="text" name="username" placeholder="johnny.s" value=" Christopher">
																				<input id="occupation" hidden name="occupation" type="text" value="{{$user->profile->occupation}}" class="form-control">
																			    @if($user->admin == 0)
																			    <input id="occupation" hidden name="admin" value="1" type="text" class="form-control">
																			    @endif
																			     @if($user->admin == 1)
																			    <input id="occupation" hidden name="admin" value="0" type="text" class="form-control">
																			     @endif
																			      @if($user->active == 0)
																			    <input id="occupation" hidden name="active" value="1" type="text" class="form-control">
																			    @endif
																			     @if($user->active == 1)
																			    <input id="occupation" hidden name="active" value="0" type="text" class="form-control">
																			     @endif
																				<input id="occupation" hidden name="occupation" type="text" value="{{$user->profile->occupation}}" class="form-control">
																		
																			
																			</div>
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Email</label>
																				<input class="form-control"  name="email" value="{{$user->email}}" type="text" placeholder="user@example.com">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="form-label">Mobile Phone</label>
																				<input class="form-control" name="mobile" type="text" value="{{$user->profile->mobile}}"  placeholder="Mobile Number">
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col mb-3">
																			<div class="form-group">
																				<label class="form-label">About</label>
																				<textarea class="form-control" name="about" type="text" value="{{$user->profile->about}}" rows="2" placeholder="My Bio"></textarea>
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
																		<select onchange="print_state('state', this.selectedIndex);" id="country" required  name ="country" class="form-control select2"/></select>
																		 <script language="javascript">print_country("country");</script>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="form-group ">
																			<label class="form-label">State;City;ZIP</label>
																			<div class="row gutters-xs">
																				<div class="col-5">
																					<select  name="state" required  id ="state" class="form-control select2">
																				<option value="">Select state</option></select>
																				</div>
																				<div class="col-3">
																					<input id="city" name="city" type="text" value="{{$user->profile->city}}" class="form-control">
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
																			<label class="form-label">Address</label>
																			<input id="address" name="address" value="{{$user->profile->address}}"  type="text" class="form-control">
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-12 col-sm-6 mb-3">
																<div class="mb-2"><h2 class="card-title">Account Funding</h2></div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Current Password</label>
																			<input class="form-control" type="number" name="main_balance" value="{{$user->profile->main_balance}}" >
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Deposited Balance</label>
																			<input class="form-control" type="number" name="deposit_balance" value="{{$user->profile->deposit_balance}}" >
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="form-group">
																			<label class="form-label">Referral Balance</label>
																			<input class="form-control" type="number" name="referral_balance" value="{{$user->profile->referral_balance}}" >
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="float-right mt-0 mb-0">
															<a href="{{route('adminIndex')}}"><button class="btn btn-secondary mr-3">Cancel</button></a>
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
		<script src="{{asset('assets\plugins\fileuploads\js\dropify.min.js')}}"></script>
		  <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop new profile picture here or click to upload',
                    'replace': 'Drag and drop or click to replace image',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (2M max).'
                }
            });
        </script>
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
		
@endsection
