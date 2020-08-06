@extends('layouts.dashboard')
@section('title', 'My Contribution History')
@section('content')

		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Contributions</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Contributions</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">My Contributions</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
							 @if(count($logs) > 0)
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Thrift Number</th>
                                    <th>Thrift Plan</th>
                                    <th>Amount Contributed</th>
                                    <th>Date Joined</th>
                                    <th>My Payments</th>
                                    <th>My Team</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Thrift Number</th>
                                    <th>Thrift Plan</th>
                                    <th>Amount Contributed</th>
                                    <th>Date Joined</th>
                                    <th>My Payments</th>
                                    <th>My Team</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($logs as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>{{$log->reference_id}}</td>
                                        <td>{{$log->thrift_name}}</td>
                                        <td>{{config('app.currency_symbol')}} {{$log->amount + 0 }}</td>
                                        <td>{{$log->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('thriftpay.history', $log->reference_id)}}" type="button" class="btn btn-info">View</a></td>
                                        <td><a href="{{route('thriftlog.history', $log->thrift_id)}}" type="button" class="btn btn-primary">View</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4 class="text-center" style="color:indigo;">You Have Not Joined Any Contribution Plan Yet. Please select a contribution plan to proceed</h4>
                    @endif		
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
		  })();
		  </script>
		   @endif
@endsection