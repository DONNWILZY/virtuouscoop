 @if(Auth::user()->admin)

<? 
 print "
				<script language='javascript'>
					window.location = '../admin/dashboard';
				</script>
			";
 ?>

@endif
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

		<!-- Title -->
		<title>{{config('app.name')}} - @yield('title')</title>
		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	
		<link href="{{asset('assets\fonts\fonts\font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />
		<!-- Sidemenu Css -->
		<link href="{{asset('assets\plugins\fullside-menu\css\style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\fullside-menu\waves.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />
		<!-- Dashboard Css -->
		<link href="{{asset('assets\css\dashboard.css')}}" rel="stylesheet" />
		
		<link href="{{asset('assets\plugins\accordion\accordion.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\chat\jquery.convform.css')}}" rel="stylesheet" />

		<!-- Morris.js Charts Plugin -->
		<link href="{{asset('assets\plugins\morris\morris.css')}}" rel="stylesheet" />
        
		<link href="{{asset('assets\plugins\charts-nvd3\nv.d3.css')}}" rel="stylesheet" />
		<!-- Custom scroll bar css-->
		<link href="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{asset('assets\css\icons.css')}}" rel="stylesheet" />
	</head>
	 @include('includes.dashboard.navbar')

                @yield('content')

            @include('includes.dashboard.footer')

<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

		<!-- Dashboard Core -->
		
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\selectize.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\jquery.tablesorter.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\circle-progress.min.js')}}"></script>
		<script src="{{asset('assets\plugins\rating\jquery.rating-stars.js')}}"></script>
		
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets\plugins\fullside-menu\jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets\plugins\fullside-menu\waves.min.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('assets\js\custom.js')}}"></script>
		
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\plugins\accordion\accordion.min.js')}}"></script>
		<script src="{{asset('assets\plugins\chat\jquery.convform.js')}}"></script>
		<script src="{{asset('assets\plugins\chat\autosize.min.js')}}"></script>
		<script src="{{asset('assets\plugins\datatable\jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.js')}}"></script>

		
		
		
		<script src="{{asset('assets\plugins\select2\select2.full.min.js')}}"></script>
		<script>
			$(function(e) {
				$(".demo-accordion").accordionjs();
				// Demo text. Let's save some space to make the code readable. ;)
				$('.acc_content').not('.nodemohtml').html('<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Fusce aliquet neque et accumsan fermentum. Aliquam lobortis neque in nulla  tempus, molestie fermentum purus euismod.</p>');
			});
		</script>
	</body>
</html>