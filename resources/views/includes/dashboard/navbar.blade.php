
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
							<a class="header-brand" href="{{route('userDashboard')}}">
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
									<a href="{{route('userMessage')}}" class="nav-link icon text-center" >
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
										<a class="dropdown-item" href="{{route('userMyprofile')}}">
											<i class="dropdown-icon mdi mdi-account-outline"></i> Profile
										</a>
										<a class="dropdown-item" href="{{route('userProfile')}}">
											<i class="dropdown-icon  mdi mdi-settings"></i> Settings
										</a>
										<a class="dropdown-item" href="{{route('userMessage')}}">
											
											<i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
										</a>
											<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{route('userNewmess')}}">
											<i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
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
								<a href="{{route('userDashboard')}}" class="accordion-toggle wave-effect" >
									<i class="fa fa-dashboard mr-2"></i> Dashboard
								</a>
								
							</li>
							<li class="">
								<a href="#Submenu6" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-comments-o mr-2"></i>Messages
								</a>
								<ul class="collapse list-unstyled" id="Submenu6" data-parent="#accordion">
									<li>
										<a href="{{route('userMessage')}}">Notifications</a>
									</li>
									<li>
										<a href="{{route('userNewmess')}}">Open Ticket</a>
									</li>
									<li>
										<a href="{{route('userSupports')}}">Ticket History</a>
									</li>
								</ul>
							</li>
							@if($settings->login == 1)
							<li class="">
								<a href="#Submenu6q" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-clock-o mr-2"></i>My Daily Reward
								</a>
								<ul class="collapse list-unstyled" id="Submenu6q" data-parent="#accordion">
									<li><a href="#" id="bonus"> Please Wait
									<script>
								   var countDownDate = new Date({!! $rewards !!}).getTime();
								   var x = setInterval(function() {
								   var now = new Date().getTime();
								   var distance = countDownDate - now;
								   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
								   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
								   var confirmButton = document.getElementById("bonus");
									   confirmButton.innerHTML ="<b>Please Wait...<br>" + hours + " Hrs " + minutes + " Mins " + seconds + "</b>";
									   if (distance < 0) {
										   clearInterval(x);
										   confirmButton.innerHTML = "Earn Rewards";
										   confirmButton.setAttribute('href','{{route('userDailyBonus')}}');
									   }
								   }, 1000);
							  		</script></a>
										</li>
								</ul>
							</li>
							@endif
							
							
							 @if($settings->invest == 1)
							<li class="">
								<a href="#Submenu1" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-balance-scale mr-2"></i> Investment
								</a>
								<ul class="collapse list-unstyled" id="Submenu1" data-parent="#accordion">
									<li>
										<a href="{{route('userInvestments')}}">New Investment</a>
									</li>
									<li>
										<a href="{{route('userInvest.history')}}">My Investment</a>
									</li>
									<li>
										<a href="{{route('userInterest.history')}}">My Investment Yield</a>
									</li>
								</ul>
							</li>
							 @endif
							@if($settings->deposit == 1)
							<li class="">
								<a href="#Submenu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-credit-card mr-2"></i> Fund Wallet
								</a>
								<ul class="collapse list-unstyled" id="Submenu2" data-parent="#accordion">
									<li>
										<a href="{{route('userDeposit.create')}}">Deposit Fund</a>
									</li>
									<li>
										<a href="{{route('userDeposits')}}">Deposit History</a>
									</li>
								</ul>
							</li>
							@endif
							
							@if($settings->thrift == 1)
							<li class="">
								<a href="#Submenu2e" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-handshake-o mr-2"></i> Thrift & Contributions
								</a>
								<ul class="collapse list-unstyled" id="Submenu2e" data-parent="#accordion">
									<li>
										<a href="{{route('userthrift')}}">Join Thrift</a>
									</li>
									<li>
										<a href="{{route('userthrift.history')}}">Thrift History</a>
									</li>
									<li>
										<a href="{{route('userthrift.withdrawal')}}">Thrift Withdrawal</a>
									</li>
								</ul>
							</li>
							@endif
							
							@if($settings->tenural == 1)
							<li class="">
								<a href="#Submnu2e" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-calendar mr-2"></i>Durational Savings
								</a>
								<ul class="collapse list-unstyled" id="Submnu2e" data-parent="#accordion">
									<li>
										<a href="{{route('userSavings')}}">New Savings Plan</a>
									</li>
									
									<li>
										<a href="{{route('userSavings.history')}}">Savings History</a>
									</li>
								</ul>
							</li>
							@endif
							
							@if($settings->withdraw == 1)
							<li class="">
								<a href="#Submenu3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-bank mr-2"></i> Withdraw Fund
								</a>
								<ul class="collapse list-unstyled" id="Submenu3" data-parent="#accordion">
									<li>
										<a href="{{route('userWithdraw.create')}}">New Withdrawal</a>
									</li>
									<li>
										<a href="{{route('userWithdraws')}}">Withdrawal History</a>
									</li>
								</ul>
							</li>
							
							@endif
							@if($settings->loan == 1)					
							<li class="">
								<a href="#Submenu3w" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-money mr-2"></i>Loan
								</a>
								<ul class="collapse list-unstyled" id="Submenu3w" data-parent="#accordion">
									<li>
										<a href="{{route('userLoan')}}">New Loan</a>
									</li>
									<li>
										<a href="{{route('userMyloan')}}">My Loan</a>
									</li>
									
									<li>
										<a href="{{route('userPayloan')}}">Pay Loan</a>
									</li>
									
									<li>
										<a href="{{route('userPaylog')}}">Payment History</a>
									</li>
								</ul>
							</li>
							@endif
							
							@if($settings->giftsystem == 1)
							<li class="">
								<a href="#Submenu50" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-credit-card mr-2"></i> Gift Cards
								</a>
								<ul class="collapse list-unstyled" id="Submenu50" data-parent="#accordion">
									 
									<li>
										<a href="{{route('userSellcard')}}">Sell Gift Card</a>
									</li>
									<li>
										<a href="{{route('userSoldcards')}}">Sold Gift Cards</a>
									</li>
									
									<li>
										<a href="{{route('userBuycards')}}">Buy Gift Card</a>
									</li>
									<li>
										<a href="{{route('userBoughtcards')}}">Purchased Gift Card</a>
									</li>
								</ul>
							</li>
						@endif
						@if($settings->cryptosystem == 1)	
						<li class="">
								<a href="#Submenu501" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-bitcoin mr-2"></i> Cryptocurrency
								</a>
								<ul class="collapse list-unstyled" id="Submenu501" data-parent="#accordion">
									 
									<li>
										<a href="{{route('userSellcoins')}}">Sell Cryptocurrency</a>
									</li>
									<li>
										<a href="{{route('userSoldcoins')}}">Sold Cryptocurrencies</a>
									</li>
									
									<li>
										<a href="{{route('userBuycoins')}}">Buy Cryptocurrency</a>
									</li>
									<li>
										<a href="{{route('userBoughtcoins')}}">Purchased Cryptocurrencies</a>
									</li>
								</ul>
							</li>
					  @endif
							@if($settings->coinsystem == 1)
							<li class="">
								<a href="#Submenu504" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-line-chart mr-2"></i> Coin Trade
								</a>
								<ul class="collapse list-unstyled" id="Submenu504" data-parent="#accordion">
									<li>
										<a href="{{route('userBuyunits')}}">Purchase Coin</a>
									</li>
									<li>
										<a href="{{route('userMycoins')}}">Purchased Coin</a>
									</li>
									<li>
							@if($settings->coinsell == 1)
										<a href="{{route('userSellunits')}}">Sell Coin</a>
									</li>
							
									<li>
										<a href="{{route('userSoldunitcoins')}}">Sold Coin</a>
									</li>
							@endif		
									
								</ul>
							</li>
							@endif
							
						    @if($settings->refer == 1)
							<li class="">
								<a href="{{route('userReferrals')}}" class="accordion-toggle wave-effect" >
									<i class="fa fa-sitemap mr-2"></i> Referral Link
								</a>

							</li>
							@endif
							 @if($settings->transfer == 1)
							<li class="">
								<a href="#Submenu55" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-share mr-2"></i> Transfer Fund
								</a>
								<ul class="collapse list-unstyled" id="Submenu55" data-parent="#accordion">
									
									<li>
										<a href="{{route('userFundsTransfer')}}">New Transfer</a>
									</li>
									
									<li>
										<a href="{{route('userFundsTransfer.history')}}">Transfer History</a>
									</li>
								</ul>
							</li>
							@endif
							<li class="">
								<a href="#Submenu4" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fa fa-cogs mr-2"></i> Account
								</a>
								<ul class="collapse list-unstyled" id="Submenu4" data-parent="#accordion">
									<li>
										<a href="{{route('userMyprofile')}}">View Profile</a>
									</li>
									<li>
										<a href="{{route('userProfile')}}">Edit Profile</a>
									</li>
								</ul>
							</li>
							@if($settings->verify == 1)
							<li class="">
								<a href="{{route('userVerify')}}" class="accordion-toggle wave-effect">
									<i class="fa fa-lock mr-2"></i>Verify Account
								</a>
								
							</li>
							@endif
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
				