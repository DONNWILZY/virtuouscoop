<body class="">
		<div id="global-loader"></div>
			<div class="page">
			<div class="page-main">
				<div class="app-header1 header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
						<div class="menu-toggle-button">
								<a class="nav-link wave-effect" href="#" id="sidebarCollapse">
									<span class="fa fa-bars"></span>
								</a>
							</div>
							<a class="header-brand" href="{{route('adminIndex')}}">
								<img src="{{asset('assets\images\brand\logo.png')}}" class="header-brand-img" alt="Logo">
							</a>
							
							<div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
								<div class="p-2">
									<form class="input-icon ">
										<div class="input-icon-addon">
											<i class="fe fe-search"></i>
										</div>
										<input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
									</form>
								</div>

								<div class="dropdown d-none d-md-flex">
									<a class="nav-link icon full-screen-link nav-link-bg">
										<i class="fa fa-expand" id="fullscreen-button"></i>
									</a>
								</div>

								
								<div class="dropdown d-none d-md-flex">
									<a href="{{route('adminMessage.create')}}" class="nav-link icon text-center" >
										<i class="icon icon-speech"></i>
										
									</a>
									
								</div>
								
								<div class="dropdown text-center selector">
									<a href="#" class="nav-link leading-none" data-toggle="dropdown">
										<span class="avatar avatar-sm brround cover-image" data-image-src="{{asset(Auth::user()->profile->avatar)}}"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<div class="text-center">
											<a href="#" class="dropdown-item text-center font-weight-sembold user" data-toggle="dropdown">{{ Auth::user()->name }}</a>
											<span class="text-center user-semi-title text-dark">{{ Auth::user()->email }}</span>
											<div class="dropdown-divider"></div>
										</div>
										
										<a class="dropdown-item" href="{{route('websiteSettings')}}">
											<i class="dropdown-icon  mdi mdi-settings"></i> Settings
										</a>
										<a class="dropdown-item" href="{{route('adminEmail')}}">
											
											<i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
										</a>
											
										<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="accordion-toggle wave-effect" >
								
										
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
										
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                            		   </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wrapper">
					<!-- Sidebar Holder -->
					<nav id="sidebar" class="nav-sidebar Horizontal-Light position-sticky">
						<ul class="list-unstyled components " id="accordion">
							<div class="user-profile">
								<div class="dropdown user-pro-body">
									<div><img src="{{asset(Auth::user()->profile->avatar)}}" alt="user-img" class="img-circle"></div>
									<div class="mb-2"><a href="#" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <span class="font-weight-semibold">{{ Auth::user()->name }}</span>  </a>
									<br><span class="text-gray">{{ Auth::user()->email }}</span>
									</div>
								</div>
							</div>

							<li class="">
								<a href="{{route('adminIndex')}}" class="accordion-toggle wave-effect" >
									<i class="fa fa-dashboard mr-2"></i> Dashboard
								</a>
								
							</li>
							<li class="">
								<a href="#Submenu6" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-users mr-2"></i>Users
								</a>
								<ul class="collapse list-unstyled" id="Submenu6" data-parent="#accordion">
									<li>
										<a href="{{route('admin.users.index')}}">All Users</a>
									</li>
									<li>
										<a href="{{route('admin.users.verified')}}">Active Users</a>
									</li>
									<li>
										<a href="{{route('admin.users.banned')}}">Banned Users</a>
									</li>
									<li>
										<a href="{{route('admin.user.create')}}">Create Users</a>
									</li>
								</ul>
							</li>
							
							 @if($settings->invest == 1)
							<li class="">
								<a href="#Submenu1" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-comments mr-2"></i>Notifications
								</a>
								<ul class="collapse list-unstyled" id="Submenu1" data-parent="#accordion">
									<li>
										<a href="{{route('admin.post.create')}}">New Notification</a>
									</li>
									<li>
										<a href="{{route('admin.posts.index')}}">Manage Notifications</a>
									</li>
									<li>
										<a href="{{route('adminEmail')}}">Message Inbox</a>
									</li>
									<li>
										<a href="{{route('adminEmail.create')}}">New Email</a>
									</li>
									<li>
										<a href="{{route('adminMessage.create')}}">System Message</a>
									</li>
									
								</ul>
							</li>
							 @endif
							
							<li class="">
								<a href="#Submenu22" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-life-buoy mr-2"></i>Support Ticket
								</a>
								<ul class="collapse list-unstyled" id="Submenu22" data-parent="#accordion">
									<li>
										<a href="{{route('adminSupports.open')}}">Active Ticket</a>
									</li>
									<li>
										<a href="{{route('adminSupports.index')}}">Closed Ticket</a>
									</li>
								</ul>
							</li>
							
							<li class="">
								<a href="#Submenu2d2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-handshake-o mr-2"></i>Thrift & Contributions
								</a>
								<ul class="collapse list-unstyled" id="Submenu2d2" data-parent="#accordion">
									<li>
										<a href="{{route('adminthrift')}}">Manage Thrift Plans</a>
									</li>
									<li>
										<a href="{{route('adminthrift.members')}}">View Team</a>
									</li>
									<li>
										<a href="{{route('adminthrift.withdrawal')}}">View Withdrawals</a>
									</li>
								</ul>
							</li>
							<li class="">
								<a href="#Submenu23" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-balance-scale mr-2"></i>Manage Investment
								</a>
								<ul class="collapse list-unstyled" id="Submenu23" data-parent="#accordion">
									<li>
										<a href="{{route('adminInvest')}}">Investment Plans</a>
									</li>
									<li>
										<a href="{{route('adminInvest.create')}}">Create New Plan</a>
									</li>
									<li>
										<a href="{{route('adminusersinvest')}}">Users Investment</a>
									</li>
									
								</ul>
							</li>
							<li class="">
								<a href="#Submenu32" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-cc-visa mr-2"></i> Manage Deposits
								</a>
								<ul class="collapse list-unstyled" id="Submenu32" data-parent="#accordion">
									<li>
										<a href="{{route('admin.users.deposit')}}">Online Deposits</a>
									</li>
									<li>
										<a href="{{route('admin.deposit.local')}}">Offline Deposits</a>
									</li>
								</ul>
							</li>
							
							<li class="">
								<a href="#Submenu3g" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-bank mr-2"></i>Fund Withdrawal
								</a>
								<ul class="collapse list-unstyled" id="Submenu3g" data-parent="#accordion">
									<li>
										<a href="{{route('admin.users.withdraws')}}">All Withdrawals</a>
									</li>
									<li>
										<a href="{{route('admin.withdraws.request')}}">Pending Withdrawal</a>
									</li>
								</ul>
							</li>
							<li class="">
								<a href="#Submenu2s3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-money mr-2"></i>Loan Management
								</a>
								<ul class="collapse list-unstyled" id="Submenu2s3" data-parent="#accordion">
									<li>
										<a href="{{route('adminloan')}}">Loan Plans</a>
									</li>
									<li>
										<a href="{{route('adminloan.create')}}">Create New Plan</a>
									</li>
									<li>
										<a href="{{route('adminusersloan')}}">Pending Loan Requests</a>
									</li>
									
									<li>
										<a href="{{route('adminloandisburse')}}">Disburse Loan</a>
									</li>
									<li>
										<a href="{{route('adminactiveloan')}}">Active Users Loan</a>
									</li>
									
								</ul>
							</li>
							
							<li class="">
								<a href="#Submenu50e" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-credit-card mr-2"></i> Manage Gift Cards
								</a>
								<ul class="collapse list-unstyled" id="Submenu50e" data-parent="#accordion">
									 
									<li>
										<a href="{{route('admin.users.card')}}">Bought Cards</a>
									</li>
									<li>
										<a href="{{route('admin.users.card2')}}">Sales Requests</a>
									</li>
									<li>
										<a href="{{route('admin.users.card3')}}">Sold Cards</a>
									</li>
									<li>
										<a href="{{route('admin.users.card4')}}">Purchase Requests</a>
									</li>
									
								</ul>
							</li>
							
						<li class="">
								<a href="#Submenu501" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-bitcoin mr-2"></i>Manage  Cryptocurrency
								</a>
								<ul class="collapse list-unstyled" id="Submenu501" data-parent="#accordion">
									 
									<li>
										<a href="{{route('admin.users.crypto')}}">Bought Cryptos</a>
									</li>
									<li>
										<a href="{{route('admin.users.crypto2')}}">Sales Requests</a>
									</li>
									<li>
										<a href="{{route('admin.users.crypto3')}}">Sold Cryptos</a>
									</li>
									<li>
										<a href="{{route('admin.users.crypto4')}}">Purchase Requests</a>
									</li>
								</ul>
							</li>
							
							<li class="">
								<a href="#Submenu504" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-line-chart mr-2"></i>Manage Coin Trade
								</a>
								<ul class="collapse list-unstyled" id="Submenu504" data-parent="#accordion">
									<li>
										<a href="{{route('adminCoin')}}">Manage Coins</a>
									</li>
									<li>
										<a href="{{route('adminCoin2')}}">Create Coin</a>
									</li>
									<li>
										<a href="{{route('adminCoin3')}}">My Sold Coin Units</a>
									</li>
									<li>
										<a href="{{route('adminCoin4')}}">User Sold Coin</a>
									</li>
										
								</ul>
							</li>
							
						
							<li class="">
								<a href="{{route('adminKyc2')}}" class="accordion-toggle wave-effect" >
									<i class="fa fa-key mr-2"></i>Accounts Verification
								</a>

							</li>
							<li class="">
								<a href="{{route('adminFundlog')}}" class="accordion-toggle wave-effect" >
									<i class="fa fa-random mr-2"></i>Fund Transfer Log
								</a>

							</li>
							
							<li class="">
								<a href="#Submenu4" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-cogs mr-2"></i>System Settings
								</a>
								<ul class="collapse list-unstyled" id="Submenu4" data-parent="#accordion">
									<li>
										<a href="{{route('websiteSettings')}}">App Settings</a>
									</li>
									<li>
										<a href="{{route('menuSettings')}}">System Features</a>
									</li>
									
									<li>
										<a href="{{route('userSettings')}}">User Settings</a>
									</li>
									<li>
										<a href="{{route('earningSettings')}}">Earnings Setting</a>
									</li>
									<li>
										<a href="{{route('adminFAQ')}}">FAQ Settings</a>
									</li>
									
								</ul>
							</li>
							<li class="">
								<a href="#Submenu40" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-cc-stripe mr-2"></i>Payment Gateway
								</a>
								<ul class="collapse list-unstyled" id="Submenu40" data-parent="#accordion">
									<li>
										<a href="{{route('admin.gateways.index')}}">Payment Gateways</a>
									</li>
									<li>
										<a href="{{route('admin.local.create')}}">Create New Gateway</a>
									</li>
									
								</ul>
							</li>
								<li class="">
								<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="accordion-toggle wave-effect" >
									<i class="fa fa-power-off mr-2"></i>Logout
								</a>
							 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                             </form>	
							</li>
							
						</ul>
					</nav>
					
				