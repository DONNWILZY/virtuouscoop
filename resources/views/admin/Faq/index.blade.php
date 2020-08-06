@extends('layouts.admin')

@section('title', 'FAQ')


@section('content')
       <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Frequently Asked Questions</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">FAQ</li>
							</ol>
						</div>

						<div class="row row-cards">

							<div class="col-lg-12 col-12 col-xl-12">
								<div class="card">
									<div class="card-header border-bottom-0">
										<h3 class="card-title">Frequently Asked Questions</h3>
									</div>
									<div>
										<div class="table-responsive border-top">
											<table class="table card-table table-striped table-vcenter">
												<thead>
												 
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">FAQ Question</th>
														<th class="text-center">FAQ Answer</th>
														<th class="text-center">Edit</th>
														<th class="text-center">Delete</th>
													</tr>
												</thead>
												<tbody>
												  @if($faqs)
												  @php $id=0;@endphp
											      @foreach($faqs as $faq)
											 	  @php $id++;@endphp
                           
                               
													<tr>
														<td class="text-center">{{$id}}</td>
														<td class="text-center">{{$faq->title}}</td>
														<td class="text-center">{{(str_limit($faq->content,'20'))}}</td>
														<td class="text-center"><a href="{{route('adminFAQEdit', $faq->id)}}" ><span class="badge badge-pill badge-success">Update</span></a></td>
														<td class="text-center"><a href="{{route('adminFAQDestroy', $faq->id)}}" ><span class="badge badge-pill badge-danger">Delete</span></a></td>
														 
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
								<form class="card" action="{{route('adminFAQStore')}}" method="post">
								{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Create New FAQ</h3>
									</div>
									<div class="card-body">
										
											
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">FAQ Title</label>
													<input type="text" name="title" class="form-control" placeholder="Question">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">FAQ Answer</label>
													<textarea rows="5" name="body" class="form-control" placeholder="Enter Answer To Question"></textarea>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Create FAQ</button>
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