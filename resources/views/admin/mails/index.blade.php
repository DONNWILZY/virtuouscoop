@extends('layouts.admin')

@section('title', 'All Email From Outside')

@section('content')

    
   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Mail Box</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Mail Box</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Message Inbox</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												@if(count($inboxes) > 0)
													<tr>
														<th class="text-center">SN</th>
														<th class="text-center">Name</th>
														<th class="text-center">Email</th>
														<th class="text-center">Subject</th>
														<th class="text-center">Time</th>
														<th class="text-center">View</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
												 @php $id=0;@endphp
												@foreach($inboxes as $inbox)
												@php $id++;@endphp

													<tr>
														<td class="text-center">{{ $id }}</td>
														<td class="text-center">{{$inbox->name}}</td>
														<td class="text-center">{{$inbox->email}}</td>
														<td class="text-center">{{$inbox->subject}}</td>
														<td class="text-center">{{$inbox->created_at->diffForHumans()}}</td>
														<td class="text-center"><a href="{{route('adminEmail.show', $inbox->id)}}" class="icon"><i class="fa fa-eye text-primary"></i></a></td>
														  @if($inbox->status == 1)
														<td class="text-center"><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="icon"><i class="fa fa-pencil text-success"></i></a></td>
											     	       @else
											     	    <td class="text-center"><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="icon"><i class="fa fa-pencil text-success"></i></a></td>
											     	      @endif
											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">No New Mail</h3>
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