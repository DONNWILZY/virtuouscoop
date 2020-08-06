@extends('layouts.dashboard')
@section('title', 'Preview Purchase')
@section('content')
					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Preview Coin Units</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Preview Coin Units</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xl-6">
								<div class="card m-b-20">
									<div class="card-header ">
										<div class="card-title">Coin Purchase Summary</div>
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
														<td>Available Coin Units</td>
														<td><span>{{$cryptocoins->available}} {{$cryptocoins->name}}</span></td>
													</tr>
													<tr>
														<td>Price Per Unit</td>
														<td><span>{{config('app.currency_symbol')}} {{$cryptocoins->price}} per  {{$cryptocoins->name}}</span></td>
													</tr>
													
													<tr>
														<td>Units to Purchase</td>
														<td><span>{{$cryptocoins->units}} {{$cryptocoins->name}}</span></td>
													</tr>
												</tbody>
											</table>
										</div>
										<form class="text-left  product-cart m-t-20 mb-0">
											<div class="row">
												
												<div class="col-6"><a href="{{route('userBuyunits')}}" class="btn btn-primary btn-md">Select Another Coin or Units</a></div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-xl-6">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">Payment Summery</div>
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
														<td><span>Coin Sub Total</span></td>
														<td class="text-right text-muted"><span>{{config('app.currency_symbol')}} {{$cryptocoins->total}}</span></td>
													</tr>
													<tr>
														<td><span>Coin Total</span></td>
														<td><h2 class="price text-right mb-0">{{config('app.currency_symbol')}} {{$cryptocoins->total}}</h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										 <form action="{{route('userBuyunits.confirm')}}" class="text-center mt-3" method="post">
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
                                   		  <input type="hidden" name="id" value="{{$cryptocoins->id}}">
                                   		  <input type="hidden" name="name" value="{{$cryptocoins->name}}">
                                   		  <input type="hidden" name="units" value="{{$cryptocoins->units}}">
                                          <input type="hidden" name="amount" value="{{$cryptocoins->total}}">

											<button  class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit"> Proceed To Purchase</button>
											</form>
											<a href="{{route('userDashboard')}}"><button  class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " >Cancel Purchase</button></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection