@extends('layouts.dashboard')
@section('title', 'Savings Preview')
@section('content')
					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Preview Savings</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Preview Savings</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xl-8">
								<div class="card m-b-20">
									<div class="card-header ">
										<div class="card-title">Savings Plan Summary</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Product</th>
														<th>Value</th>
													</tr>
												</thead>
												<tbody>
												
												
													<tr>
														<td>Savings Plan</td>
														<td><span>{{$invest->name}} </span></td>
													</tr>
												

													<tr>
														<td>Savings Cycle</td>
														<td><span>Every {{$invest->cycle}} Days</span></td>
															</tr>
													<tr>
														<td>Planned Savings</td>
														<td><span>{{config('app.currency_symbol')}} {{$invest->amount}}</span></td>
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
										<div class="card-title">My Cycle Summary</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
													<tr>
														<td>Savings ID</td>
														<td class="h6 text-right">{{$invest->code}}</td>
													</tr>
													<tr>
															<tr>
														<td><span>Next Savings Date</span></td>
														<td><h5 class="price text-right mb-0">
														<?
														$time = 1;
														$noofdays= $invest->cycle * $time ; //assigning website address
														$cur=date("Y-m-d");
														$expiry=date('Y-m-d', strtotime($cur. '+ '.$noofdays.'days'));
														?>
														<?
														$time = 1;
														$noofdays= $invest->cycle * $time ; //assigning website address
														$cur=date("Y-m-d");
														$next=date('Y-m-d', strtotime($cur. '+ '.$noofdays.'days'));
														?>
														
														
														
														<? echo $expiry; ?></h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										 <form action="{{route('userSavings.confirm')}}" class="text-center mt-3" method="post">
                                   		 {{ csrf_field() }}
                                   	
                                   		   <input type="hidden" name="name" value="{{$invest->name}}">
                                          <input type="hidden" name="amount" value="{{$invest->amount}}">
                                          <input type="hidden" name="cycle" value="{{$invest->cycle}}">
                                           <input type="hidden" name="code" value="{{$invest->code}}">
                                           <input type="hidden" name="date" value="{{$next}}">

											<button  class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Start Savings</button>
											</form>
											<a href="userSavings"><button  class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " >Select Another Plan</button></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection