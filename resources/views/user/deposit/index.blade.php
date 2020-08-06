@extends('layouts.dashboard')
@section('title', 'My Deposit History')
@section('content')
					   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
	
                      <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Deposit History</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Deposit History</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
							
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Deposit History</h3>
										
									</div>
									
									 @if(count($deposits) > 0)
									<div class="table-responsive">
									
									
											
											
										<table class="table card-table table-vcenter text-nowrap">
										
											<thead>
										
												<tr>
												
													
													<th class="text-center">Transaction Id</th>
													<th class="text-center">Payment Gateway</th>
													<th class="text-center">Amount</th>
													<th class="text-center">Time</th>
													<th class="text-center">Status</th>
												</tr>
											</thead>
											
											<tbody>
												 @php $id=0;@endphp
                                @foreach($deposits as $deposit)
                                    @php $id++;@endphp
                            <tr>
                               
                                <td class="text-center">{{$deposit->transaction_id}}</td>
                                <td class="text-center">{{$deposit->gateway_name}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$deposit->amount +0}}</td>
                                  @if($deposit->status == 1)
                                <td class="text-center">{{$deposit->updated_at->diffForHumans()}}</td>
                                @else
                                    <td class="text-center">{{$deposit->created_at->diffForHumans()}}</td>
                                @endif
                                <td >

                                    @if($deposit->status == 1)

                                        <button class="btn btn-success">
                                       
                                            Successful
                                        </button>
                                    @elseif($deposit->status == 2)

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

                        <h3 class="text-center">You have not made any deposit yet. Please proceed to deposit and fund your wallet</h3>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$deposits->render()}}

                        </div>
                    </div>
												
											</tbody>
										</table>
									</div>
									<!-- table-responsive -->
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