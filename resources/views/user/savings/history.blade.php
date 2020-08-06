@extends('layouts.dashboard')
@section('title', 'Savings History')
@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
   <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Savings History</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">New Contribution</li>
							</ol>
						</div>
						<div class="row">
						 @if(count($logs) > 0)
                            @php $id=0;@endphp
                                @foreach($logs as $invest)
                                    @php $id++;@endphp		<div class="col-lg-4 col-xs-6 col-sm-6 primary">
							    <div class="princing-item mb-4">
									<div class="pricing-divider text-center">
										<h3 class="text-light">{{$invest->plan}}</h3>
										<svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveaspectratio='none' version='1.1' viewbox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
											<path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
												c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
											<path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
												c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
											<path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
												H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
											<path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
											c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
										</svg>
									</div>
									<div class=" br-br-7 br-bl-7 bg-white mt-0 shadow text-center">
										<ul class="list-group list-group-flush text-center">
										
											<li class="list-group-item"><b>Savings ID: {{$invest->transaction_id}} </b></li>
											<li class="list-group-item"><b>Savings Amount: {{config('app.currency_symbol')}} {{$invest->amount}}</b></li>
											<li class="list-group-item"><b>Next Payment Date:
											
											<?
											
       										$today = date("Y-m-d");
											if ( $today = $invest->next ){
											echo "Today";
											}
											?>
											
											<?
											
       										$today = date("Y-m-d");
											if ( $today <> $invest->next ){
											echo $invest->next;
											}
											?>
											
											</b></li>
											
											 <form action="{{route('userSavings.submit2')}}" method="post">
                                             {{ csrf_field() }}
                                            
                                                <input type="hidden" name="amount" value="{{$invest->amount}}">
                                                <input type="hidden" name="trans" value="{{$invest->transaction_id}}">
                                                <input type="hidden" name="name" value="{{$invest->plan}}">
                                                <input type="hidden" name="cycle" value="{{$invest->cycle}}">
											
											<?
											
       										$today = date("Y-m-d");
											if ( $today == $invest->next ){
											echo "<button type='submit' class='btn btn-primary btn-corner right15'>Save</button>";
											}
											?>
											<?
											
       										$today = date("Y-m-d");
											if ( $today > $invest->next ){
											echo "<button type='submit' class='btn btn-primary btn-corner right15'>Save</button>";
											}
											?>
											</form>
											<li class="list-group-item">
											 <a href="{{route('userSavings.log', $invest->transaction_id)}}"> <button" class="btn btn-pill btn-primary">View Savings</a> </button></center>
										</li>
										
											</ul>
										 
									</div>
								</div>
							</div>
                          @endforeach
                              
                    @else
                        <h4 class="text-center">You Have Not Created Any Savings Plan Yet. Please select <a href="{{route('userSavings')}}">New Savings Plan</a> to proceed</h4>
                    @endif	
				
             			</div>
						</div>
							</div>
					</div>
				</div>
			</div></div>
			
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		 @if(count($errors) > 0)
		 @foreach($errors->all() as $error)             
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{$error}}"
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
		  })();
		  </script>
		  @endforeach
		  @endif
		  
		  
    
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
		  })();
		  </script>
		   @endif
@endsection