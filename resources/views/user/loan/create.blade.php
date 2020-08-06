@extends('layouts.dashboard')
@section('title', 'Loan Request')
@section('content')
     <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">New Loan</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">New Loan</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-lg-12">
									<div class="card">
									<div class="card-header">
										<h3 class="card-title">Select Loan Plan</h3>
									</div>
									<div class="card-body">
										<div class="panel-group1" id="accordion1">
													
										   @foreach($loan as $loan)
											<div class="panel panel-default mb-4">
												<div class="panel-heading1 ">
													<h4 class="panel-title1">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$loan->id}}" aria-expanded="false">{{$loan->name}}</a>
													</h4>
												</div>
												<div id="collapse{{$loan->id}}" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
													<div class="panel-body">
													<p><span>When you requesting for loan on <b>{{$loan->name}} plan,</b> you  must have saved or earned <b> {{$settings->loanpercent}}%</b> of <b>your loan request </b> before you are eligible for loan.</span> </p>
													      <form action="{{route('userLoanPreview')}}" method="post">
                                        				  {{ csrf_field() }}
                                        
														<div class="form-group m-0">
											<label class="form-label">Loan Tenure</label>
											<select class="form-control select2 custom-select" name="tenure" data-placeholder="Select Tenure">
																		<option label="Choose one">
																		</option>
																		<option value="30">One Month</option>
																		<option value="60">Two Months</option>
																		<option value="180">Six Months</option>
																		<option value="365">One Year</option>
																		<option value="720">Two Years</option>
																		<option value="1080">Three Years</option>
																	</select>
										</div>
										
										
                                        				<label class="mt-4 ">Please Enter Loan Amount To And Click On Proceed Button</label>
														<div class="d-flex">
														
															<div class="input-group wd-150">
																<div class="input-group-prepend">
																	<div class="input-group-text">
																		{{config('app.currency_symbol')}}
																	</div><!-- input-group-text -->
																</div><!-- input-group-prepend -->
																<input class="form-control" name="amount" id="tp3" placeholder="Enter Loan Amount" type="number">
																<input id="amount" hidden name="id" value="{{$loan->id}}" type="text" class="form-control">
																<input id="amount" hidden name="name" value="{{$loan->name}}" type="text" class="form-control">
																
																
																<button class="btn btn btn-primary br-tl-0 br-bl-0 " type="submit" id="setTimeButton">Proceed</button>
															</div><!-- input-group -->
														</div>
														 </form>
												</div>
												</div>
											</div>
										   @endforeach
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		
        
          @if(count($errors) > 0)
         @foreach($errors->all() as $error) <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{$error}}"
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
		   return $.growl.error({
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