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
														<td>Payment Date</td>
														<td><span>Today {{ date("Y-m-d") }}</span></td>
															</tr>
													<tr>
														<td>Amount To Save</td>
														<td><span>{{config('app.currency_symbol')}} {{$invest->amount}}</span></td>
														</tr>
														

												</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-xl-4">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">My Payment Summary</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
													<tr>
														<td>Savings ID</td>
														<td class="h6 text-right">{{$invest->trans}}</td>
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
										 <form action="{{route('userSavings.confirm2')}}" class="text-center mt-3" method="post">
                                   		 {{ csrf_field() }}
                                   		
                                   		   <input type="hidden" name="name" value="{{$invest->name}}">
                                          <input type="hidden" name="amount" value="{{$invest->amount}}">
                                           <input type="hidden" name="code" value="{{$invest->trans}}">
                                           <input type="hidden" name="date" value="{{$next}}">
                                           <input type="hidden" name="cycle" value="{{$invest->cycle}}">

											<button  class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Save Money</button>
											</form>
											<a href="{{route('userDashboard')}}"><button  class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " >Cancel Action</button></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection