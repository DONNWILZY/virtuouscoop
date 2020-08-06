@extends('layouts.admin')

@section('title', 'New Notification')
@section('content')
   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
   <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Post Notification</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Notification</li>
							</ol>
						</div>
						
					
						<div class="row">
							<div class="col-lg-12">
							<form action="{{route('admin.posts.store')}}" class="card" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Create Notification</h3>
									</div>
									<div class="card-body">
										<div class="row">
										
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Notification Title</label>
													 <input id="title" name="title" type="text" placeholder="Enter notification title" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label class="form-label">Notification Image</label>
												<div class="custom-file">
												<input type="file" name="featured" class="custom-file-input" name="example-file-input-custom">
												<label class="custom-file-label">Choose file</label>
											</div>
											</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Select Category</label>
													<select name="category_id" class="form-control select2"">
														@foreach($categories as $category)
												    <option value="{{$category->id}}"> {{$category->name}} </option>
													@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Select Notification Type</label>
													<select name="category" class="form-control select2"">
													 @foreach($tags as $tag)
													  <option value="{{$tag->id}}"> {{$tag->tag}} </option>
												     @endforeach
													</select>
												</div>
											</div>
											</div>
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Notification Content</label>
													<textarea name="body" rows="5" class="form-control" placeholder="Enter notification description"></textarea>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Create Notification</button>
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

