<?php

namespace App\Http\Controllers;

use App\Models\LoanAccount;
use Illuminate\Http\Request;

class TrackApplicationController extends Controller
{
    //
    public function index(){
        return view('track-application');
    }
    public function trackApproveApplication(Request $request){
        $this->validate($request,[
            'application_number'=>'required|exists:loan_accounts,account_id'
        ]);
        $loanApplication = LoanAccount::where('account_id','=',$request->application_number)->first();
//        dd($loanApplication->is_processing_fees==='1');
        return view('track-approve-application',compact('loanApplication'));
    }
}
