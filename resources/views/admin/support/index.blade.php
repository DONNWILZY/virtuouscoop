@extends('layouts.admin')

@section('title', 'Support Tickets')

@section('content')

  
   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Support Tickets</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Support Tickets</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Support Tickets</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												 @if(count($supports) > 0)
													<tr>
														<th class="text-center">SN</th>
														<th class="text-center">Ticket Number</th>
														<th class="text-center">Subject</th>
														<th class="text-center">View User</th>
														<th class="text-center">View Ticket</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
												   @php $id=0;@endphp
                              					  @foreach($supports as $support)
                               				      @php $id++;@endphp

													<tr>
														<td class="text-center">{{ $id }}</td>
														<td class="text-center">{{$support->ticket}}</td>
														<td class="text-center">{{$support->subject}}</td>
														<td class="text-center"><a href="{{route('admin.user.edit', $support->user->id)}}" class="icon"><i class="fa fa-user text-primary"></i></a></td>
														<td class="text-center"><a href="{{route('adminSupport.view', $support->ticket)}}" class="icon"><i class="fa fa-eye text-primary"></i></a></td>
														@if($support->status == 1)
														<td class="text-center"><a href="#" class="icon"><i class="fa fa-key text-success"></i> Open</a></td>
											     		 @elseif($support->status == 2)
											     		 <td class="text-center"><a href="#" class="icon"><i class="fa fa-check text-success"></i>Answered</a></td>
											     		@elseif($support->status == 3)
											     		<td class="text-center"><a href="#" class="icon"><i class="fa fa-lock text-success"></i>Unanswered</a></td>
											     		 @elseif($support->status == 0)
											     		 <td class="text-center"><a href="#" class="icon"><i class="fa fa-close text-success"></i>Close</a></td>
											     		 @endif
											     		 
											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">No New Support Ticket</h3>
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