@extends('layouts.admin')

@section('title', 'View User Profile')

@section('content')
					<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />

					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">View User</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">View User</li>
							</ol>
						</div>
						<div class="row" id="user-profile">
						    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-3">
								<div class="card clearfix">
									<div class="card-header">
										 <h2 class="card-title">Profile</h2>
									</div>
								    <div class="card-body p-0">
										<div class="card-body bg-primary text-white">
											<img src="{{asset($user->profile->avatar)}} "  style="width:100px;height:100px;" alt="" class="profile-img img-responsive center-block">
											<a href="{{route('admin.user.edit', $user->id)}}" class="profile-image">
												<span class="fa fa-pencil" aria-hidden="true"></span>
											</a>
											<div class="profile-label mt-3">
												<span>{{$user->name}}</span>
											</div>

											<div class="profile-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<span>{{$user->email}}</span>
											</div>

											<div class="profile-since">
												Member since: {{ date('F jS, Y \a\t h:i a', strtotime($user->created_at)) }}
											</div>
										</div>
                                        <div class="border-bottom align-items-center">
											<div class="card-body">
												<div class="profile-details">
													<div class="list-group list-group-transparent mb-0 mail-inbox">
														<a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
															<span class="icon mr-3"><i class="fa fa-sitemap"></i></span>Downline: &nbsp;<span>@if(count($totalRefer) > 0)
                                            {{count($totalRefer)}}
                                        @else
                                            0
                                        @endif</span>
														</a>
														<a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
															<!--<span class="icon mr-3"><i class="fa fa-sitemap"></i></span>Sponsor:  &nbsp;<span> @if( $upliner == 1)-->
               <!--                             {{$referrer->name}}-->
               <!--                         @else-->
               <!--                             None-->
               <!--                         @endif</span>-->
														</a>
														
													</div>
												</div>
											</div>
										</div>
                                        <div class="p-3">
											<div class="profile-message-btn center-block text-center">
											 	<a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-secondary btn-block">
													<i class="fa fa-pencil"></i>&nbsp;Edit Account
												</a>
											
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										 <h2 class="card-title">Contact &amp; Personal Info</h2>
									</div>
									<div class="card-body">
										<div class="media-list">
											<div class="media mt-0">
												<div class="mediaicon bg-primary">
													<i class="fa fa-user" aria-hidden="true"></i>
												</div>
												<div class="media-body ml-5 ">
													<h6 class="mediafont text-dark mb-0">Username</h6><a class="d-block" href="">{{$user->username}}</a>
												</div>
												<!-- media-body -->
											</div>
											<!-- media -->

											<!-- media -->
											<div class="media">
												<div class="mediaicon bg-secondary">
													<i class="fa fa-envelope-o" aria-hidden="true"></i>
												</div>
												<div class="media-body ml-5">
													<h6 class="mediafont text-dark mb-0">Email Address</h6><a class="d-block" href="">{{$user->email}}</a>
												</div>
												<!-- media-body -->
											</div>
											<!-- media -->
											<div class="media">
												<div class="mediaicon bg-info">
													<i class="fa fa-phone" aria-hidden="true"></i>
												</div>
												<div class="media-body ml-5">
													<h6 class="mediafont text-dark mb-0">Phone</h6><a class="d-block" href="#">{{$user->profile->mobile}}</a>
												</div>
												<!-- media-body -->
											</div>
											<div class="media">
												<div class="mediaicon bg-info">
													<i class="fa fa-qrcode" aria-hidden="true"></i>
												</div>
												<div class="media-body ml-5">
													<h6 class="mediafont text-dark mb-0">Account Number</h6><a class="d-block" href="#">{{$user->account}}</a>
												</div>
												<!-- media-body -->
											</div>
											<!-- media -->
										</div>
									</div>
									<!-- media-list -->
								</div>
							</div>

							<div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">
							    <div class="card clearfix">
									<div class="card-header">
										<h2 class="card-title">User info</h2>
									</div>
									<div class="card-body">
										<div class="row profile-user-info">
											<div class="col-lg-12">
												<div class="table-responsive border ">
													<table class="table row table-borderless w-100 m-0 ">
														<tbody class="col-lg-6 p-0">
															<tr>
																<td><strong>Full Name :</strong> {{$user->name}}</td>
															</tr>
															<tr>
																<td><strong>Address :</strong> {{$user->profile->address}}</td>
															</tr>
															<tr>
																<td><strong>Country :</strong>{{$user->profile->country}}</td>
															</tr>
														</tbody>
														<tbody class="col-lg-6 p-0">
															<tr>
																<td><strong>State :</strong>{{$user->profile->state}}</td>
															</tr>
															<tr>
																<td><strong>City :</strong> {{$user->profile->city}}</td>
															</tr>
															<tr>
																<td><strong>Earning: :</strong> {{$user->profile->main_balance}} </td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="panel panel-primary">
											<div class=" tab-menu-heading">
												<div class="tabs-menu2 ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
													  <li> <a href="#tab-friends" class="active" data-toggle="tab"> <li><button class="btn btn-primary btn-sm"><i class="fa fa-line-chart"></i>&nbsp;&nbsp;View Investments</li></a>
														 @if($user->ban == 1)
                                                         <a href="{{route('admin.users.active', $user->id)}}"> <li><button class="btn btn-success btn-sm"><i class="fa fa-key"></i>&nbsp;&nbsp;Unblock</li></a>
														 @else
														 <a href="#tab-chat" data-toggle="tab"> <li><button class="btn btn-danger btn-sm"><i class="fa fa-lock"></i>&nbsp;&nbsp;Block User</li></a>
														 <li>
														@endif
														 @if(count($totalRefer) > 0)
														<a href="{{route('admin.user.referShow', $user->id)}}"> <li><button class="btn btn-danger btn-sm"><i class="fa fa-sitemap"></i>&nbsp;&nbsp;View Referrals</li></a>
														 <li>
														 @endif
													</ul>
												</div>
											</div>
											<div class="card-body pb-0 tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active" id="tab-friends">
														<ul class="widget-users row">
															<li class="col-lg-12 col-xl-6 col-sm-12 col-12">
																<div class="card">
																	<div class="card-body text-center">
																		<span class="avatar avatar-xxl brround" style="background-image: url(assets/images/faces/male/25.jpeg)"></span>
																		<h4 class="h4 mb-0 mt-3">Total Investment
																		<p class="card-text">{{config('app.currency_symbol')}} {{$invest + 0}}</p>
																	</h4></div>
																	<div class="card-footer text-center">
																	<a href="{{route('admin.user.invest', $user->id)}}"><i class="fa fa-eye" aria-hidden="true">View Investment</i></a>
																			
																		</div>
																</div>
															</li>
															<li class="col-lg-12 col-xl-6 col-sm-12 col-12">
																<div class="card">
																	<div class="card-body text-center">
																		<span class="avatar avatar-xxl brround" style="background-image: url(assets/images/faces/female/19.jpeg)"></span>
																		<h4 class="h4 mb-0 mt-3">Investment Earning
																		<p class="card-text">{{config('app.currency_symbol')}} {{$interest + 0}}</p>
																	</h4></div>
																	<div class="card-footer text-center">
																					<a href="{{route('admin.user.interest', $user->id)}}"><i class="fa fa-eye" aria-hidden="true">View Earnings</i></a>
																			
																	</div>
																</div>
															</li>
															
														
															</li>
														</ul>
														<br>
													</div>

													
													<div class="tab-pane fade" id="tab-chat">
														
															<div class="conversation-new-message">
																<form action="{{route('admin.user.ban',$user->id)}}" method="post">
                                        						{{ csrf_field() }}
                                                          			<label>Enter Reason For Blocking This User. E.g Fraud, Abuse, Misconduct. E.T.C</label>
																	<div class="form-group">
																		<textarea class="form-control"  name="note" rows="2" placeholder="Enter your reason for blocking user"></textarea>
																	</div>

																	<div class="clearfix mb-3">
																		<button type="submit" class="btn btn-success pull-right">Block User</button>
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
		
@endsection
