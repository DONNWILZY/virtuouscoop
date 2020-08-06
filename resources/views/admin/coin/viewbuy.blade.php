@extends('layouts.admin')
@section('title', 'Sold Coin')
@section('content')
        <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Resold Coin Units</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Resold Coin Units</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Resold Coin Units</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												   @if(count($coin) > 0)
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Coin Type</th>
														<th class="text-center">Coin Price</th>
														<th class="text-center">Purchase ID</th>
														<th class="text-center">View Seller</th>
														<th class="text-center">Time</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
												  @php $id=0;@endphp
                               					  @foreach($coin as $withdraw)
                               				      @php $id++;@endphp
                               
													<tr>
														<td class="text-center">{{$withdraw->id}}</td>
														<td class="text-center">{{$withdraw->name}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
														<td class="text-center">{{$withdraw->transaction_id}}</td>
														<td class="text-center"><a href="{{route('admin.user.show', $withdraw->user->id)}}" class="icon"><span class="badge badge-pill badge-primary">View Seller</span></a></td>
														
														<td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
														 @if($withdraw->status == 1)
														<td class="text-center"><a href"#" data-toggle="modal" data-target="#{{$withdraw->id}}" ><span class="badge badge-pill badge-success">Approved</span></a></td>
														@else
														<td class="text-center"><a href="{{route('admin.card2.fraud', $withdraw->id)}}" ><span class="badge badge-pill badge-danger">Rejected</span></a></td>
														@endif
											     	</tr>
											     	

												 
											  @endforeach
											  @else
											<h3 class="text-center">No Resold Coin Unit Yet</h3>
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