@extends('layouts.dashboard')
@section('title', 'Loan Preview')
@section('content')


					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Loan Preview</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Loan Preview</li>
							</ol>
						</div>

						<div class="row">


							<div class="col-lg-12 col-xl-12">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">{{$loan->name}} Plan</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
													<marquee><code><b>Notice:</b>Ensure you have noted your <b>Loan Code: {{$loan->code}}</b> as you may need it later on to monitor or query your loan request</code></marquee> 
														<tr>
														<td>Loan ID</td>
														<td class="text-right">{{$loan->code}}</td>
													</tr>
												
													<tr>
													
													   <td>Loan Type</td>
														<td class="text-right">{{$loan->name}}
														
														</td>
													</tr>
													<tr>
													
													   <td>Loan Amount</td>
														<td class="text-right">{{config('app.currency_symbol')}}{{$loan->amount}}
														
														</td>
													</tr>
													<tr>
													
													   <td>Loan Interest Rate</td>
														<td class="text-right">{{$loan->percent}} %
														
														</td>
													</tr>
													<tr>
														<td>Loan Interest</td>
														<td class="text-right">{{config('app.currency_symbol')}}{{$loan->percent /100 *($loan->amount)}}</td>
													</tr>
														<tr>
														<td><span>Total</span></td>
														<td><h2 class="price text-right mb-0">{{config('app.currency_symbol')}}{{$loan->percent /100 *($loan->amount)+($loan->amount)}}</h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										
											
											  <form  action="{{route('userloansuccess')}}" method="post">
											 {{ csrf_field() }}
											<input type="hidden" name="id" value="{{$loan->id}}" />
											<input type="hidden" name="name" value="{{$loan->name}}" />
											<input type="hidden" name="reference" value="{{$loan->code}}" />
											<input type="hidden" name="tenure" value="{{$loan->tenure}}" />
											<input type="hidden" name="amount" value="{{$loan->amount}}" />
											<input type="hidden" name="interest" value="{{$loan->percent /100 *($loan->amount)}}" />
											<input type="hidden" name="topay" value="{{$loan->percent /100 *($loan->amount)+($loan->amount)}}" />
											<input type="hidden" name="cur" value="{{config('app.currency_symbol')}}" />
											<button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Request Loan</button>
											
											 </form>
											<a href="{{route('userLoan')}}"><button class="btn btn-secondary btn-block btn-lg mt-2" >Cancel Request</button></a>
											

                                           </form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

@endsection