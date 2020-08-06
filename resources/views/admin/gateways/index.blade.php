@extends('layouts.admin')
@section('title', 'Payment Gateways')
@section('content')

    <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Payment Gateways</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Payment Gateways</li>
							</ol>
						</div>
							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Payment Gateways</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
													<tr>
														
														<th class="text-center">Name</th>
														<th class="text-center">Photo</th>
														<th class="text-center">Account No</th>
														<th class="text-center">Fixed Fee</th>
														<th class="text-center">Percent Fee</th>
														<th class="text-center">Status</th>
														<th class="text-center">Edit</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												@php $id=0;@endphp
												@foreach($gateways as $gateway)
													@php $id++;@endphp
													<tr>
														
														<td class="text-center">{{$gateway->name}}</td>
														<td class="text-center"><img src="{{asset($gateway->image)}}" class="header-brand-img" alt="Logo"></td>
														<td class="text-center">{{$gateway->account}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$gateway->fixed}}</td>
														<td class="text-center">{{$gateway->percent}} %</td>
														<td class="text-center">
														@if($gateway->status == 1)
														<label class="custom-switch">
														<input type="checkbox" name="custom-switch-checkbox" disabled checked class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														</label>
														@else
														<label class="custom-switch">
														<input type="checkbox" name="custom-switch-checkbox" disabled  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														</label>
														@endif</td>
														<td class="text-center">
														
															<a href="{{route('admin.gateway.edit', $gateway->id)}}" type="button" class="btn btn-pill btn-sm btn-primary">
																<i class="fa fa-pencil"> Edit</i>

															</a>
														</td>
														<td class="text-center">
															<a href="{{route('admin.gateway.delete', $gateway->id)}}" type="button" type="button" class="btn btn-pill btn-sm btn-danger">
																<i class="fa fa-trash"> Delete</i>

															</a>
														</td>
													</tr>
												@endforeach				
												
												@php $id=0;@endphp
												@foreach($local as $gateway)
													@php $id++;@endphp
													<tr>
														
														<td class="text-center">{{$gateway->name}}</td>
														<td class="text-center"><img src="{{asset($gateway->image)}}" class="header-brand-img" alt="Logo"></td>
														<td class="text-center">{{$gateway->account}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$gateway->fixed}}</td>
														<td class="text-center">{{$gateway->percent}} %</td>
														<td class="text-center">
														@if($gateway->status == 1)
														<label class="custom-switch">
														<input type="checkbox" name="custom-switch-checkbox" disabled checked class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														</label>
														@else
														<label class="custom-switch">
														<input type="checkbox" name="custom-switch-checkbox" disabled  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														</label>
														@endif</td>
														<td class="text-center">
															<a href="{{route('admin.local.edit', $gateway->id)}}" type="button" class="btn btn-pill btn-sm  btn-primary">
																<i class="fa fa-pencil"> Edit</i>

															</a>
														</td>
														<td class="text-center">
															<a href="{{route('admin.local.delete', $gateway->id)}}" type="button" type="button" class="btn btn-pill btn-sm  btn-danger">
																<i class="fa fa-trash"> Delete</i>

															</a>
														</td>
													</tr>
												@endforeach							
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