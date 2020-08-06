@extends('layouts.dashboard')
@section('title', 'My Withdraw History')
@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
	
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Withdrawal History</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Withdrawal History</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Withdrawals</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
												@if(count($withdraws) > 0)
													<tr class="border-bottom-0">
														<th class="text-center">Transaction Id</th>
														<th class="text-center">Payment Gateway</th>
														<th class="text-center">Account Details</th>
														<th class="text-center">Amount Withdrawn</th>
														<th class="text-center">Withdrawal Charge</th>
														<th class="text-center">Amount Paid</th>
														<th class="text-center">Time</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
													@php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp
                            <tr>
                                <td class="text-center">{{$withdraw->transaction_id}}</td>
                                <td class="text-center">{{$withdraw->gateway_name}}</td>
                                <td class="text-center">{{$withdraw->account}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount +0}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->charge+0}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->net_amount+0}}</td>
                                @if($withdraw->status == 1)
                                    <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>
                                @else
                                    <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                @endif
                                <td >

                                    @if($withdraw->status == 1)

                                        <button class="btn btn-success">
                                               Paid
                                        </button>
                                    @elseif($withdraw->status == 2)

                                        <button class="btn btn-danger">
                                              Declined
                                        </button>

                                    @else

                                        <button class="btn btn-warning">
                                             Pending
                                        </button>
						             @endif
					           </td>
                            </tr>
                                @endforeach
                                 @else

                        <h4 class="text-center">You have not made any withdrawal yet. Please ensure you have enough fund in your wallet to initiate a withdrawal process</h4>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$withdraws->render()}}

                        </div>
                    </div>

												</tbody>
											</table>
										</div>
									</div>
									<!-- table-wrapper -->
								</div>
								<!-- section-wrapper -->
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
		
		<!-- Custom scroll bar Js-->
		<script src="assets\js\select2.js"></script>
		<script src="assets\plugins\select2\select2.full.min.js"></script>
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		

		 
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