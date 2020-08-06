@extends('layouts.admin')

@section('title', 'All User Withdraw Request')

@section('content')

                              
					   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
					  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Withdrawal Requests</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Support Tickets</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Withdrawal Requests</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										 @if(count($withdraws) > 0)

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Gateway</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Need to Send</th>
                                    <th class="text-center">Account</th>
                                    <th class="text-center">Requested</th>
                                    <th class="text-center">Approve</th>
                                    <th class="text-center">Reject & Refund</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$withdraw->gateway_name}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->net_amount}}</td>
                                        <td class="text-center">{{$withdraw->account}}</td>
                                        <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 0)

                                                <a href="{{route('admin.withdraw.update', $withdraw->id)}}" type="button" class="badge btn-success">
                                                    <i class="fa fa-check"></i>Approve
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 0)
                                                <a href="{{route('admin.withdraw.fraud', $withdraw->id)}}" type="button" class="badge btn-danger">
                                                    <i class="fa fa-close"></i> Reject
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 1)
                                                <button class="badge btn-pill-success btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-bank"></i>
                                        </span>Paid
                                                </button>

                                            @else

                                                <button class="btn btn-pill btn-warning .btn-loading btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </span>
                                                    Pending
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>

                            </table>
                        </div>

                    @else

                        <h3 class="text-center">No Unprocessed Withdraw Request</h3>

                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$withdraws->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  </div>  </div>  
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