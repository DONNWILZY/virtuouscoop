@extends('layouts.frontend')

@section('title', 'Welcome to I-Invest')

@section('content')

<!--Start Preloader-->
<div class="preloader" id="preloader"></div>
<!--End Preloader-->

<!-- header top begin -->
<header class="header-section" id="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex justify-content-start reunir-content-center">
                    <div class="header-left">
                        <ul>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-headphone-alt"></i>
                                    </span>{{$settings->contact_number}}
                                </p>
                            </li>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-email"></i>
                                    </span>{{$settings->contact_email}}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end reunir-content-center">
                    <div class="header-right">
                        <ul>
                            <li class="header-right-list">
                                <div class="dropdown show header-dropdown">
                                    <span class="header-left-icon"><i class="icofont-web"></i></span>
                                    <select class="selectpicker" name="languages" tabindex="-98">
                                        <option value="">English</option>
                                        <option value="1">Bengali</option>
                                        <option value="2">Dutch</option>
                                    </select>
                                </div>
                            </li>
                            <li class="header-right-list">
                                <p class="header-right-text"><span class="header-right-icon carticon"><i class="icofont-shopping-cart"></i></span>My cart (0)</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- nav top begin -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light reunir-navbar">
        <div class="container">

            <div class="logo-section">
                <a class="logo-title navbar-brand" href="#"><img src="{{asset('assets\images\brand\logo.png')}}" alt="logo">{{config('app.name')}} </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icofont-navigation-menu"></i>
            </button>
            <div class="collapse navbar-collapse nav-main justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="primary-menu">
                    <li class="nav-item active">
                        <a class="nav-link active" href="#header-section">HOME
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#affiliate-section">AFFILIATES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#investment-section">PLANS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BLOG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-us-section">CONTACT</a>
                    </li>
                </ul>
            </div>
             @if (Auth::guest())
            <div class="right-side-box">
                <a class="join-btn" href="{{ route('login') }}">Login</a>
            </div>
            @else
            <div class="right-side-box">
                <a class="join-btn" href="{{ url('/user/dashboard') }}">Account</a>
            </div>
            @endif
        </div>
    </nav>
    <!-- nav top end -->
</header>
<!-- header top end -->

<!-- banner top begin -->
<section class="banner-section">
    <div class="overlay">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-text">
                        <h2 class="font-light">Welcome To</h2>
                        <h1 class="font-bold">{{config('app.name')}}</h1>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="banner-bottom-text">{{$settings->site_title}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="get-start">
                        <a href="{{ route('register') }}">GET STARTED NOW!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="statics-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics no-border">
                            <div class="icon-box">
                                <i class="ren-people"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">{{$count->total}}</span>
                                <h4>Registered users</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-web"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">{{$invest + 0}}</span>
                                <h4>Invested Fund</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-withdraw"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">{{$withdraw + 0}}</span>
                                <h4>Total Withdrawal</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-reguser"></i>
                            </div>
                            <div class="text-box">
                                <span class="counter">{{$deposit + 0}}</span>
                                <h4>Total Deposits</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner top end -->



<!-- choose section begin -->
<section class="choose-section">
    <div class="overlay">
        <div class="container-fruit text-center">
            <div class="row mr-0 ml-0 d-flex justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="choose-text">
                        <h4  style="color:white;" class="choose-subtitle  ">Why Choose {{config('app.name')}} ?</h4>
                        <p style="color:white;" class="choose-title-describe">Our service gives you better result and savings, as per your requirement and you can manage your investments from anywhere either form home or work place, at any time.</p>
                    </div>
                </div>
            </div>

            <div class="choose-section-carousel">

                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="{{asset('frontasset/img/daily-income.svg')}}" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Daily Income</h2>
                            <h3 class="single-item-description">Earn Money Daily For Every Login</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="{{asset('frontasset/img/withdraw1.svg')}}" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                            <h3 class="single-item-description">Cash-out Payment in Minutes of request</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="{{asset('frontasset/img/invest-fild.svg')}}" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">Easy to Use</h2>
                            <h3 class="single-item-description">User friendly environment for ease of use.</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="{{asset('frontasset/img/security.svg')}}" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">HIGH SECURITY</h2>
                            <h3 class="single-item-description">Secure trading system void of intrusion</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-item">
                        <div class="icon-box">
                            <img src="{{asset('frontasset/img/customer-service.svg')}}" alt="#">
                        </div>
                        <div class="text-box">
                            <h2 class="single-item-title">24/7 Support</h2>
                            <h3 class="single-item-description">Super customer's service system for  users</h3>
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</section>
<!-- choose section end -->

<!-- invest section begin -->
<section class="invest-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="invest-text">
                        <h5 class="invest-title">With {{config('app.name')}} You Can Trade</h5>
                        <h2 class="invest-subtitle">Money More Smartly</h2>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-center reunir-content-center">
                    <div class="single-box location-left">
                        <div class="img-box">
                            <div class="font-side">
                                <img src="{{asset('frontasset/img/sign-up.svg')}}" alt="#">
                            </div>
                            <div class="back-side">
                                <img src="{{asset('frontasset/img/sign-up.svg')}}" alt="#">
                            </div>
                        </div>
                        <div class="text-box">
                            <a href="#">FIRST STEP<i class="ren-arrowright"></i></a>
                            <h3>Create Account</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center reunir-content-center">
                    <div class="single-box">
                        <div class="img-box">
                            <div class="font-side">
                                <img src="{{asset('frontasset/img/deposit.svg')}}" alt="#">
                            </div>
                            <div class="back-side">
                                <img src="{{asset('frontasset/img/deposit.svg')}}" alt="#">
                            </div>
                        </div>
                        <div class="text-box">
                            <a href="#">SECOND STEP<i class="ren-arrowright"></i></a>
                            <h3>Invest & Trade</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center reunir-content-center">
                    <div class="single-box location-right">
                        <div class="img-box">
                            <div class="font-side">
                                <img src="{{asset('frontasset/img/withdraw-1.svg')}}" alt="#">
                            </div>
                            <div class="back-side">
                                <img src="{{asset('frontasset/img/withdraw-1.svg')}}" alt="#">
                            </div>
                        </div>
                        <div class="text-box">
                            <a href="#">THIRD STEP<i class="ren-arrowright"></i></a>
                            <h3>Make Money</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invest section end -->

<!-- advantage section begin -->
<section class="advantage-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="advantage-text">
                        <h5 class="advantage-title">What Makes Us Stand Out</h5>
                        <h4 class="advantage-subtitle">{{config('app.name')}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="single-box">
                        <div class="icon-box">
                            <i class="icofont-chart-growth"></i>
                        </div>
                        <div class="text-box">
                            <h2>Buy & Sell Digital Shares</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="single-box">
                        <div class="icon-box">
                            <i class="icofont-credit-card"></i>
                        </div>
                        <div class="text-box">
                            <h2>Buy & Sell Gift Cards</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="single-box">
                        <div class="icon-box">
                            <i class="icofont-bitcoin-true"></i>
                        </div>
                        <div class="text-box">
                            <h2>Buy & Sell Cryptocurrency</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- advantage section end -->

<!-- investment section begin -->
<section class="investment-section" id="investment-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="investment-text">
                        <h4 class="investment-subtitle">{{config('app.name')}} Plans</h4>
                        <p class="investment-title-describe">{{config('app.name')}} ensures that your invested fund yields an utmost satisfaction.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="investment-section-carousel">
					@if($invests)
                    @foreach($invests as $invest)
						
                        <div class="col text-center">
                            <div class="single-item">
                                <div class="single-image">
                                   
                                </div><br><br>
                                <div class="icon-box">
                                    <img src="{{asset('frontasset/img/security.svg')}}" alt="#"><hr>
                                    {{$invest->name}}
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>{{$invest->percentage + 0}}</b>%</span>
                                    <h3>{{$invest->style->name}} For {{$invest->repeat}} {{$invest->style->tag}}</h3>
                                    <h4 class="min-max">
                                        <span class="left">Min. : <b>{{config('app.currency_symbol')}} {{$invest->minimum + 0}}</b></span>
                                        <span class="right">Max.: <b>{{config('app.currency_symbol')}} {{$invest->maximum + 0}}</b></span>
                                    </h4>
                                </div>
                                <div class="part-cart">
                                    <a href="{{ route('register') }}">Get Started</a>
                                </div>
                            </div>
                        </div>
					 @endforeach
                 	 @endif
                       

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- investment section end -->

<!-- calculator bottom begin -->
<section class="calculate-aria-second">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="calculate-left">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="icon-box">
                                <i class="ren-calculator"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                            <div class="form-group">
                                <h2 class="amount">Investment Calculator</h2>
                                <div class="input-dropdown">
                                    <input type="text" name="text" placeholder="{{config('app.currency_symbol')}}0.00" class="main-form calculator-area-invest">
                                    <div class="form-dropdown">
                                        <select class="form-btn-dropdown calculator-area-profit">
                                        @if($invests)
                   					    @foreach($invests as $invest)
                                            <option value="{{$invest->percentage + 0}}">{{$invest->percentage + 0}}% {{$invest->style->name}}</option>
                                        @endforeach
                 						@endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 text-center">
                <div class="calculate-right">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-area-daily">0</span>
                                <h4>{{config('app.currency_symbol')}} Daily Profit</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-area-weekly">0</span>
                                <h4>{{config('app.currency_symbol')}} Weekly Profit</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="text-box">
                                <span class="counter calculator-result-area-monthly">0</span>
                                <h4>{{config('app.currency_symbol')}} Monthly Profit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- calculator bottom end -->

<!-- affiliate section begin -->
<section class="affiliate-section" id="affiliate-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="affiliate-text">
                        <h5 class="affiliate-title">What You’ll Get As</h5>
                        <h2 class="affiliate-subtitle">An Affiliate Partner</h2>
                        <p class="affiliate-title-describe">We give you the opportunity to earn money by recommending our website to others. You can start
                            earning money even if you do not invest, buy gift card, trade coin or deposit.
                            Earnings from the affiliate program are immediately available in the account balance. You can
                            invest or withdraw referral earnings at any time.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="part-cart">
                        <a href="#">I want to Join</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- affiliate section end -->

<!-- referral section begin -->
<section class="referral-section">
    <div class="container">
        <div class="row referral-section-item">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="referral-img">
                    <img src="{{asset('frontasset/img/referral-img.png')}}" alt="#">
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="referral-section-right">
                    <div class="referral-text">
                        <h5 class="referral-title">Earn Money Referring New User. </h5>
                        <p class="referral-title-describe">Referral Commmission For Every New User Referred On {{config('app.name')}}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people1"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">{{config('app.currency_symbol')}} {{$settings->signup_bonus}}</span>
                                            <h5 class="item-text">Signup Bonus</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people2 bg-second"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">{{config('app.currency_symbol')}} {{$settings->referral_signup}}</span>
                                            <h4 class="item-text">Referral Bonus</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people3 bg-third"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">{{config('app.currency_symbol')}} {{$settings->daily_rewards}}</span>
                                            <h4 class="item-text">Daily Reward</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- referral section end -->

<!-- deposit section begin -->
<section class="deposit-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="deposit-text">
                    <h5 class="deposit-title">Buy & Sell Cryptocurrency or Gift Cards</h5>
                    <h2 class="deposit-subtitle">{{config('app.name')}} Digital Money</h2>
                    <p class="deposit-title-describe">Buy or sell your cryptocurrencies or gift cards on {{config('app.name')}} and enjoy instant payout of remmitance .</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 reunir-content-center">
                <div class="row d-flex justify-content-start">
                    <div class="col-lg-8">
                        <div class="payment-methods-outer">
                            <div class="payment-methods">
                                <div class="icon-gallery">
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="{{asset('frontasset/img/card-icon.png')}}" alt="#">
                                        </div>
                                        <h5 class="icon-title">Credit Card</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="{{asset('frontasset/img/paypal.png')}}" alt="#">
                                        </div>
                                        <h5 class="icon-title">Paypal</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="{{asset('frontasset/img/bitcoin.png')}}" alt="#">
                                        </div>
                                        <h5 class="icon-title">Bitcoin</h5>
                                    </div>
                                </div>
                                <div class="icon-gallery">
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="{{asset('frontasset/img/litecoin.png')}}" alt="#">
                                        </div>
                                        <h5 class="icon-title">Litecoin</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="{{asset('frontasset/img/ethereum.png')}}" alt="#">
                                        </div>
                                        <h5 class="icon-title">Ethereum</h5>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <img src="{{asset('frontasset/img/ripple.png')}}" alt="#">
                                        </div>
                                        <h5 class="icon-title">Ripple</h5>
                                    </div>
                                </div>
                                <div class="link-box">
                                    <a href="{{ route('register') }}">Trade Digital Money Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 mt-4">
                <div class="deposit-section-right">
                    <div class="icon-box-outer">
                        <div class="icon-box">
                            <i class="ren-withdraw2"></i>
                        </div>
                    </div>
                    <div class="icon-text">
                        <h2 class="icon-title">No Limit</h2>
                        <p class="icon-title-describe">Unlimited maximum withdrawal amount</p>
                    </div>
                </div>
                <div class="deposit-section-right">
                    <div class="icon-box-outer">
                        <div class="icon-box icon-box-orange">
                            <i class="ren-deposit5"></i>
                        </div>
                    </div>
                    <div class="icon-text">
                        <h2 class="icon-title">Withdrawal in 24 /7</h2>
                        <p class="icon-title-describe">Deposit – instantaneous</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- deposit section end -->

<!-- transaction section begin -->
<section class="transaction-section">
    <div class="right-img">
        <img class="right-ellipse1" src="{{asset('frontasset/img/transaction-bg-ellipse-01.png')}}" alt="#">
        <img class="right-shape1" src="{{asset('frontasset/img/transaction-bg-shape-01.png')}}" alt="#">
        <img class="right-shape2" src="{{asset('frontasset/img/transaction-bg-shape-01.png')}}" alt="#">
        <img class="right-ellipse2" src="{{asset('frontasset/img/transaction-bg-ellipse-02.png')}}" alt="#">
    </div>
    <div class="left-img">
        <img class="left-ellipse1" src="{{asset('frontasset/img/transaction-bg-ellipse-03.png')}}" alt="#">
        <img class="left-ellipse2" src="{{asset('frontasset/img/transaction-bg-ellipse-03.png')}}" alt="#">
        <img class="left-ellipse3" src="{{asset('frontasset/img/transaction-bg-ellipse-03.png')}}" alt="#">
        <img class="left-shape1" src="{{asset('frontasset/img/transaction-bg-shape-01.png')}}" alt="#">
        <img class="left-shape2" src="{{asset('frontasset/img/transaction-bg-shape-01.png')}}" alt="#">
        <img class="left-shape3" src="{{asset('frontasset/img/transaction-bg-shape-01.png')}}" alt="#">
        <img class="left-shape4" src="{{asset('frontasset/img/transaction-bg-shape-01.png')}}" alt="#">
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="transaction-text text-center">
                    <h5 class="transaction-title">User Statistics</h5>
                    <h2 class="transaction-subtitle">Latest Transaction</h2>
                    <p class="transaction-title-describe">Our goal is to simplify investing so that anyone can be an investor.Withthis in mind, we hand-pick the investments we offer on our platform.</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7 col-md-11">

                <ul class="nav nav-pills mb-3 justify-content-center transaction-bnt-outline" id="transaction-pills-tab" role="tablist">
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link active" id="transaction-pills-deposits-tab" data-toggle="pill" href="#pills-deposits" role="tab" aria-controls="pills-deposits" aria-selected="true">
                            <span class="d-flex align-items-center"><i class="ren-deposits d-flex align-items-center"></i>LAST 5<br>DEPOSITS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawal" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-investo d-flex align-items-center"></i>Last 5<br>GIFT CARDS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-investing-tab" data-toggle="pill" href="#pills-invest" role="tab" aria-controls="pills-invest" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-people3 d-flex align-items-center"></i>LAST 5<br>INVESTORS</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content transaction-tab-content" id="transaction-pills-tabContent">
                    <div class="tab-pane fade show active transaction-tab-pane" id="pills-deposits" role="tabpanel" aria-labelledby="transaction-pills-deposits-tab">
                        <table class="table table-responsive transaction-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Gateway</th>
                                <th scope="col">Date</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($depo)
                  		    @foreach($depo as $deposit)
					
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="{{asset('frontasset/img/avatar.png')}}" alt="#">
                                    </div>
                                  
                                </th>
                                <td>{{config('app.currency_symbol')}} {{$deposit->amount}}</td>
                                <td>{{$deposit->gateway_name}}</td>
                                <td>{{$deposit->created_at->diffForHumans()}}</td>
                                <td>{{(str_limit($deposit->transaction_id,'3'))}}</td>
                                <td><button class="badge btn-success" href="#">Successful</button></td>
                            </tr>
                          @endforeach
                 		  @endif 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade transaction-tab-pane" id="pills-withdrawals" role="tabpanel" aria-labelledby="transaction-pills-withdrawal-tab">
                        <table class="table table-responsive transaction-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Gateway</th>
                                <th scope="col">Date</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($card)
                  		    @foreach($card as $card)
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="{{asset('frontasset/img/avatar.png')}}" alt="#">
                                    </div>
                                 </th>
                                <td>{{$card->type}}</td>
                                <td>${{$card->amount}}</td>
                                <td>{{$card->created_at->diffForHumans()}}</td>
                                <td>{{(str_limit($deposit->transaction_id,'3'))}}</td>
                                <td><button class="badge btn-success" href="#">Processed</button></td
                            </tr>
                             @endforeach
                 		  	 @endif 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade transaction-tab-pane" id="pills-invest" role="tabpanel" aria-labelledby="transaction-pills-investing-tab">
                        <table class="table table-responsive transaction-table">
                            <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Date</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($inv)
                  		    @foreach($inv as $invest)
					
                            <tr>
                                <th scope="row" class="d-flex">
                                    <div class="user-img">
                                        <img src="{{asset('frontasset/img/avatar.png')}}" alt="#">
                                    </div>
                                </th>
                                <td>{{config('app.currency_symbol')}} {{$invest->amount}}</td>
                                <td>{{$invest->name}}</td>
                                <td>{{$invest->created_at->diffForHumans()}}</td>
                                <td>{{config('app.currency_code')}}</td>
                                <td>{{(str_limit($invest->reference_id,'3'))}}</td>
                                <td><button class="badge btn-success" href="#">Successful</button></td
                            </tr>
                          @endforeach
                 		  @endif 
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="part-cart">
                    <a href="#">Browse More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- transaction section end -->



<!-- testimonial section begin -->
<section class="testimonial-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="testimonial-text text-center">
                    <h5 style="color:white;" class="testimonial-title">Happy Clients</h5>
                    <h2 style="color:white;" class="testimonial-subtitle">Testimonial of Clients</h2>
                    <p style="color:white;" class="testimonial-title-describe">We have many happy investors invest with us .Some impresions from our Customers! PLease read some of the lovely things our Customers say about us.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">


                <div class="testimonial-carousel">
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">“Great service! I have been worried about investing. But when I came here. I don't have to worry anymore’’</p>
                            <h2 class="client-name">Joy Kelley</h2>
                            <h4 class="client-date">United kingdom, 28th April,2019</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="{{asset('frontasset/img/avatar.png')}}" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">“Great service! I have been worried about investing. But when I came here. I don't have to worry anymore’’</p>
                            <h2 class="client-name">Joy Kelley</h2>
                            <h4 class="client-date">United kingdom, 28th April,2019</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="{{asset('frontasset/img/avatar.png')}}" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p class="client-describe">“Great service! I have been worried about investing. But when I came here. I don't have to worry anymore’’</p>
                            <h2 class="client-name">Joy Kelley</h2>
                            <h4 class="client-date">United kingdom, 28th April,2019</h4>
                        </div>
                        <div class="carousel-img">
                            <div class="img-outline">
                                <img src="{{asset('frontasset/img/avatar.png')}}" alt="#">
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</section>
<!-- testimonial section end -->

<!-- questions section begin -->
<div class="questions-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="questions-text">
                    <h2 class="questions-subtitle">We've Got Answers</h2>
                 </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-center questions-nav-pills" id="questions-pills-tab" role="tablist">
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link active" id="questions-pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="questions-pills-basic-tab" aria-selected="true">Basic Questions & Answers On Our Platform</a>
                    </li>
                   
                </ul>
                <div class="tab-content questions-tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active questions-tab-pane" id="pills-basic" role="tabpanel" aria-labelledby="questions-pills-basic-tab">
                        <div class="questions-accordion" id="withdrawal-accordion">
                      
                            @if($faq)
                  		    @foreach($faq as $faq)
					
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapse{{$faq->id}}" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            {{$faq->title}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapse{{$faq->id}}" class="collapse questions-show" aria-labelledby="withdrawal-heading{{$faq->id}}" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        {{$faq->content}}
                                    </div>
                                </div>
                            </div>
						 @endforeach
                 		 @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- questions section end -->

<!-- signup section begin -->
<section class="signup-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="signup-text">
                        <h5 class="signup-title">CREATE YOUR PERSONAL ACCOUNT</h5>
                        <h2 class="signup-subtitle">Get Started Now</h2>
                        <p class="signup-title-describe">Get Started Now,Create your personal account as a first step to become a sucessfull investor.Are you ready to start earning with us?</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 d-flex justify-content-end align-items-center reunir-content-center">
                    <div class="signup-right-text">
                        <a href="#">Signup Now<i class="ren-arrowright"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- signup section end -->

<!-- contact-us section begin -->
<section class="contact-us-section" id="contact-us-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="contact-us-text">
                    <h5 class="contact-us-title">Contact Us</h5>
                    <h2 class="contact-us-subtitle">Get in Touch</h2>
                    <p class="contact-us-title-describe">Email: {{$settings->contact_email}}<br>
                    Phone: {{$settings->contact_number}}<br>
                    Address: {{$settings->address}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-img">
                    <img src="{{asset('frontasset/img/contact-us.png')}}" alt="#">
                </div>
            </div>
             @if(count($errors) > 0)
                                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                                    <i class="material-icons" data-notify="icon">notifications</i>
                                                    <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                            <li><strong> {{$error}} </strong></li>
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <br>
                                            @endif
            <div class="col-lg-5">
                <div class="contact-form">
                    <form id="contactForm" method="post" action="{{route('userSupport.post')}}" class="contact-form-aqua">
                    {{csrf_field()}}
                        <h2 class="contact-head">Send Us a Massage</h2>
                         <input type="text"  name="subject" required="" placeholder="Email *" class="contact-frm">
                        <textarea name="body" id="message" placeholder="Message *" class="contact-msg"></textarea>
                        <input id="form-submit" type="submit" value="SUBMIT NOW" class="contact-btn">
                        <br>
                        <br>
                        <span class="msgSubmit"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-us section end -->

<!-- footer section begin -->
<footer class="footer-section">
    <div class="overlay">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="social-icon">
                        <ul class="icon-area">
                            <li class="social-nav">
                                <a href="#"><i class="icofont-facebook"></i></a>
                            </li>
                            <li class="social-nav">
                                <a href="#"><i class="icofont-twitter"></i></a>
                            </li>
                            <li class="social-nav">
                                <a href="#"><i class="icofont-pinterest"></i></a>
                            </li>
                            <li class="social-nav">
                                <a href="#"><i class="icofont-rss"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-text">
                        <h5 class="footer-title">Subscribe to {{config('app.name')}}</h5>
                        <h2 style="color:white;" class="footer-subtitle">To Get Exclusive benefits</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe">
                        <input type="email" name="email" placeholder="Your Email Address" class="input-subscribe">
                        <button class="subscribe-btn">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 col-md-12 d-flex justify-content-start reunir-content-center">
                        <div class="footer-bottom-left">
                            <p>Copyright © {{ date('Y') }}.All Rights Reserved By <a href="#">{{config('app.name')}} </a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex justify-content-end reunir-content-center">
                        <div class="footer-bottom-right">
                            <ul>
                                <li>
                                    <a href="#">Privacy & Policy</a>
                                </li>
                                <li>
                                    <a href="#">Term Of Service</a>
                                </li>
                                <li>
                                    <a href="#">Affilate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->

@endsection