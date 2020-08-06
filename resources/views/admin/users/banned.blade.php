@extends('layouts.admin')

@section('title', 'Banned Users')

@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Banned Users</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Banned Users</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Blocked Users</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
											@if(count($users) > 0)
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Photo</th>
														<th class="text-center">Name</th>
														<th class="text-center">E-mail</th>
														<th class="text-center">Earnings</th>
														<th class="text-center">Status</th>
														<th class="text-center">View</th>
														<th class="text-center">Edit</th>
														<th class="text-center">Delete</th>
													</tr>
												</thead>
												<tbody>
												 @if($users)

												@php $id=0;@endphp

												@foreach($users as $user)

												@php $id++;@endphp

                           
													<tr>
														<td>{{ $id }}</td>
														<td><span class="avatar brround " style="background-image: url({{asset($user->profile->avatar)}})"></span></td>
														<td>{{$user->name}}</td>
														<td>{{$user->email}}</td>
														<td class="text-nowrap">{{config('app.currency_symbol')}} {{$user->profile->main_balance +0}}</td>
														<td class="text-nowrap">@if($user->active == 0)  Not Active	 @else  Active  @endif</td>
														<td class="w-1"><a href="{{route('admin.user.show', $user->id)}}" class="icon"><i class="fa fa-eye text-primary"></i></a></td>
														<td class="w-1"><a href="{{route('admin.user.edit', $user->id)}}" class="icon"><i class="fa fa-pencil text-success"></i></a></td>
														<td class="w-1"><a href="{{route('admin.user.delete', $user->id)}}" class="icon"><i class="fa fa-trash-o text-danger"></i></a></td>
													</tr>
												 
												 @endforeach

													 @endif	
												 @else
													<h4 class="text-center">There is no Banned user yet</h4>
												@endif
               												
												</tbody>
											</table>
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
