@extends('layouts.admin')

@section('title', 'Account Verification')

@section('content')
           <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Account Verification</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Account Verification</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Account Verification</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Type</th>
														<th class="text-center">Username</th>
														<th class="text-center">View User</th>
														<th class="text-center">photo</th>
														<th class="text-center">View</th>
													</tr>
												</thead>
												<tbody>
												    @if($kycs)
												    @php $id=0;@endphp
													@foreach($kycs as $kyc)
												    @php $id++;@endphp

													<tr>
														<td class="text-center">{{ $id }}</td>
                                      				    <td class="text-center">{{$kyc->name}}</td>
                                       					<td class="text-center">{{$kyc->user->username}}</td>
                                       					<td class="text-center"><a href="{{route('admin.user.show', $kyc->user->id)}}" class="icon"><span class="badge badge-pill badge-primary">View User</span></a></td>
														<td class="text-center"> <img src="{{$kyc->photo}}" class="img-rounded" style="width:88px;height:88px; alt="Front Page Photo"> </td> 
                                          				<td class="text-center"><a href="{{route('adminKyc2Show', $kyc->id)}}"><span class="badge badge-pill badge-success">View Uploaded File</span></a></td>
											     	</tr>
												    @endforeach
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