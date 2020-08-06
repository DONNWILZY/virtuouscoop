@extends('layouts.dashboard')
@section('title', 'Verify Account')
@section('content')
        
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets\plugins\date-picker\spectrum.css')}}" rel="stylesheet" />
        <link href="{{asset('assets\plugins\fileuploads\css\dropify.min.css')}}" rel="stylesheet" />
		<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Verify Account</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Verify Account</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-12">
								 <form action="{{route('userKyc2.submit')}}" class="card" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                               
									<div class="card-header">
										<h3 class="card-title">Upload ID</h3>
									</div>
									<div class=" card-body">
										<div class="row">
											
											<div class="col-lg-12 col-sm-12">
												<input type="file" name="photo" class="dropify" data-height="180">
											</div>
											
											
										</div>
										<br>
										<div class="form-group">
											<div class="custom-file">
												<label class="form-label">Select Upload Type</label>
											<select name="name" class="form-control select2">
											
											<option value="Voters' Card">Voters' Card</option>
                                            <option value="Identity Card">Identity Card</option>
                                             <option value="INternational Passport">International Passort</option>
                                             <option value="Drivers' Licence'">Drivers' License</option>

                                        	</select>
											</div>
											
										</div>
										
										
										<br>
										<div class="wd-200 mg-b-30">
										<label class="form-label">Enter ID Number</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-barcode tx-16 lh-0 op-6"></i>
													</div>
												</div><input class="form-control fc-datepicker" name="number" type="text" placeholder="ID Number" type="text">
											</div>
										</div>
										
										
										<div class="wd-200 mg-b-30">
										<label class="form-label">Enter Expiry Date</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" tname="dob" type="date" >
											</div>
										</div>
										
										
										
										<div class="form-group">
										<br>
											
                                			<button type="submit" class="btn btn-primary pull-right">Verify My Account</button>
                                			<a href="{{route('userDashboard')}}"><button type="submit" class="btn btn-secondary">Cancel Verification</button></a>
                                			
											
											
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			
			
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
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
		
		<!-- Custom Js-->
		<script src="{{asset('assets\js\custom.js')}}"></script>
        <script src="{{asset('assets\plugins\fileuploads\js\dropify.min.js')}}"></script>
        
        
		<script src="{{asset('assets\plugins\date-picker\spectrum.js')}}"></script>
		<script src="{{asset('assets\plugins\date-picker\jquery-ui.js')}}"></script>
		<script src="{{asset('assets\plugins\input-mask\jquery.maskedinput.js')}}"></script>
		
		
		<script src="{{asset('assets\plugins\time-picker\jquery.timepicker.js')}}"></script>
		<script src="{{asset('assets\plugins\time-picker\toggles.min.js')}}"></script>
		
        <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop your file here or click to upload',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (2M max).'
                }
            });
        </script>
        
        
          @if(count($errors) > 0)
         @foreach($errors->all() as $error) <script>
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