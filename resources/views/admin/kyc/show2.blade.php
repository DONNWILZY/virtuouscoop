@extends('layouts.admin')

@section('title', 'Verify Account')

@section('content')

	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Account Verification</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Account Verification</li>
							</ol>
						</div>
						<div class="row">
						    <div class="col-md-12 col-lg-12 col-xl-6">
								<div class="card ">
									<div class="card-header ">
										<h3 class="card-title ">Account Holder</h3>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x "></i></a>
										</div>
									</div>
									<div class="card-body text-center">
										<span class="avatar avatar-xxl brround" style="background-image: url({{asset($verify->user->profile->avatar)}})"></span>
										<h4 class="h4 mb-0 mt-3">{{$verify->user->name}}
										<p class="card-text">{{$verify->user->email}}</p>
									</h4></div>
									<div class="card-footer text-center">
										<div class="row user-social-detail">
											<div class="col-lg-4 col-sm-4 col-4">
											<b>	<a href="#"><i class="fa fa-phone" aria-hidden="true">&nbsp;&nbsp;{{$verify->user->profile->mobile}}</i></a></b>
											</div>
											<div class="col-lg-4 col-sm-4 col-4">
												<a href="#"><i class="" aria-hidden="true"></i></a>
											</div>
											<div class="col-lg-4 col-sm-4 col-4">
												<b><a href="#"><i class="fa fa-globe" aria-hidden="true">&nbsp;&nbsp;{{$verify->user->profile->country}}</i></a></b>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-12 col-xl-6">
								<div class="card ">
									<div class="card-header ">
										<h3 class="card-title ">Uploaded Data</h3>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x "></i></a>
										</div>
									</div>
									<div class="card-body text-center">
										<span class="avatar avatar-xxl brround" style="background-image: url({{$verify->photo}})"></span>
										<h4 class="h4 mb-0 mt-3">{{$verify->name}}
										<p class="card-text">{{$verify->created_at->diffForHumans()}}</p>
									</h4></div>
									<div class="card-footer text-center">
										<div class="row user-social-detail">
											<div class="col-lg-4 col-sm-4 col-4">
												<a href="{{route('adminKyc2Reject',['id'=>$verify->id])}}"><i class="fa fa-tras" aria-hidden="true"><span class="fa fa-trash badge badge-pill badge-danger">&nbsp;&nbsp;Reject Upload</span></i></a>
											</div>
											<div class="col-lg-4 col-sm-4 col-4">
												<a href="#"><i class="fa fa-downloa" aria-hidden="true"></i></a>
											</div>
											
											<div class="col-lg-4 col-sm-4 col-4">
												<a href="{{route('adminKyc2Accept',['id'=>$verify->id])}}"><i class="fa fa-chec" aria-hidden="true"><span class=" fa fa-check badge badge-pill badge-success">&nbsp;&nbsp;Approve Upload</span></i></a>
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