@extends('layouts.admin')

@section('title', 'Manage Post')

@section('content')

   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Manage Posts</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Posts</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Posts</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												@if(count($posts) > 0)
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Photo</th>
														<th class="text-center">Title</th>
														<th class="text-center">View Post</th>
														<th class="text-center">Edit Post</th>
													</tr>
												</thead>
												<tbody>
												  @php $id=0;@endphp
												  @foreach($posts as $post)
												  @php $id++;@endphp

													<tr>
														<td class="text-center">{{ $id }}</td>
														<td class="text-center"><span class="avatar brround " style="background-image: url({{$post->featured}})"></span></td>
														<td class="text-center">{{str_limit($post->title, 60)}}</td>
														<td class="text-center"><a href="{{route('viewPost',['slug'=>$post->slug])}}" class="icon"><i class="fa fa-eye text-primary"></i></a></td>
														<td class="text-center"><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="icon"><i class="fa fa-pencil text-success"></i></a></td>
											     	</tr>
												 
											  @endforeach
											  @else
											<h1 class="text-center">No Blog Post Found</h1>
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