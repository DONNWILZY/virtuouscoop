@extends('layouts.dashboard')
@section('title', 'My Bought Cards')
@section('content')

		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Purchased Cards</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Purchased Cards</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Purchased Cards</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												<thead>
												@if(count($withdraws) > 0)
													<tr class="border-bottom-0">
														<th class="text-center">Card Type</th>
														<th class="text-center">Card Price</th>
														<th class="text-center">Price Equivalent in {{config('app.currency_symbol')}}</th>
														<th class="text-center">Purchase ID</th>
														<th class="text-center">Card View</th>
														<th class="text-center">Time</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
													@php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp
                            <tr>
                                <td class="text-center">{{$withdraw->type}}</td>
                                <td class="text-center">$ {{$withdraw->amount}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->equivalent}}</td>
                                <td class="text-center">{{$withdraw->transaction_id}}</td>
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
                              
                                <td >

                                    @if($withdraw->status == 1)

                                        <button class="btn btn-success">
                                               Delivered
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

                        <h4 class="text-center">You have not sold any card yet.</h4>
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
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="assets\js\select2.js"></script>
		<script src="assets\plugins\select2\select2.full.min.js"></script>
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		
		 
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