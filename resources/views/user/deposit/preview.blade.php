@extends('layouts.dashboard')
@section('title', 'Cash in balance to your account')
@section('content')


					<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Deposit Preview</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Deposit Preview</li>
							</ol>
						</div>

						<div class="row">


							<div class="col-lg-12 col-xl-12">
								<div class="card ">
									<div class="card-header ">
										<div class="card-title">{{$gateway->name}} Payment Gateway</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered mb-0">
												<tbody>
												@if($gateway->id != 4)
												@if($gateway->id != 5)
												<marquee><code><b>NOTICE: </b>To use this payment gateway, visit your {{$gateway->name}} and make deposit of <b>{{config('app.currency_symbol')}} {{($deposit-> amount + $deposit->charge) + 0}}</b> using
												 <b>{{$deposit->code}}</b> as the sender's name or ID and click on validate when done. </code></marquee> 
												@endif 
												@endif
													
												@if($gateway->id != 4)
												@if($gateway->id != 5)
													<tr>
														<td>Payment Code</td>
														<td class="text-right">{{$deposit->code}}</td>
													</tr>
												
												@endif
												@endif
													<tr>
													
													    @if($gateway->id != 4)
													    @if($gateway->id != 5)
														<td>Account Details</td>
														<td class="text-right">{{$gateway->account}}
														@if($gateway->details)
														{!! $gateway->details !!}
														@endif
														@endif
														@endif
														</td>
													</tr>
													<tr>
														<td>Amount</td>
														<td class="text-right">{{config('app.currency_symbol')}} {{$deposit->amount +0}}</td>
													</tr>
													<tr>
														<td><span>Deposit Charge</span></td>
														<td class="text-right text-muted"><span>{{config('app.currency_symbol')}} {{$deposit->charge + 0}}</span></td>
													</tr>
													<tr>
														<td><span>Total</span></td>
														<td><h2 class="price text-right mb-0">{{config('app.currency_symbol')}} {{($deposit-> amount + $deposit->charge) + 0}}</h2></td>
													</tr>
												</tbody>
											</table>
										</div>
										
											
   												<script type="text/javascript">
											function submitform()
											{
												document.forms["myform"].submit();
											}
											</script>
                                           
											@if($gateway->id == 4)
											<script src="https://js.paystack.co/v1/inline.js"></script>
                                                    <button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 "  onclick="payWithPaystack()" >Proceed To Deposit</button>
                                                	<script>
                                              	
														  function payWithPaystack(){
															var handler = PaystackPop.setup({
															  key: "{{$gateway->val1}}",
															  email: "{{ Auth::user()->email }}",
															  amount: "{{($deposit-> amount + $deposit->charge) * 100}}",
															  currency: "NGN",
															  ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
															  firstname: '',
															  lastname: '',
															  // label: "Optional string that replaces customer email"
															  metadata: {
																 custom_fields: [
																	{
																		display_name: "Mobile Number",
																		variable_name: "",
																		value: "+2348012345678"
																	}
																 ]
															  },
															  callback: function(response){
																  alert('Deposit successful. transaction refference number is ' + response.reference);
																   window.location='javascript: submitform()';
		 
										
															  },
															  onClose: function(){
																  alert('window closed');
															  }
															});
															handler.openIframe();
														  }
													</script>
													@endif
													
													@if($gateway->id == 5)
											<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
												<button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 "  onClick="payWithRave()"  >Proceed To Deposit</button>
												<script>
												const API_publicKey = "{{$gateway->val1}}";

												function payWithRave() {
													var x = getpaidSetup({
														PBFPubKey: API_publicKey,
														customer_email: "{{ Auth::user()->email }}",
														amount: "{{($deposit-> amount + $deposit->charge)}}",
														customer_phone: "{{ Auth::user()->phone }}",
														currency: "NGN",
														txref: "rave-123456",
														meta: [{
															metaname: "flightID",
															metavalue: "AP1234"
														}],
														onclose: function() {},
														callback: function(response) {
															var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
															console.log("This is the response returned after a charge", response);
															if (
																response.tx.chargeResponseCode == "00" ||
																response.tx.chargeResponseCode == "0"
															) {
															 window.location='javascript: submitform()';
															} else {
																// redirect to a failure page.
															}

															x.close(); // use this to close the modal immediately after payment.
														}
													});
												}
											</script>
											@endif
											
											 @if($gateway->id != 4)
											 @if($gateway->id != 5)
											  <form   action="{{route('userDepConfirm')}}" method="post">
											  <button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Validate Payment</button>
											
											  {{csrf_field()}}
											 @endif
											 @endif
											
											 @if($gateway->id = 4)
											 @if($gateway->id = 5)
											  <form id="myform"  action="{{route('userDepConfirm2')}}" method="post">
											  {{csrf_field()}}
											 @endif
											 @endif
											
											
											
											<input type="hidden" name="gateway" value="{{$gateway->id}}" />
											<input type="hidden" name="name" value="{{$gateway->name}}" />
											<input type="hidden" name="reference" value="{{$deposit->code}}" />
											<input type="hidden" name="amount" value="{{$deposit->amount}}" />
											<input type="hidden" name="cur" value="{{config('app.currency_symbol')}}" />
											
											 </form>
											<a href="{{route('userDeposit.create')}}"><button class="btn btn-secondary btn-block btn-lg mt-2" >Cancel Deposit</button></a>
											

                                           </form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

@endsection