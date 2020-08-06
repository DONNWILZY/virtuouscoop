@extends('layouts.admin')


@section('title', 'Loan Plan')


@section('content')

     <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Active Loan</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Active Loan</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Active Users' Loan</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												  @if(count($loan) > 0)
													<tr>
														<th class="text-center">Loan ID</th>
														<th class="text-center">Name</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Interest</th>
														<th class="text-center">Paid</th>
														<th class="text-center">Balance</th>
														<th class="text-center">View User</th>
													</tr>
												</thead>
												<tbody>
												 @php $id=0;@endphp
                               					 @foreach($loan as $plan)
                               				     @php $id++;@endphp

													<tr>
														<td class="text-center">{{$plan->loancode}}</td>
														<td class="text-center">{{$plan->loanplan}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$plan->topay + 0}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$plan->topay - $plan->amount}}</td>
														<td class="text-center">{{config('app.currency_symbol')}}{{$plan->paid}}</td>
														<td class="text-center">{{config('app.currency_symbol')}}{{$plan->balance}}</td>
														<td class="text-center"><a href="{{route('admin.user.show', $plan->user->id)}}" class="icon"><span class="badge badge-pill badge-primary">View User</span></a></td>
														
											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">No Loan Plan</h3>
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
