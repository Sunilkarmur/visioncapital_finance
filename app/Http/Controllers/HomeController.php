<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateFinanceType(Request $request){
        $this->validate($request,[
           'finance_type' =>'required'
        ]);
        session(['finance_type' => $request->finance_type]);

        return response()->json(['status'=>true,'message'=>'Update Your Session'],200);
    }

    public function financeForm(){
        return view('finance-form');
    }
}
