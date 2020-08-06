@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

 <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard 4</li>
							</ol>
						</div>

						<div class="row row-cards">
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-primary shadow-primary">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											   <i class="pe pe-7s-users text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Total Members</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{$count->total}} User(s)</h3>
												</div>
											</div>
										</div>
										<p class="text-white mb-0">
										    <i class="mdi mdi-arrow-up-drop-circle text-warning mr-1 " aria-hidden="true"></i> <span class="text-white">{{$count->unverified}} Unverified User(s)</span>
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-secondary shadow-secondary">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											    <i class="pe pe-7s-wallet text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">System Wallet</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{config('app.currency_symbol')}} {{$earn + 0}}</h3>
												</div>
											</div>
										</div>
										<p class="text-white mb-0">
											<i class="mdi mdi-arrow-down-drop-circle mr-1 text-danger" aria-hidden="true"></i> {{count($withdraw_notify)}} Pending Withdrawal(s)
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-info shadow-info">
								    <div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											<i class="pe pe-7s-graph3 text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Total Investment</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{config('app.currency_symbol')}} {{$invest + 0}}</h3>
												</div>
											</div>
										</div>
										<p class="text-white mb-0">
											<i class="mdi mdi-arrow-up-drop-circle mr-1 text-success" aria-hidden="true"></i>{{$investplan + 0}} Total Investment(s)
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-success shadow-success">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											    <i class="mpe pe-7s-piggy text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Total Deposit</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{config('app.currency_symbol')}} {{$deposit + 0}}</h3>
												</div>
											</div>
										</div>
										<p class="text-white  mb-0">
											<i class="mdi mdi-arrow-down-drop-circle mr-1 text-danger" aria-hidden="true"></i>{{count($deposit_notify)}} Pending Deposit(s)
										</p>
									</div>
								</div>
							</div>
							
							
								<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-primary shadow-primary">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											   <i class="pe pe-7s-print text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Processed Loan</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{$loaner->total}} Loan(s)</h3>
												</div>
											</div>
										</div>
										<p class="text-white mb-0">
										    <i class="mdi mdi-arrow-up-drop-circle text-danger mr-1 " aria-hidden="true"></i> <span class="text-white">Unprocessed Loan:  {{$loaner->unprocessed}}</span>
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-secondary shadow-secondary">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											    <i class="pe pe-7s-cart text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Total Disbursed Loan</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{config('app.currency_symbol')}} {{$loanamount + 0}}</h3>
												</div>
											</div>
										</div>
										<p class="text-white mb-0">
										 <i class="mdi mdi-arrow-up-drop-circle text-danger mr-1 " aria-hidden="true"></i>Undisbursed Loan: {{config('app.currency_symbol')}} {{$unprocessed + 0}}
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-info shadow-info">
								    <div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											<i class="pe pe-7s-cash text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Total Paid Loan</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{config('app.currency_symbol')}} {{$paid + 0}}</h3>
												</div>
											</div>
										</div>
										<p class="text-white mb-0">
											<i class="mdi mdi-arrow-up-drop-circle mr-1 text-success" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-3 col-md-6 col-sm-12">
								<div class="card bg-success shadow-success">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-right">
											    <i class="pe pe-7s-calculator text-white icon-size"></i>
											</div>
											<div class="float-left">
												<p class="mb-0 text-left text-white">Unpaid Loan</p>
												<div>
													<h3 class="font-weight-semibold text-left mb-0 text-white">{{config('app.currency_symbol')}} {{$unpaid + 0}}</h3>
												</div>
											</div>
										</div>
										<p class="text-white  mb-0">
											<i class="mdi mdi-arrow-down-drop-circle mr-1 text-danger" aria-hidden="true"></i>
										</p>
									</div>
								</div>
						</div></div>
						
						
						
						
						
						
						
					
						


						<div class="row row-cards">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">System Transaction Chart</h3>
									</div>
									<div class="card-body">
										<div class="card-body">
										<div id="nvd3-chart1" style="width: 100%; height: 400px;" > <svg></svg></div>
									</div>
								    </div>
								</div>
							</div>
							
							</div>
						</div>

					</div>
				</div>
			</div>
			<script src="{{asset('assets\plugins\fullside-menu\jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets\plugins\fullside-menu\waves.min.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('assets\js\custom.js')}}"></script>
		
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		<script src="{{asset('assets\plugins\peitychart\jquery.peity.min.js')}}"></script>
		<script src="{{asset('assets\plugins\peitychart\peitychart.init.js')}}"></script>
		
		<script src="{{asset('assets\plugins\echarts\echarts.js')}}"></script>

		<!-- c3.js Charts Plugin -->
		<script src="{{asset('assets\plugins\charts-c3\d3.v5.min.js')}}"></script>
		<script src="{{asset('assets\plugins\charts-c3\c3-chart.js')}}"></script>
	
        
		<script src="{{asset('assets\plugins\charts-nvd3\d3.min.js')}}"></script>
		<script src="{{asset('assets\plugins\charts-nvd3\nv.d3.js')}}"></script>
		<script src="{{asset('assets\plugins\charts-nvd3\stream_layers.js')}}"></script>

	<script>

		/*-----nvd3-chart1-----*/
historicalBarChart = [{
	key: "Cumulative Return",
	values: [{
		"label": "Invetment",
		"value": {{$invest + 0}},
		"color": "#6c3e9d"
	}, {
		"label": "Earnings",
		"value": {{$earn + 0}},
		"color": "#45aaf2"
	}, {
		"label": "Deposits",
		"value": {{$deposit + 0}},
		"color": "#d45c95"
	}, {
		"label": "Withdraw",
		"value": {{$deposit + 0}},
		"color": "#fb8d34"
	}, {
		"label": "Total Loan",
		"value": {{$loanamount + 0}},
		"color": "#0000FF"
	}, {
		"label": "Paid Loan",
		"value": {{$paid + 0}},
		"color": "#00FF00"
	}, {
		"label": "Unpaid Loan",
		"value": {{$unpaid + 0}},
		"color": "#FF0000"
	}, ]
}];
nv.addGraph(function() {
	var chart = nv.models.discreteBarChart().x(function(d) {
			return d.label
		}).y(function(d) {
			return d.value
		}).staggerLabels(true)
		//.staggerLabels(historicalBarChart[0].values.length > 8)
		.showValues(true).duration(250);
	d3.select('#nvd3-chart1 svg').datum(historicalBarChart).call(chart);
	nv.utils.windowResize(chart.update);
	return chart;
});

</script>
@endsection
