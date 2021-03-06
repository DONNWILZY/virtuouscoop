@extends('layouts.admin')


@section('title', 'Disburse Loan')


@section('content')

     <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Disburse Loan</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Disburse Loan</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Disburse Loan</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												  @if(count($loan) > 0)
													<tr>
														<th class="text-center">Loan ID</th>
														<th class="text-center">Loan Plan</th>
														<th class="text-center">Loan Amount</th>
														<th class="text-center">Amount To Pay</th>
														<th class="text-center">User</th>
														<th class="text-center">Disburse Loan</th>
														
													</tr>
												</thead>
												<tbody>
												 @php $id=0;@endphp
                               					 @foreach($loan as $plan)
                               				     @php $id++;@endphp

													<tr>
														<td class="text-center">{{ $plan->loancode }}</td>
														<td class="text-center">{{$plan->loanplan}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$plan->amount + 0}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$plan->topay + 0}}</td>
														<td class="text-center"><a href="{{route('admin.user.show', $plan->user->id)}}" class="icon"><span class="badge badge-pill badge-primary">View User</span></a></td>
														<td class="text-center"><a href="#" data-toggle="modal" data-target="#{{ $plan->id }}" class="icon"><span class="badge badge-pill badge-success">Disburse</span></a></td>
														
														
														<!-- small Modal -->
															<div id="{{ $plan->id }}" class="modal fade">
															<div class="modal-dialog modal-sm" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><b>Loan ID: {{ $plan->loancode }}</b></h6>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div><form action="{{route('adminloandisburse2', $plan->id)}}" class="card" method="post" >
														            {{csrf_field()}}
													
																	<div class="modal-body">
																	
																		<b><p>ENTER AMOUNT TO DISBURSE</p></b>
																		<input type="number" name="amount" class="form-control" placeholder="Enter Amount {{config('app.currency_symbol')}} 0:00" />
																		<input type="hidden" name="status" class="form-control" value="2" />
																		<input type="hidden" name="id" class="form-control" value="{{ $plan->loanid }}" />
																		<input type="hidden" name="userid" class="form-control" value="{{ $plan->user_id }}" />
																	</div><!-- modal-body -->
																	<div class="modal-footer">
																		<button type="submit" href="{{route('admin.user.show', $plan->user->id)}}" class="btn btn-primary">Disburse</button>
																		</form>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div><!-- modal-dialog -->
														</div><!-- modal -->
														
														
											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">No Un-disbursed Loan</h3>
											@endif											
												</tbody>
											</table>
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
