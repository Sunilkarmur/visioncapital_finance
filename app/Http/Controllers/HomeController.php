<?php

namespace App\Http\Controllers;

use App\Models\FinanceForm;
use App\Models\Wallet;
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
        $data=array();
        $data['total_cash']=Wallet::where('type','=','cash')->sum('amount');
        $data['total_bank']=Wallet::where('type','=','bank')->sum('amount');
        $applications = FinanceForm::with('officeUse', 'loanAccountDetails')
            ->whereHas('officeUse', function ($q) {
                $q->where('status', 'Approved');
            })
            ->orderBy('id', 'DESC')
            ->get();
        $data['finance_static']=array(
            'cash'=>5000,
            'bank'=>1450,
            'total'=>6450
        );
        $data['balance_static']=array(
            'cash'=>Wallet::where('type','=','cash')->sum('amount'),
            'bank'=>Wallet::where('type','=','bank')->sum('amount'),
            'total'=>Wallet::sum('amount')
        );
        $data['disbursement_static']=array(
            'cash'=>5000,
            'bank'=>1450,
            'total'=>6450
        );
        $data['cash_client']='4500K';
        $data['bank_client']='4500K';
        $data['total_client']='4500K';


        return view('home',compact('data'));
    }

    public function updateFinanceType(Request $request){
        $this->validate($request,[
           'finance_type' =>'required'
        ]);
        session(['finance_type' => $request->finance_type]);

        return response()->json(['status'=>true,'message'=>'Update Your Session'],200);
    }
}
