<?php

namespace App\Http\Controllers;

use App\Faq;
use App\ThriftLog;
use App\User;
use App\Thrift;
use App\Thrift_member;
use App\Thrift_payment;
use App\Thrift_withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminthriftController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('admin');

    }



    public function index()
    {
        //

        $thrift = Thrift::all();


        return view('admin.thrift.index', compact('thrift'));


    }
    
     public function members()
    {
        //

        $thrift = Thrift::all();


        return view('admin.thrift.members', compact('thrift'));


    }
    
    
     public function thriftget($id)
    {
        
        
        $logs = Thrift_member::whereThrift_id($id)->latest()->paginate(20);


        return view('admin.thrift.thriftlog', compact('logs'));


    }
      public function withdraw()
    {
        
        
        $withdraw = Thrift_withdrawal::all();


        return view('admin.thrift.thriftwithdraw', compact('withdraw'));


    }
    
    public function edit($id)
    {
        //

        $thrift = Thrift::find($id);


        return view('admin.thrift.edit', compact('thrift'));


    }
    public function store(Request $request)
    {
        //


        $this->validate($request, [

            'name'=> 'required',
            'amount' => 'required',
            'members' => 'required',
            'cycle' => 'required',
            'cname' => 'required',

        ]);


        $faq = Thrift::create([

            'name' => $request->name,
            'amount' => $request->amount,
            'numbers' => $request->members,
            'cycle' => $request->cycle,
            'cyclename' => $request->cname,

        ]);


        session()->flash('message', 'New Contribution Group Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');


        return redirect()->route('adminthrift');


    }

    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
			'name'=> 'required',
            'amount' => 'required',
            'members' => 'required',
            'cycle' => 'required',
            'cname' => 'required',

        ]);

        $thrift = Thrift::find($id);
        $thrift->name = $request->name;
        $thrift->amount = $request->amount;
        $thrift->numbers = $request->members;
        $thrift->cycle = $request->cycle;
        $thrift->cyclename = $request->cname;

      
        $thrift->save();



        session()->flash('message', 'F.A.Q Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');


        return redirect()->route('adminthrift');


    }
    public function destroy($id)
    {
        //

        $thrift = Thrift::find($id);

        $thrift->delete();

        session()->flash('message', 'Contribution Plan Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


        return redirect()->route('adminthrift');


    }
    
     public function close($id)
    {
        //

        $thrift = Thrift::find($id);
 		$thrift->status = 0;
        $thrift->save();
        
        session()->flash('message', 'Contribution Plan Has Been Successfully Closed.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


        return redirect()->route('adminthrift');


    } 
    
    public function open($id)
    {
        //

        $thrift = Thrift::find($id);
 		$thrift->status = 1;
        $thrift->save();
        
        session()->flash('message', 'Contribution Plan Has Been Successfully Opened.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


        return redirect()->route('adminthrift');


    }
    
      public function approve($id)
    {
        //

        $thrift = Thrift_withdrawal::find($id);
 		$thrift->status = 1;
        $thrift->save();
        
        session()->flash('message', 'Withdrawal Has Been Approved.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


        return redirect()->route('adminthrift.withdrawal');


    }     
    
    public function reject($id)
    {
        //

        $thrift = Thrift_withdrawal::find($id);
 		$thrift->status = 2;
        $thrift->save();
        
        session()->flash('message', 'Withdrawal Has Been Rejected');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');


        return redirect()->route('adminthrift.withdrawal');


    } 
}
