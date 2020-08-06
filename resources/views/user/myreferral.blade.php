@extends('layouts.dashboard')
@section('title', 'My Referral')
@section('content')
<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
						<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Downlines</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Downlines</li>
							</ol>
						</div>
						<div class="input-group">
							<input type="text" readonly id="myInput" class="form-control br-tl-7 br-bl-7" value="{{ $link }}">
							<div class="input-group-append ">
								<button type="button" onclick="myFunction()" class="btn btn-primary br-tr-7 br-br-7">
									Copy
								</button>
							</div>
						</div>
						
						<br>
						<div class="col-sm-12 col-lg-6 col-xl-12 col-md-6">
								<div class="card card-img-holder text-default">
									<div class="row">
										<div class="col-4">
											<div class="card-img-absolute circle-icon bg-success align-items-center text-center shadow-success"><i class=" lnr lnr-users fs-30 text-white mt-4 "></i></div>
										</div>
										<div class="col-8">
											<div class="card-body p-4">
												<h3 class="mb-3">{{config('app.currency_symbol')}} {{$user->profile->referral_balance + 0}}</h3>
												<h5 class="font-weight-normal mb-0">Referral Balance</h5>
											</div>
										</div>
									</div>
							   </div>
							</div>
						<div class="card mt-5  ">
							<div class="table-responsive">
								<table class="table card-table">
								 @if(count($referrals) > 0)
									<tr class="border-bottom">
										
										<th class="text-center">Photo</th>
										<th class="text-center">Name</th>
										<th class="text-center">User's Earnings</th>
										<th class="text-center">Status</th>
										<th class="text-center">Date Joined</th>
									</tr>
									
										 @php $id=0;@endphp
                                @foreach($referrals as $referral)
                                    @php $id++;@endphp
                                   <tr class="border-bottom">
                                       
                                        <td class="text-center" width="10%" >
                                            <img src="{{$referral->user->profile->avatar}}" class="avatar brround avatar-md d-block" alt="No Photo"  >
                                        </td>
                                        <td class="text-center">{{$referral->user->name}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$referral->total + 0}}</td>
                                        <td class="text-center">

                                            @if($referral->user->active == 0)
                                                Not Active
                                            @else
                                                Active
                                            @endif

                                        </td>
                                        <td class="text-center">{{($referral->user->created_at->diffForHumans()) }}</td>
                                    </tr>

                                @endforeach
                                 @else
                            <h4> You have not referred any user yet. Please share your referral link to your social media links</h4>

                      		  @endif

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");
(function () {
		  $(function () {
		   return $.growl.notice({
				message: "You referral link: " + copyText.value + "has been copied, go ahead and share on your social media platforms to earn bonus"
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
  /* Alert the copied text */
  
}
</script>
       <script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="assets\js\select2.js"></script>
		<script src="assets\plugins\select2\select2.full.min.js"></script>
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		
		                              
		
			
@endsection