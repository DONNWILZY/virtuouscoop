@extends('layouts.admin')
@section('title', 'Sold Gift Cards')
@section('content')
        <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Purchased Gift Cards</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Purchased Gift Cards</li>
							</ol>
						</div>

							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Purchased Gift Cards</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												   @if(count($withdraws) > 0)
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Card Type</th>
														<th class="text-center">Card Price</th>
														<th class="text-center">Equivalent In {{config('app.currency_symbol')}}</th>
														<th class="text-center">Purchase ID</th>
														<th class="text-center">Balance Before Purchase</th>
														<th class="text-center">Balance After Purchase</th>
														<th class="text-center">Card View</th>
														<th class="text-center">Time</th>
														<th class="text-center">Delivery Address</th>
														<th class="text-center">Approve</th>
														<th class="text-center">Reject</th>
													</tr>
												</thead>
												<tbody>
												  @php $id=0;@endphp
                               					  @foreach($withdraws as $withdraw)
                               				      @php $id++;@endphp
                               
													<tr>
														<td class="text-center">{{$withdraw->id}}</td>
														<td class="text-center">{{$withdraw->type}}</td>
														<td class="text-center">$ {{$withdraw->amount}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->equivalent}}</td>
														<td class="text-center">{{$withdraw->transaction_id}}</td>
														<td class="text-center">{{config('app.currency_symbol')}}{{$withdraw->balance_before}}</td>
														<td class="text-center">{{config('app.currency_symbol')}}{{$withdraw->balance_after}}</td>
														 @if($withdraw->type == 'Xbox Gift Card' )
														<td class="text-center"><img src="{{asset('cards\xbox.png')}}" class="header-brand-img" alt="Logo"></td>
														 @elseif($withdraw->type == 'Amazon Gift Card')
														<td class="text-center"><img src="{{asset('cards\amazon.png')}}" class="header-brand-img" alt="Logo"></td>
														 @elseif($withdraw->type == 'I-tune Card')
														 <td class="text-center"><img src="{{asset('cards\itunes.png')}}" class="header-brand-img" alt="Logo"></td>
														 @elseif($withdraw->type == 'Netflix Gift Card')
														  <td class="text-center"><img src="{{asset('cards\netflix.png')}}" class="header-brand-img" alt="Logo"></td>
														 @elseif($withdraw->type == 'Google Play Gift Card')
														  <td class="text-center"><img src="{{asset('cards\google.png')}}" class="header-brand-img" alt="Logo"></td>
														 @elseif($withdraw->type == 'Playstation Gift Card')
														  <td class="text-center"><img src="{{asset('cards\xbox.png')}}" class="header-brand-img" alt="Logo"></td>
														 @else
														 <td class="text-center"><img src="{{asset('cards\others.png')}}" class="header-brand-img" alt="Logo"></td>
														 @endif
														<td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
														<td class="text-center">{{$withdraw->account}}</td>
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
																	<code>Ensure You Have Deployed The Gift Card To The Address Below Before You Click On Approve</code><br><hr>
																		<p><b>Delivery Address: {{$withdraw->account}}</b></p>
																		<p><b>Gift Card Value: $ {{$withdraw->amount}}</b></p>
																		<p><b>Purchase Date Address: {{$withdraw->created_at}}</b></p>
																	</div><!-- modal-body -->
																	<div class="modal-footer">
																	<a href="{{route('admin.card2.update', $withdraw->id)}}" ><button type="button" class="btn btn-primary">Approve Now</button></a>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div><!-- modal-dialog -->
														</div><!-- modal -->
							  
											     	</tr>
											     	

												 
											  @endforeach
											  @else
											<h3 class="text-center">No Sold Gift Card Yet</h3>
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