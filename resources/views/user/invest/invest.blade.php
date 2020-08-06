@extends('layouts.dashboard')
@section('title', 'My Investments History')
@section('content')
        <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Investments</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Investments</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">My Investments</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											   @if(count($investments) > 0)
                      
                            <table class="table table-striped table-bordered border-top-0 border-bottom-0">
                                <thead>
                                <tr>
                                    <th class="text-center">Investment Number</th>
                                    <th class="text-center">Return Cycle</th>
                                    <th class="text-center">Interest Rate</th>
                                   
                                    <th class="text-center">Invested Amount</th>
                                    <th class="text-center">Investment Date</th>
                                    <th class="text-center">Investment Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($investments as $investment)
                                    @php $id++;@endphp
                                    <tr>
                                        
                                        <td class="text-center">{{$investment->reference_id}}</td>
                                        <td class="text-center">{{$investment->plan->style->name}}</td>
                                        <td class="text-center">{{$investment->plan->percentage +0}}%</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$investment->amount + 0 }}</td>
                                        <td class="text-center">{{$investment->created_at->diffForHumans()}}</td>
                                        <td >
                                            @if($investment->status == 0)

                                                <button class="btn btn-danger">
                                                   Pending
                                                </button>


                                            @elseif($investment->status == 1)

                                                <button class="btn btn-primary">
                                                   Running
                                                </button>
                                            @else
                                                <button class="btn btn-success">
                                                   Completed
                                                </button>

                                            @endif



                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h4 class="text-center">You have not invested into any plan yet. Please proceed to fund your account and select an investment plan to start!</h4>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$investments->render()}}

                        </div>
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