@extends('layouts.dashboard')
@section('title', 'Offset Loan')
@section('content')
					   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
	
                      <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Pay Loan</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Pay Loan</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
							
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Pay Loan</h3>
										
									</div>
									
									 @if(count($loan) > 0)
									<div class="table-responsive">
									
									
											
											
										<table class="table card-table table-vcenter text-nowrap">
										
											<thead>
										
												<tr>
												
													
													<th class="text-center">Loan ID</th>
													<th class="text-center">Loan Plan</th>
													<th class="text-center">Loan Amount</th>
													<th class="text-center">Loan Interest</th>
													<th class="text-center">Loan Payment</th>
													<th class="text-center">Paid</th>
													<th class="text-center">Balance</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											
											<tbody>
								@php $id=0;@endphp
                                @foreach($loan as $loan)
                                @php $id++;@endphp
                            <tr>
                               
                                <td class="text-center">{{$loan->loancode}}</td>
                                <td class="text-center">{{$loan->loanplan}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$loan->amount}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$loan->topay- $loan->amount}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$loan->topay}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$loan->paid}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$loan->topay - $loan->paid}}</td>
                                <td> <a href="{{route('userloanpayment', $loan->id)}}"><button class="text-center badge btn-primary">Offset Loan </button></a>
                                     


                                </td>
                            </tr>
                                @endforeach
 @else

                        <h3 class="text-center">You have no ongoing loan plan or unsettled loan</h3>
                    @endif
                   
												
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