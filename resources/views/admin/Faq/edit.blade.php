@extends('layouts.admin')

@section('title', 'FAQ')


@section('content')
       <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Edit FAQ</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>
							</ol>
						</div>

					
							
							<div class="row row-cards"
							<div class="col-lg-12">
								<form class="card" method="post" action="{{route('adminFAQUpdate',['id'=>$faq->id])}}">
								{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Edit FAQ</h3>
									</div>
									<div class="card-body">
										
											
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">FAQ Title</label>
													<input type="text" required name="title" value="{{$faq->title}}" class="form-control" placeholder="Question">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">FAQ Answer</label>
													<textarea rows="5" name="body" required class="form-control" placeholder="Enter Answer To Question">{{$faq->content}}</textarea>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update FAQ</button>
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