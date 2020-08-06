@extends('layouts.dashboard')
@section('title', 'Loan Preview')
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


							<div class="col-lg-12 col-xl-12">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">{{$loan->loanplan}} Plan</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
													<marquee><code><b>Notice:</b>Ensure you have enough balance in your wallet before you proceed with loan payment <b>Wallet Balance: {{config('app.currency_symbol')}}{{$user->profile->main_balance}}</b></code></marquee> 
														<tr>
														<td>Loan Code</td>
														<td class="text-right">{{$loan->loancode}}</td>
													</tr>
												
													<tr>
													
													   <td>Loan Type</td>
														<td class="text-right">{{$loan->loanplan}}
														
														</td>
													</tr>
													<tr>
													
													   <td>Total Loan</td>
														<td class="text-right">{{$loan->topay}}
														
														</td>
													</tr>
													<tr>
														<td>Total paid</td>
														<td class="text-right">{{config('app.currency_symbol')}} {{$loan->paid}}</td>
													</tr>
														<tr>
														<td><span>Total Balance</span></td>
														<td><h2 class="price text-right mb-0">{{{config('app.currency_symbol')}}} {{$loan->topay - $loan->paid}}</h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										
											
											  <form  action="{{route('userpay.update',['id'=>$loan->id])}}" method="post">
											 {{ csrf_field() }}
											<input type="hidden" name="id" value="{{$loan->id}}" /><br>
											<label><b>Enter Amount To Pay</b></label>
											<input type="hidden" name="bal" value="{{$loan->topay - $loan->paid}}" />
											<input type="hidden" name="code" value="{{$loan->loancode}}" />
											<input type="hidden" name="name" value="{{$loan->loanplan}}" />
											<input type="hidden" name="cur" value="{{config('app.currency_symbol')}}" />
											<input type="number" class="form-control" name="amount" placeholder="Enter Amount To Pay {{config('app.currency_symbol')}} 0:00" />
											<button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Pay Loan</button>
											
											 </form>
											<a href="{{route('userLoan')}}"><button class="btn btn-secondary btn-block btn-lg mt-2" >Cancel Payment</button></a>
											

                                           </form>
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
		   return $.growl.error({
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
		   
		   @if(count($errors) > 0)
		    @foreach($errors->all() as $error)
		  <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{$error}} "
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
		  @endforeach
		   @endif

@endsection