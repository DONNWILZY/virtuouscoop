@extends('layouts.dashboard')

@section('title', 'View Profile')

@section('content')

<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Profile</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
											<img src="{{asset($user->profile->avatar)}}" alt="" class="profile-img img-responsive center-block">
											
											<div class="profile-label mt-3">
												<span>{{$user->name}}</span>
											</div>

											<div class="profile-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<span>Member Account</span>
											</div>

											<div class="profile-since">
												Member since: {{$user->created_at->diffForHumans()}}
											</div>
										</div>
                                        <div class="border-bottom align-items-center">
											<div class="card-body">
												<div class="profile-details">
													<div class="list-group list-group-transparent mb-0 mail-inbox">
														<a href="#" >
															<span class="icon mr-3"><i class="fa fa-user"></i></span>Account Number: <span>{{$user->account}}</span>
														</a>
														
													</div>
												</div>
											</div>
										</div>
                                        <div class="p-3">
											<div class="profile-message-btn center-block text-center">
												<a href="{{route('userProfile')}}" class="btn btn-secondary btn-block">
													<i class="fa fa-pencil"></i> Edit Account
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										 <h2 class="card-title">Contact Info</h2>
									</div>
									<div class="card-body">
										<div class="media-list">
											
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
													<i class="fa fa-mobile" aria-hidden="true"></i>
												</div>
												<div class="media-body ml-5">
													<h6 class="mediafont text-dark mb-0">Phone</h6><a class="d-block" href="#">{{$user->profile->mobile}}</a>
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
																<td><strong>Full Name:</strong>{{$user->name}}</td>
															</tr>
															<tr>
																<td><strong>Country:</strong>{{$user->profile->country}}</td>
															</tr>
															<tr>
																<td><strong>Wallet Balance:</strong>{{config('app.currency_symbol')}} {{$user->profile->main_balance}}</td>
															</tr>
														</tbody>
														<tbody class="col-lg-6 p-0">
															<tr>
																<td><strong>Account Username :</strong> {{$user->username}}</td>
															</tr>
															<tr>
																<td><strong>Email :</strong> {{$user->email}}</td>
															</tr>
															<tr>
																<td><strong>Phone :</strong> {{$user->profile->mobile}} </td>
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
														<li><a href="#tab-friends" class="active" data-toggle="tab">My Downlines</a></li>
														
													</ul>
												</div>
											</div>
											<div class="card-body pb-0 tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active" id="tab-friends">
														<div class="row img-gallery">
													@php $id=0;@endphp
												@foreach($referrals as $referral)
													@php $id++;@endphp
												<div class="col-4">
													<a href="javascript:void(0)" class="d-block link-overlay">
														<img class="d-block img-fluid rounded" src="{{$referral->user->profile->avatar}}" alt="">
														<span class="link-overlay-bg rounded">
															<i class="fa fa-search"></i>
														</span>
													Name: <td><b>{{$referral->user->name}}</b></td><br>
													Phone :<td><strong>{{$referral->user->profile->mobile}}</strong> </td>
                                                    
													</a>
												</div>
											 @endforeach	
											
											
												</div>
											</div>
														<br>
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

@endsection
