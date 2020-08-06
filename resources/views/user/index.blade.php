@extends('layouts.dashboard')
@section('title', 'User Dashboard')
@section('content')


  					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</div>
						
						

						<div class="row row-cards">
							<div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
								<div class="card card-img-holder text-default bg-color">
									<div class="row">
										<div class="col-4">
											<div class="circle-icon bg-primary text-center align-self-center shadow-primary"><i class="pe pe-7s-piggy fs-30  text-white mt-4"></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$user->profile->main_balance + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Total Wallet Earnings</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>

							<div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute circle-icon bg-secondary align-items-center text-center shadow-secondary"><i class="pe pe-7s-culture fs-30 text-white mt-4"></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$user->profile->deposit_balance + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Total Deposited Balance</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>

							<div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute  circle-icon bg-info align-items-center text-center shadow-info"><i class="lnr lnr-cart fs-30 text-white mt-4"></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$user->profile->contribution_balance + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Total Contributed Money</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>

							<div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute circle-icon bg-success align-items-center text-center shadow-success"><i class=" lnr lnr-users fs-30 text-white mt-4 "></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$user->profile->savings_balance + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Total Savings Balance</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>
							
							
							
							@if($settings->loan == 1)	
							<div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute circle-icon bg-warning align-items-center text-center shadow-secondary"><i class=" pe pe-7s-wallet fs-30 text-white mt-4 "></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$unpaid + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Total Loan</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>
							
							<div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute circle-icon bg-success align-items-center text-center shadow-success"><i class=" pe pe-7s-safe fs-30 text-white mt-4 "></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$paid + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Paid Loan</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>
							
							<div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute circle-icon bg-danger align-items-center text-center shadow-secondary"><i class="pe pe-7s-cash fs-30 text-white mt-4 "></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$balance + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Unpaid Balance</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>
						@endif
						</div>
						
						
						<div style="height:433px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #7532a4; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #7532a4; padding: 0px; margin: 0px; width: 99%;"><div style="height:413px;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing:content-box; margin: 3px 6px 10px 0px; font-family: Verdana, Tahoma, Arial, sans-serif;"><b>Powered by&nbsp;<a href="#" style="font-weight: 500; color: #FFFFFF; text-decoration:none;font-size:11px">{{$settings->company_name}}</b></a></div></div>
						<br>
						<div class="row ">
							 <div class="col-lg-6 col-md-12 col-sm-12 col-xl-8">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Payments & Transaction Chart</h3>
									</div>
									<div class="card-body">
										<div id="nvd3-chart1" style="width: 100%; height: 400px;" > <svg></svg></div>
									</div>
								</div>
							</div>
							 @if($posts)
							<div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
							    <div class="card">
							        <div class="card-header">
									    <h4 class="card-title">Latest News</h4>
									</div>
									<div class="card-body">
							            <ul class="timeline">
							             @foreach($posts as $post)
											<li>
												<a href="{{route('viewPost', ['slug'=>$post->slug])}}"><strong>{{$post->title}}</strong></a>
												<a href="#" class="float-right"><b>{{$post->created_at->diffForHumans()}}</b></a>
												<p> {!!str_limit($post->content,'100') !!}</p>
											</li>
										@endforeach
										@endif	
										</ul>
								    </div>
								</div>
							</div>

					</div>
				</div>
			</div>
			
		
			<!-- Fullside-menu Js-->
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

        <!-- Index Scripts -->
		<script>
		/*-----nvd3-chart1-----*/
historicalBarChart = [{
	key: "Cumulative Return",
	values: [{
		"label": "Deposit",
		"value": {{$user->profile->deposit_balance + 0}},
		"color": "#6c3e9d"
	}, {
		"label": "Wallet",
		"value": {{$user->profile->main_balance + 0}},
		"color": "#45aaf2"
	}, {
		"label": "Withdrawal",
		"value": {{$withdraw + 0}},
		"color": "#d45c95"
	}, {
		"label": "Referral Bonus",
		"value": {{$user->profile->referral_balance + 0}},
		"color": "#fb8d34"
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

