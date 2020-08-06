@extends('layouts.admin')

@section('title', 'Thrift Plans')


@section('content')
       <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Thrift Plans</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Thrift Plans</li>
							</ol>
						</div>

						<div class="row row-cards">

							<div class="col-lg-12 col-12 col-xl-12">
								<div class="card">
									<div class="card-header border-bottom-0">
										<h3 class="card-title">Manage Thrift Plans</h3>
									</div>
									<div>
										<div class="table-responsive border-top">
											<table class="table card-table table-striped table-vcenter">
												<thead>
												 
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Name</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Allowed Members</th>
														<th class="text-center">Joined Members</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
												  @if($thrift)
												  @php $id=0;@endphp
											      @foreach($thrift as $thrift)
											 	  @php $id++;@endphp
                           
                               
													<tr>
														<td class="text-center">{{$id}}</td>
														<td class="text-center">{{$thrift->name}}
														<br>
														@if($thrift->status == 1) <marquee><h6 style="color:indigo;"><b> Open </b></h6></marquee>
														@else
														</marquee><h6 style="color:red;"><b>Closed</h6></b><marquee>
														@endif
														</td>
														<td class="text-center">{{$thrift->amount}}</td>
														<td class="text-center">{{$thrift->numbers}} Members</td>
														<td class="text-center">{{$thrift->members}} Members</td>
														<td class="text-center">
														<div class="dropdown">
														<button type="button" class="badge btn-primary btn-pill dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cogs">Action</i>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="{{route('adminthriftEdit', $thrift->id)}}">Edit</a>
															<a class="dropdown-item" href="{{route('adminthriftDestroy', $thrift->id)}}">Delete</a>
															@if($thrift->status == 1)
															<a class="dropdown-item" href="{{route('adminthriftclose', $thrift->id)}}">Close</a>
															@else
															<a class="dropdown-item" href="{{route('adminthriftopen', $thrift->id)}}">Open</a>
															@endif
														</div>
													</div>
													  </td>
														 
											     	</tr>
											     	

												 
											  @endforeach
											  @endif											
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-12">
								<form class="card" action="{{route('adminthriftStore')}}" method="post">
								{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Create New Thrift Plan</h3>
									</div>
									<div class="card-body">
										
											
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Group Name</label>
													<input type="text" name="name" class="form-control" placeholder="Enter Plan Name">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Payment Cycle (In Days)</label>
													<input type="number" name="cycle" class="form-control" placeholder="Enter Payment Cycle">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Payment Cycle Name</label>
													<select required name="cname" class="form-control select2 custom-select" data-placeholder="Choose one">
												<option label="Choose one">
												</option>
												<option value="Weekly">Weekly</option>
												<option value="Monthly">Monthly</option>
												<option value="Quarterly">Quarterly</option>
												<option value="Yearly">Yearly</option>
											</select></div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Contribution Amount</label>
												<input type="number" name="amount" class="form-control" placeholder="Enter Plan Amount">	</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Allowed Members</label>
												<input type="number" name="members" class="form-control" placeholder="Enter Allowed Members">	</div>
											</div>
											
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Create Group</button>
									</div>
									</div>

								</form>
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