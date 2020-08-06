@extends('layouts.dashboard')
@section('title', 'Investment Order Confirmation')
@section('content')
					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Preview Coin Sales</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Preview Coin Sale</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xl-6">
								<div class="card m-b-20">
									<div class="card-header ">
										<div class="card-title">Coin Sales Summary</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Product</th>
														<th>Details</th>
														
													</tr>
												</thead>
												<tbody>
												
													<tr>
														<td>My Available Coin Units</td>
														<td><span>{{$cryptocoins->available}} {{$cryptocoins->name}}</span></td>
													</tr>
													<tr>
														<td>Units To Sell</td>
														<td><span>{{$cryptocoins->units}} {{$cryptocoins->name}}</span></td>
													</tr>
													
													<tr>
														<td>Selling Price Per Unit</td>
														<td><span>{{config('app.currency_symbol')}}{{$cryptocoins->price}} per {{$cryptocoins->name}}</span></td>
													</tr>
												</tbody>
											</table>
										</div>
										<form class="text-left  product-cart m-t-20 mb-0">
											<div class="row">
												
												<div class="col-6"><a href="{{route('userBuyunits')}}" class="btn btn-primary btn-md">Sell Another Coin or Units</a></div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-xl-6">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">Payment Summary</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
													<tr>
														<td>Total Coin Units</td>
														<td class="text-right"> {{$cryptocoins->units}}</td>
													</tr>
													<tr>
														<td><span>Coin Calculation</span></td>
														<td class="text-right"><span>{{config('app.currency_symbol')}}{{$cryptocoins->price}} x {{$cryptocoins->units}}{{$cryptocoins->name}}</span></td>
													</tr>
													<tr>
														<td><span>Coin Total</span></td>
														<td><h2 class="price text-right mb-0">{{config('app.currency_symbol')}} {{$cryptocoins->amount}}</h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										 <form action="{{route('userSellunits.confirm2')}}" class="text-center mt-3" method="post">
                                   		 {{ csrf_field() }}
                                   		
                                   		  <input type="hidden" name="name" value="{{$cryptocoins->name}}">
                                   		  <input type="hidden" name="id2" value="{{$cryptocoins->id}}">
                                   		  <input type="hidden" name="cid" value="{{$cryptocoins->cid}}">
                                   		  <input type="hidden" name="units" value="{{$cryptocoins->units}}">
                                          <input type="hidden" name="amount" value="{{$cryptocoins->amount}}">

											<button  class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit"> Sell Coin</button>
											</form>
											<a href="{{route('userDashboard')}}"><button  class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " >Cancel Sale</button></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection