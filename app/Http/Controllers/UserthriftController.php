<?php

namespace App\Http\Controllers;

use App\ThriftLog;
use App\User;
use App\Thrift;
use App\Thrift_member;
use App\Thrift_payment;
use App\Thrift_withdrawal;
use App\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class UserthriftController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');


    }

    public function index(){
        
        $user = Auth::user();
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);
        $invests = Thrift::get();

        return view('user.thrift.index',compact('invests','rewards'));
    }
    public function thriftHistory(){
        
        $user = Auth::user();
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);
        $user = Auth::user();
        $logs = Thrift_member::whereUser_id($user->id)->latest()->paginate(20);

        return view('user.thrift.log',compact('logs','rewards'));
    } 
    
    public function withdrawal2(){
        
        $user = Auth::user();
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);
        $user = Auth::user();
        $logs = Thrift_withdrawal::whereUser_id($user->id)->latest()->paginate(20);

        return view('user.thrift.withdrawlog',compact('logs','rewards'));
    }
    public function leaderboardHistory(Request $request, $id){
        
        $user = Auth::user();
        $name = $user->username;
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);
        $logs = Thrift_member::whereThrift_id($id)->paginate(20); 
        $thrift=Thrift::find($id);
       
        
        return view('user.thrift.leaderboard',compact('thrift' ,'user','name','logs','rewards'));
    }
    
     public function withdraw()
    {

        $gateways = Offline::all();
        $plan = Thrift_member::whereThrift_id($id)->paginate(20);
        $user = Auth::user();
        $settings = Settings::first();
        
        $user = Auth::user();
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);

        return view('user.thrift.withdraw',compact('plan','user','settings','rewards'));

    }
    
    
     public function post(Request $request)
    {
        $this->validate($request, [
            'bank'=> 'required',
            'amount' => 'required|numeric',
        ]);

        $user = Auth::user();

        $settings = Settings::first();

        if ($settings->minimum_withdraw > $request->amount){

            session()->flash('message', 'You need at least  $ '.$settings->minimum_withdraw.' to withdraw money. Please earn some money first. ');
            Session::flash('type', 'error');
            Session::flash('title', 'Minimum Withdraw');

            return redirect(route('userWithdraw.create'));


        }
      

        else {

            $withdraw= Thrift_withdrawal::create([

                'transaction_id' => str_random(6).$user->id.str_random(6),
                'user_id'=> $user->id,
                'bank'=> $request->bank,
                'amount'=> $request->amount,
                'thrift_id'=> $request->code,
                'status'=> 0,
               
            ]);

            DB::table('thrift_members')->where('reference_id', $request->code)->update(['payment_date' => 0]);
       
            session()->flash('message', 'Your contribution Withdrawal of '.$settings->currency.''.$request->amount.' Has Been Sent. You will be credited once we verify your request');
            Session::flash('type', 'success');
            Session::flash('title', 'Withdraw Requested');

            return redirect(route('userthrift.history'));

        }

       }


   public function payHistory(Request $request, $id){
        
        $user = Auth::user();
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);
        $member= Thrift_member::whereReference_id($id)->first();
        $settings = Settings::first();
        $penalty =$settings->thrift_penalty /100 * $member->amount;
       
       
        $time = $member->next_payment;
        $today = date("Y-m-d");
        $logs = Thrift_payment::whereReference_id($id)->paginate(20);
        $paid = Thrift_payment::whereReference_id($id)->select('amount')->sum('amount');;
        $paid2 = Thrift_payment::whereReference_id($id)->select('amount')->count('amount');;
       
               return view('user.thrift.paymentlog',compact('penalty','time','paid2','paid','today', 'logs','rewards'));
    }



    public function submit(Request $request){

        $this->validate($request, [

            'amount'=> 'required||numeric',
            'id' => 'required|numeric',

        ]);
        $user = Auth::user();
        $settings = Settings::first();

        $plan = Thrift::find($request->id);
        $members = Thrift_member::find($request->id);
        
        $member = Thrift_member::whereThrift_id($request->id)->latest()->paginate(20);
        $name = $request->name;
        $price = $plan->amount;
        $number = $plan->numbers;
        $cycle = $plan->cycle;
        $cyclename = $plan->cyclename;
        $topay = $price * $number;
        $penalty =$settings->thrift_penalty /100 * $plan->amount;
        
        $amount = $request->amount;

       if ($amount > $user->profile->deposit_balance ){

            session()->flash('message', "You cant join ".$request->name." as your current balance of ".$settings->currency." ".$user->profile->deposit_balance." Is not enough. You need ".$settings->currency." ".$topay." to join this plan. Please deposit money first or try transfer your all money to deposit balance using fund transfer.");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Funds');

            return redirect()->route('userthrift');

        }
        else{
            $user = Auth::user();
			$time = date('M j, Y  H:i:s', strtotime($user->bonus));
			$rewards = json_encode($time);
            $invest = (object) array(
                "cycle"=>$cycle,
                "cyclename"=>$cyclename,
                "amount"=>$amount,
                "name"=>$name,
                "total"=>$topay,
                "penalty"=>$penalty,
                "numbers"=>$number,
                "time"=>$request->time,
                "id" => $request->id,
            );
            
            $count = (object) array(

            "total"=>Thrift_member::all()->count(),
           ); 


            return view('user.thrift.preview',compact('count','invest','rewards'));



        }



    }
    
    public function contribute(Request $request){

        
        $user = Auth::user();
        $settings = Settings::first();
		$thrift = Thrift_payment::whereReference_id($request->id);
		$amount = $request->amount;
        $penalty =$settings->thrift_penalty /100 * $amount;
        
        
       if ($amount > $user->profile->deposit_balance ){

            session()->flash('message', "You cant make contribution as your wallet balance is below your contribution plan. Please proceed to deposit in wallet and come back here to contribute as your current balance of ".$settings->currency." ".$user->profile->deposit_balance." Is not enough. You need ".$settings->currency." ".$amount.".");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Funds');

            return redirect()->route('userthrift.contribute');

        }
        else{
        
        $noofdays= $request->cycle; //assigning website address
		$cur=date("Y-m-d");
		$next=date('Y-m-d', strtotime($cur. '+ '.$noofdays.'days'));
														
        $pay = new Thrift_payment();
        $pay->user_id = $user->id;
        $pay->reference_id = $request->id;
        $pay->amount = $request->amount;
        $pay->number = $request->number;
        $pay->cycle = $request->cycle;
        
        $pay->save();
        
        $time= Thrift_member::whereReference_id($request->id)->first();
        $time->next_payment = $next;
        $time->save();
        
        $user->profile->contribution_balance = $user->profile->contribution_balance + $request->amount;
        $user->profile->save();

        
        session()->flash('message', "You have succesfuly contributed ".$settings->currency." ".$request->amount." today.");
          
        
        return redirect()->back();
    }


    }

   		public function confirm(Request $request){

        $this->validate($request, [


        ]);

        $plan = Thrift::find($request->id);

        $user = Auth::user();
        
        $names = $request->name;
        $user->profile->deposit_balance = $user->profile->deposit_balance - $request->amount;

        $user->profile->save();

        $delay = $request->number;

        $today = Carbon::now();
        


        $investment = new Thrift_member();
        $investment->user_id = $user->id;
        $investment->thrift_name = $request->name;
        $investment->thrift_id = $request->id;
        $investment->name = $user->username;
        $investment->image = $user->profile->avatar;
        $investment->reference_id = $request->code;
        $investment->amount = $request->amount;
        $investment->number = $request->number;
        $investment->payment_date = $request->pay ;
        $investment->next_payment = $request->date ;
        $investment->status = 0;

        $investment->save();

        $pay = new Thrift_payment();
        $pay->user_id = $user->id;
        $pay->reference_id = $request->code;
        $pay->amount = $request->amount;
        $pay->cycle = $request->cycle;
        $pay->number = $request->allowed;
        $pay->save();
        
        $thrift=Thrift::find($request->id);
        $thrift->members = $thrift->members + 1;
        $thrift->save();


          
        $user->profile->contribution_balance = $user->profile->contribution_balance + $request->amount;
        $user->profile->save();

        
        

        
        session()->flash('message', 'You Have Successfully joined '.$request->name.' contribution plan. Please wait while other members join to complete the cycle and start a new.');
        Session::flash('type', 'success');
        Session::flash('title', 'Invest Successful');

        return redirect()->route('userthrift.history');
    }

}

 