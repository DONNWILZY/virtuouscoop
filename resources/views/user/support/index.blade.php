@extends('layouts.dashboard')

@section('title', 'Your All Support Request')

@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Sent Messages</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Message Outbox</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="list-group list-group-transparent mb-0 mail-inbox">
										<div class="mt-4 mb-4 ml-4 mr-4 text-center">
											<a href="{{route('userNewmess')}}" class="btn btn-secondary btn-lg btn-block">Compose New Message</a>
										</div>
										<a href="{{route('userMessage')}}" class="list-group-item list-group-item-action d-flex align-items-center" >
											<span class="icon mr-3"><i class="fe fe-inbox"></i></span>Inbox <span class="ml-auto badge badge-success">14</span>
										</a>
										<a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">
											<span class="icon mr-3"><i class="fe fe-send"></i></span>Sent Mail
										</a>
										
									</div>
								</div>
								
								
							</div>
							<div class="col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-body p-6">
										<div class="inbox-body">
											<div class="mail-option">
												
												<div class="btn-group hidden-phone">
														<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
														More
														<i class="fa fa-angle-down "></i>
													</a>
													
													<ul class="dropdown-menu">
														<li><a href="{{route('userSupports')}}"><i class="fa fa-envelope-open"></i> Sent Messages</a></li>
														<li class="divider"></li>
														<li><a href="{{route('userNewmess')}}"><i class="fa fa-pencil"></i> New Message</a></li>
													</ul>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-inbox table-hover text-nowrap">
												<thead>
												<tr>
													<th><input type="checkbox" class="mail-checkbox"></th>
													<th>View</th>
													<th>Ticket ID</th>
													<th>Subject</th>
													<th>Status</th>
													<th>Date</th>
												</tr>
											</thead>
													<tbody>
													 @php $id=0;@endphp
													 @foreach($supports as $support)
													 @php $id++;@endphp
														<tr class="unread">
															<td class="inbox-small-cells">
																<input type="checkbox" class="mail-checkbox">
															</td>
															<td> <a href="{{route('userSupport.view', $support->ticket)}}" class="btn btn-outline-info" type="button">
															Open
															</a></td>
															<td class="view-message  dont-show">{{$support->ticket}}</td>
															<td class="view-message ">{{$support->subject}}</td>
															<td class="view-message  inbox-small-cells"> @if($support->status == 1) Active
															 @elseif($support->status == 2) Admin Replied 
															 @elseif($support->status == 3) Replied
															 @elseif($support->status == 0)Closed 
															 @endif
															
															 Close</i><i class="fa fa-star"></i></td>
															<td class="view-message  text-right">{{ date("j/ n/ Y", strtotime($support->created_at)) }}</td>
														</tr>
													@endforeach
													
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