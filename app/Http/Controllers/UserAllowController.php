<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Settings;
use App\Userallow;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserallowController extends Controller
{
      public function index()
    {
        //
         $settings = Settings::first();

        return view('comingsoon/login',compact('settings'));
   }

  

}
