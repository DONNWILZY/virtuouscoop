@extends('layouts.dashboard')
@section('title', 'Thrift Join Preview')
@section('content')
					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Preview Action</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Preview Action</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xl-8">
								<div class="card m-b-20">
									<div class="card-header ">
										<div class="card-title">Cooperative Society Summary</div>
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
														<td>Total Allowed Members</td>
														<td><span>{{$invest->numbers}} Members</span></td>
															</tr>
													<tr>
														<td>{{$invest->cyclename}} Contribution</td>
														<td><span>{{config('app.currency_symbol')}} {{$invest->amount}}</span></td>
														</tr>
													<tr>
														<td>Failed Payment Penalty</td>
														<td><span>{{config('app.currency_symbol')}} {{$invest->penalty}}</span></td>
													</tr>
													<?php
														$startdate = strtotime("Today");
														$enddate = strtotime("+$invest->numbers $invest->time",$startdate);
														
													
														while ($startdate < $enddate) {
														 
													?>    
													<?php
													for ($x = 1; $x <= $invest->numbers; $x++)  { ?>
													<tr> 
														<td><b>Payment Date <?  echo $x; ?>
</b></td>
														<td><span>
														<? echo date("M d, Y", $startdate),"<br>";
														  $startdate = strtotime("+1 $invest->time", $startdate);
														
														?>
														
														
														</span></td>
														</tr>
													<? } }
														?>
														

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
														<td><span>Expected Cashout</span></td>
														<td class="h5 text-right text-muted"><span> {{config('app.currency_symbol')}} {{$invest->total}}</span></td>
													</tr>
													<tr>
														<td><span>My Payment Date</span></td>
														<td><h5 class="price text-right mb-0">
														<?
														$time = $invest->numbers;
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
										 <form action="{{route('userthrift.confirm')}}" class="text-center mt-3" method="post">
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
                                   		  <input type="hidden" name="id" value="{{$invest->id}}">
                                   		  <input type="hidden" name="number" value="{{$count->total + 1}}">
                                   		  
                                   		  <input type="hidden" name="name" value="{{$invest->name}}">
                                   		  <input type="hidden" name="allowed" value="{{$invest->numbers}}">
                                          <input type="hidden" name="amount" value="{{$invest->amount}}">
                                          <input type="hidden" name="cycle" value="{{$invest->cycle}}">
                                           <input type="hidden" name="code" value="{{str_random(12)}}">
                                           <input type="hidden" name="date" value="{{$next}}">
                                           <input type="hidden" name="pay" value="{{$expiry}}">

											<button  class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit"> Proceed To Join Group</button>
											</form>
											<a href="{{route('userthrift')}}"><button  class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " >Join Another Group</button></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection