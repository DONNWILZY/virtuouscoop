@extends('layouts.admin')

@section('title', 'New Coin')
@section('content')
   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
   <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Create New Coin</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Coin</li>
							</ol>
						</div>
						
					
						<div class="row">
							<div class="col-lg-12">
							<form action="{{route('adminCoin.post')}}" class="card" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Create New Coin</h3>
									</div>
									<div class="card-body">
										<div class="row">
										
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Coin Name</label>
													 <input id="title" name="name" type="text" placeholder="Enter notification title" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Available Units</label>
													 <input id="title" name="unit" type="text" placeholder="Enter notification title" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Cost Price Per Unit</label>
													 <input id="title" name="cost" type="text" placeholder="Enter notification title" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Selling Price Per Unit</label>
													 <input id="title" name="sell" type="text" placeholder="Enter notification title" class="form-control">
												</div>
											</div>
												
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Coin Unit Description</label>
													<textarea name="details" rows="5" class="form-control" placeholder="Enter notification description"></textarea>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Create Coin</button>
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

