@extends('layouts.dashboard')
@section('title', 'My Contribution History')
@section('content')

		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Contribution Team</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Contributions</li>
							</ol>
						</div>
						<div class="row">
						
						 @if(count($logs) > 0)
						 @php $id=0;@endphp
                         @foreach($logs as $log)
                         @php $id++;@endphp
                         
                         
                         
                       
                              
						    <div class="col-md-12 col-lg-12 col-xl-3">
								<div class="card ">
									<div class="card-header ">
										<h3 class="card-title ">Number {{ $id }}  </h3>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x "></i></a>
										</div>
									</div>
									<div class="card-body text-center">
										<span class="avatar avatar-xxl brround" style="background-image: url({{ $log->image}})"></span>
										<h4 style="color:indigo;" class="h4 mb-0 mt-3"><b> {{ $log->name}}</b><br>
										@if ($name == $log->name )
										Thrift ID: <b>{{ $log->reference_id}}</b>
										
										@else
										Thrift ID:<b> {!!str_limit($log->reference_id,'4') !!} </b>
										@endif
										
										<p class="card-text">											<p id="demo"></p> 
<script> 
var deadline = new Date("{{$log->payment_date}}").getTime(); 
var x = setInterval(function() { 
var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds = Math.floor((t % (1000 * 60)) / 1000); 
document.getElementById("demo").innerHTML = days + "d "  
+ hours + "h " + minutes + "m " + seconds + "s "; 
    if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "@if ($name == $log->name & $log->payment_date > 0 )<button data-toggle='modal' data-target='#myModal' class='btn btn-primary btn-corner right15'>Withdraw</button>@elseif ($log->payment_date == 0 ) <button disabled class='btn btn-success btn-corner right15'>Paid</button>@else <button disabled class='btn btn-success btn-corner right15'>Paid</button> @endif"; 
    } 
}, 1000); 
</script></p>

<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Enter Your Bank Account Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('userthrift.post')}}" class="card" method="post">
                            {{ csrf_field() }}
                                      
									<div class="card-header">
										<h3 class="card-title">Available For Withdrawal: <b>{{config('app.currency_symbol')}} {{$thrift->numbers * $log->amount}}</h3></b>
                               
									</div>
									
									
                                   		<div class="card-body ">
											
												  <input id="amount" hidden name="amount" type="text" value="{{$thrift->numbers * $log->amount}}" class="form-control">
												<input id="amount" hidden name="code" type="text" value="{{$log->reference_id}}" class="form-control">
										<div class="form-group">
											<label class="form-label">Enter Account Details</label>
											<textarea rows="5" name="bank" class="form-control" placeholder="Enter About your account description"></textarea>
											
										</div>
										
									</div>
								
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Withdraw Contribution</button>
						</div>
					</div></form>
				</div>
			</div>





									</h4></div>
									@if ($log->payment_date == 0)
                                             
                                              @else
									<div class="card-footer text-center">
										<div class="row user-social-detail">
											<div class="col-lg-6 col-sm-6 col-6">
												<a href="#"><b>Payment Date:</b></a>
											</div>
											<div class="col-lg-6 col-sm-6 col-6">
                                              
												<a href="#">{{ date('F jS, Y \a\t h:i a', strtotime($log->payment_date)) }}</i></a>
											
											</div>
											
										</div>
									</div>
									  @endif
								</div>
							</div>
							 @endforeach
							 @else
                        <h2 class="text-center">No Don't Have any contribution team yet</h2>
                         @endif		
					
							
							</div>
						</div></div></div>
		
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
		  })();</script>
		  @endforeach
		  @endif
		  
		  
@endsection