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
										
											@if($gateway->id == 1)

                                            <form action="{{route('PayPalConfirm')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="cmd" value="_xclick">
                                                <input type="hidden" name="business" value="robi@cronlab.io">
                                                <input type="hidden" name="item_name" value="Instant Deposit">
                                                <input type="hidden" name="item_number" value="{{$deposit->code}}">
                                                <input type="hidden" name="tax" value="1">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                <input type="hidden" name="custom" value="{{$user->id}}">
                                                <input type="hidden" name="currency_code" value="{{config('app.currency_code')}}">
                                               	<button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Proceed To Deposit</button></form>
												  <a href="{{route('userDeposit.create')}}"><button class="btn btn-secondary btn-block btn-lg mt-2" >Cancel Deposit</button></a>
											

                                             @elseif($gateway->id == 2)

                                                <form action="{{route('stripeConfirm')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <script
                                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                            data-key="{{$gateway->val1}}"
                                                            data-amount="{{$deposit->amount * 100}}"
                                                            data-name="{{config('app.name')}}"
                                                            data-description="Fill With Valid Card Info"
                                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                            data-locale="en"
                                                            data-currency="{{config('app.currency_code')}}">
                                                    </script>
                                                    <input type="hidden" name="code" value="{{$deposit->code}}">
                                                    <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Proceed To Deposit</button>
                                                    </form>
												    <a href="{{route('userDeposit.create')}}"><button class="btn btn-secondary btn-block btn-lg mt-2" >Cancel Deposit</button></a>
										
											@elseif($gateway->id == 4)

                                                     <script src="https://js.paystack.co/v1/inline.js"></script>
                                                    <button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 "  onclick="payWithPaystack()" >Proceed To Deposit</button>
                                                     <a href="{{route('userDeposit.create')}}"><button class="btn btn-secondary btn-block btn-lg mt-2" >Cancel Deposit</button></a>
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
																   window.location='../pay?amount=' + <?php echo $deposit->amount; ?> + '&&refid=' + response.reference+ '&&charge=<?php echo $deposit->amount; ?>';
		 
										
															  },
															  onClose: function(){
																  alert('window closed');
															  }
															});
															handler.openIframe();
														  }
														</script>
                                            @elseif($gateway->id == 3)

                                                <form action="{{route('cryptoConfirm')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group ">
													<label class="form-label">Select Cryptocurrency</label>
													<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
														<optgroup label="Choose A Crytocurrency">
													
															<option value="BTC" selected>BTC (BitCoin) </option>
                                                            <option value="BCH">Bitcoin Cash (BCH) </option>
                                                            <option value="LTC">LiteCoin (LTC) </option>
                                                            <option value="ETH">Ethereum (ETH) </option>
                                                            <option value="ZEC">Zcash (ZEC) </option>
                                                            <option value="DASH">Dash (DASH) </option>
                                                            <option value="XRP">Ripple (XRP) </option>
                                                            <option value="XMR">Monero (XMR) </option>
                                                            <option value="NEO">NEO (NEO) </option>
                                                            <option value="ADA">Cardano (ADA) </option>
                                                            <option value="EOS">EOS (EOS) </option>
													</optgroup>
													</select>
														</div>
													
                                                    <input type="hidden" name="code" value="{{$deposit->code}}">
                                                    <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                                    <input type="hidden" name="nothing" value="{{$user->id}}">
                                                    <br><br> <br><br>
                                                    <button class="btn btn-primary btn-block btn-lg mt-2 m-b-20 " type="submit">Proceed To Deposit</button>
                                                    </form>
													  <a href="{{route('userDeposit.create')}}"><button class="btn btn-secondary btn-block btn-lg mt-2"  >Cancel Deposit</button></a>
											
                                            @endif
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
@endsection