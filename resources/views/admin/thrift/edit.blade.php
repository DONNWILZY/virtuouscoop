@extends('layouts.admin')

@section('title', 'Update Thrift Plan')


@section('content')
       <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Edit Thrift Plan</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Plan</li>
							</ol>
						</div>

					
							
							<div class="row row-cards"
							<div class="col-lg-12">
								<form class="card" method="post" action="{{route('adminthriftUpdate',['id'=>$thrift->id])}}">
								{{csrf_field()}}
										<div class="card-header">
										<h3 class="card-title">Update Thrift Plan</h3>
									</div>
									<div class="card-body">
										
											
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Group Name</label>
													<input type="text" name="name" class="form-control" value="{{$thrift->name}}" placeholder="Enter Plan Name">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Payment Cycle (In Days)</label>
													<input type="number" name="cycle" class="form-control" value="{{$thrift->cycle}}"  placeholder="Enter Payment Cycle">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Payment Cycle Name</label>
													<select required name="cname" class="form-control select2 custom-select" data-placeholder="Choose one">
												<option value="{{$thrift->cyclename}}"><b>{{$thrift->cyclename}}</b></option>
												<option value="Weekely">Weekly</option>
												<option value="Monthly">Monthly</option>
												<option value="Quarterly">Quarterly</option>
												<option value="Yearly">Yearly</option>
											</select></div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Contribution Amount</label>
												<input type="number" value="{{$thrift->amount}}"  name="amount" class="form-control" placeholder="Enter Plan Amount">	</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group mb-0">
													<label class="form-label">Allowed Members</label>
												<input type="number" value="{{$thrift->numbers}}"  name="members" class="form-control" placeholder="Enter Allowed Members">	</div>
											</div>
											
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update Group</button>
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