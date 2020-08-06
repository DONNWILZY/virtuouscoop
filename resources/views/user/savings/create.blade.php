@extends('layouts.dashboard')
@section('title', 'Fund Wallet')
@section('content')
     <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">New Deposit</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">New Deposit</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-lg-12">
							@if(count($errors) > 0)
							 @foreach($errors->all() as $error)
								<div class="alert alert-danger">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													 <strong>Alert</strong>
													<hr class="message-inner-separator">
													<p>{{$error}}</p>
								</div>
								 @endforeach
								 @endif
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Select Payment Gateway</h3>
									</div>
									<div class="card-body">
										<div class="panel-group1" id="accordion1">
										  @foreach($gateways as $gateway)
											<div class="panel panel-default mb-4">
												<div class="panel-heading1 ">
													<h4 class="panel-title1">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$gateway->id}}" aria-expanded="false">{{$gateway->name}}</a>
													</h4>
												</div>
												<div id="collapse{{$gateway->id}}" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
													<div class="panel-body">
													<p><span>When you deposit using <b>{{$gateway->name}},</b> you will be charged <b>{{config('app.currency_symbol')}} {{$gateway->fixed}}</b> with <b>{{$gateway->percent}}% of your deposit</b> as deposit charge.</span> </p>
													    <form action="{{route('instantPreview')}}" method="post">
                                        				{{ csrf_field() }}
                                        				<label class="mt-4 ">Please Enter The Amount To And Click On Proceed Button</label>
														<div class="d-flex">
														
															<div class="input-group wd-150">
																<div class="input-group-prepend">
																	<div class="input-group-text">
																		{{config('app.currency_symbol')}}
																	</div><!-- input-group-text -->
																</div><!-- input-group-prepend -->
																<input class="form-control" name="amount" id="tp3" placeholder="Enter Amount To Deposit" type="number">
																<input id="amount" hidden name="gateway" value="{{$gateway->id}}" type="text" class="form-control">
																<button class="btn btn btn-primary br-tl-0 br-bl-0 " type="submit" id="setTimeButton">Proceed</button>
															</div><!-- input-group -->
														</div>
														 </form>
												</div>
												</div>
											</div>
										   @endforeach
										   
										   @foreach($local_gateways as $local)
											<div class="panel panel-default mb-4">
												<div class="panel-heading1 ">
													<h4 class="panel-title1">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$local->id}}" aria-expanded="false">{{$local->name}}</a>
													</h4>
												</div>
												<div id="collapse{{$local->id}}" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
													<div class="panel-body">
													<p><span>When you deposit using <b>{{$local->name}},</b> you will be charged <b>{{config('app.currency_symbol')}} {{$local->fixed}}</b> with <b>{{$local->percent}}% of your deposit</b> as deposit charge.</span> </p>
													      <form action="{{route('userPaymentPreview')}}" method="post">
                                        				  {{ csrf_field() }}
                                        				<label class="mt-4 ">Please Enter The Amount To And Click On Proceed Button</label>
														<div class="d-flex">
														
															<div class="input-group wd-150">
																<div class="input-group-prepend">
																	<div class="input-group-text">
																		{{config('app.currency_symbol')}}
																	</div><!-- input-group-text -->
																</div><!-- input-group-prepend -->
																<input class="form-control" name="amount" id="tp3" placeholder="Enter Amount To Deposit" type="number">
																<input id="amount" hidden name="gateway" value="{{$local->id}}" type="text" class="form-control">
																<button class="btn btn btn-primary br-tl-0 br-bl-0 " type="submit" id="setTimeButton">Proceed</button>
															</div><!-- input-group -->
														</div>
														 </form>
												</div>
												</div>
											</div>
										   @endforeach
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		  
@endsection