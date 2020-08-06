@extends('layouts.admin')
@section('title', 'Manage Cryptos')
@section('content')
        <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Manage Cryptos</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Cryptos</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Pending Crypto</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												   @if(count($withdraws) > 0)
													<tr>
														<th class="text-center">S/N</th>
														<th class="text-center">Transaction ID</th>
														<th class="text-center">Type</th>
														<th class="text-center">Value</th>
														<th class="text-center">Receipt</th>
														<th class="text-center">Time</th>
														<th class="text-center">Seller</th>
														<th class="text-center">Receiver</th>
														<th class="text-center">Approve</th>
														<th class="text-center">Regect</th>
													</tr>
												</thead>
												<tbody>
												  @php $id=0;@endphp
                               					  @foreach($withdraws as $withdraw)
                               				      @php $id++;@endphp
                               
													<tr>
														<td class="text-center">{{$withdraw->id}}</td>
														<td class="text-center">{{$withdraw->trans_id}}</td>
														<td class="text-center">{{$withdraw->type}}</td>
														<td class="text-center">{{$withdraw->amount}} {{$withdraw->type}}</td>
														<td class="text-center"><img src="{{ url('/') }}/{{$withdraw->photo}}" class="header-brand-img" alt="Logo"></td>
														<td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                             							<td class="text-center"><a href="{{route('admin.user.show', $withdraw->user->id)}}" class="icon"><span class="badge badge-pill badge-primary">View Seller</span></a></td>
														<td class="text-center">{{$withdraw->pick}}</td>
														<td class="text-center"><a href"#" data-toggle="modal" data-target="#{{$withdraw->id}}" ><span class="badge badge-pill badge-success">Approve</span></a></td>
														<td class="text-center"><a href="{{route('admin.card2.fraud', $withdraw->id)}}" ><span class="badge badge-pill badge-danger">Reject</span></a></td>
														  	<!-- small Modal -->
														<div id="{{$withdraw->id}}" class="modal fade">
															<div class="modal-dialog modal-sm" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Delivery Address</h6>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																	<code>Ensure You Have confirmed the delivery of the following in your {{$withdraw->type}} wallet before clicking on approve</code><br><hr>
																		
																		<p><b>Cryptocurrency Value: {{$withdraw->amount}} {{$withdraw->type}}</b></p>
																		<p><b>Transaction ID: {{$withdraw->trans_id}}</b></p>
																		<p><b>Transaction Date: {{$withdraw->created_at}}</b></p>
																	</div><!-- modal-body -->
																	<div class="modal-footer">
																	<a href="{{route('admin.crypto2.update', $withdraw->id)}}" ><button type="button" class="btn btn-primary">Approve Now</button></a>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div><!-- modal-dialog -->
														</div><!-- modal -->
											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">You Dont Have Any Unprocessed Cryptocurrency</h3>
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