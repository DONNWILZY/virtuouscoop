@extends('layouts.dashboard')
@section('title', 'Investment Order Confirmation')
@section('content')
					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Preview Investment</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Preview Investment</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xl-8">
								<div class="card m-b-20">
									<div class="card-header ">
										<div class="card-title">Wallet Summary</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Product</th>
														<th>Amount</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												
													<tr>
														<td>Available Balance</td>
														<td><span> {{config('app.currency_symbol')}} {{Auth::user()->profile->deposit_balance + 0}}</span></td>
														<td><a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-check"></i></a></td>
													</tr>
													<tr>
														<td>Intended Investment</td>
														<td><span>{{config('app.currency_symbol')}} {{$invest->amount}}</span></td>
														<td><a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-check"></i></a></td>
													</tr>
													
												</tbody>
											</table>
										</div>
										<form class="text-left  product-cart m-t-20 mb-0">
											<div class="row">
												
												<div class="col-6"><a href="{{route('userDashboard')}}" class="btn btn-primary btn-md">Cancel Process</a></div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-xl-4">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">Investment Summery</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
													<tr>
														<td>Invested Amount</td>
														<td class="text-right">{{config('app.currency_symbol')}} {{$invest->amount}}</td>
													</tr>
													<tr>
														<td><span>Investment Yield</span></td>
														<td class="text-right text-muted"><span>{{config('app.currency_symbol')}} {{$invest->profit}}</span></td>
													</tr>
													<tr>
														<td><span>Investment Return</span></td>
														<td><h2 class="price text-right mb-0">{{config('app.currency_symbol')}} {{$invest->total}}</h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										 <form action="{{route('userInvestment.confirm')}}" class="text-center mt-3" method="post">
                                   		 {{ csrf_field() }}
                                   		 @if(count($errors) > 0)
                                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                                            <i class="material-icons" data-notify="icon">notifications</i>
                                            <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                    <li><strong> {{$error}} </strong></li>
                                                @endforeach
                                                    </span>
                                        </div>
                                   		 @endif
                                   		  <input type="checkbox" checked hidden name="tos" value="1" >
                                   		  <input type="hidden" name="plan_id" value="{{$invest->id}}">
                                   		  
                                   		  <input type="hidden" name="plan" value="{{$invest->name}}">
                                          <input type="hidden" name="amount" value="{{$invest->amount}}">

											<button  class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit"> Proceed To invest</button>
											</form>
											<a href="{{route('userInvestments')}}"><button  class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " >Select Another Plan</button></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection