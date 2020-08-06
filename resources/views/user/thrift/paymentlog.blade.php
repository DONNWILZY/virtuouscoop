@extends('layouts.dashboard')
@section('title', 'My Contribution History')
@section('content')

		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Contribution Log</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Contribution Log</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title"><h4 style="color:indigo;"> My Next Payments Date: &nbsp; <?
$cur = config('app.currency_symbol');
if ( $today == $time ){
echo "<marquee>You are to contribute Today $today. Failure to contribute today will result to deduction of $cur $penalty from your contributed fund</marquee> " ;
}
?>
</h4>										 @php $id=0;@endphp
                                @foreach($logs as $log)
                                    @php $id++;@endphp
                             <form action="{{route('userthrift.contribute')}}" method="post">
                                        {{ csrf_field() }}
                                  
                                   				<input type="hidden" name="id" value="{{$log->reference_id}}">
                                                <input type="hidden" name="amount" value="{{$log->amount}}">
                                                <input type="hidden" name="number" value="{{$log->number}}">
                                                <input type="hidden" name="cycle" value="{{$log->cycle}}">
                                                <input type="hidden" name="idt" value="{{$log->id}}">
										

 @endforeach
<p id="demo"></p> 
                                          										 

<script> 
var deadline = new Date("{{$time}}").getTime(); 
var x = setInterval(function() { 
var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds = Math.floor((t % (1000 * 60)) / 1000); 
document.getElementById("demo").innerHTML ="<b>" + days + "Days "  
+ hours + "Hours " + minutes + "Minutes " + seconds + "seconds </b>"; 
    if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = (document.getElementById("demo").innerHTML = "" );
    } 
}, 1000); 
</script>

<p id="demo"></p> 
<script> 
var deadline = new Date("{{$time}}").getTime(); 
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
        document.getElementById("demo").innerHTML = "<a href='withdraw.php'><button class='btn btn-primary btn-corner right15'>Withdraw</button></a>"; 
    } 
}, 1000); 
</script> 

 <?
if ( $today == $time ){
echo "<button type='submit' class='btn btn-primary btn-corner right15'>Contribute Now</button>";
}
?>
 </form>

 <hr>
<h4 style="color:indigo;"> Total Amount Contributed:
<b>{{config('app.currency_symbol')}} {{$paid}} </b>
<br>
Total Contribution(s):
<b> {{$paid2}} of {{$log->number}} </b></h4>
                               
										

										</div>

										
				
										
									</div>

									<div class="card-body">
										<div class="table-responsive">
							 @if(count($logs) > 0)
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                              
                                <tr>
                                    <th>SN</th>
                                    <th>Thrift Number</th>
                                    <th>Amount Contributed</th>
                                    <th>Payment Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Thrift ID</th>
                                    <th>Amount Contributed</th>
                                    <th>Payment Date</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($logs as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <form action="{{route('userthrift.contribute')}}" method="post">
                                        {{ csrf_field() }}
                                            
                                   				<input type="hidden" name="id" value="{{$log->reference_id}}">
                                                <input type="hidden" name="amount" value="{{$log->amount}}">
                                                <input type="hidden" name="number" value="{{$log->number}}">
                                                <input type="hidden" name="cycle" value="{{$log->cycle}}">
                                                <input type="hidden" name="idt" value="{{$log->id}}">
											
										
                                        <td>{{$log->reference_id}}</td>
                                        <td>{{config('app.currency_symbol')}} {{$log->amount + 0 }}</td>
                                        <td>{{$log->created_at->diffForHumans()}}</td>
                                        
                                        <td>
                                          										 <button class="badge btn-success">Paid</button> 
                                          										 



</form>
							  		</td>
                                         </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h2 class="text-center">You Have Not Made Any Contribution Yet.</h2>
                    @endif		
									</div>
									<!-- table-wrapper -->
								</div>
								<!-- section-wrapper -->
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
		
		
		<!--Time Counter -->
		<script src="{{asset('assets\plugins\counters\jquery.missofis-countdown.js')}}"></script>
		<script src="{{asset('assets\plugins\counters\counter.js')}}"></script>


		
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