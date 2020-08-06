@extends('layouts.admin')

@section('title', 'View Support Ticket')

@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
   <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">View Ticket</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">View Ticket</li>
							</ol>
						</div>
						
					
						<div class="row">
							<div class="col-lg-12">
							<form action="{{route('adminSupport.post',['ticket'=>$support->ticket])}}" class="card" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Ticket Number: {{$support->ticket}}<br>Ticket Subject: {{!! $support->message!!}}</h3><br>
										<h3 class="card-title"></h3>
									</div>
									<div class="card-body">
										<div class="row">
										
											<div class="conversation-wrapper">
															<div class="conversation-content">
																<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 340px;">
																	<div class="conversation-inner" style="overflow: hidden; width: 100%; height: 340px;">
                        												 @foreach( $discussions as $discussion)
                        												 @if($discussion->type == 1)
																		<div class="conversation-item item-left col-lg-12 clearfix">
																			<div class="conversation-user">
																				<img src="{{$user->profile->avatar}}" alt="">
																			</div>
																			<div class="conversation-body">
																				<div class="name">
																					{{$support->user->name}}
																				</div>
																				<div class="time hidden-xs">
																					{{$discussion->created_at->diffForHumans()}}
																				</div>
																				<div class="text">
																					{!! $support->message!!}
																				</div>
																			</div>
																		</div>
																		@elseif($discussion->type == 0)
																		<div class="conversation-item item-right clearfix">
																			<div class="conversation-user">
																				<img src="{{$discussion->user->profile->avatar}}" alt="">
																			</div>
																			<div class="conversation-body">
																				<div class="name">
																					{{$discussion->user->name}}
																				</div>
																				<div class="time hidden-xs">
																					{{$discussion->created_at->diffForHumans()}}
																				</div>
																				<div class="text">
																					{!!$discussion->message!!}.
																				</div>
																			</div>
																		</div>
																		 @endif
																		 @endforeach


																	</div></div></div>
																	<div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div>
																	<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
																</div>
															</div>
															<div class="conversation-new-message">
																 <form action="{{route('adminSupport.post',['ticket'=>$support->ticket])}}" method="post">
                                      							  {{ csrf_field() }}
																	<div class="form-group">
																		<textarea class="form-control" name="body" rows="2" placeholder="Enter your message..."></textarea>
																	</div>

																	<div class="clearfix mb-3">
																		<button type="submit" class="btn btn-success pull-right">Send message</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
											
										</div>
										
									</div>
									
								</form>
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
@endsection