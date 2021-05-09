<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmiInstallmentRequest;
use App\Models\EmiInstallment;
use App\Models\LoanAccount;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DataTables, Response, Carbon\Carbon;

class EmiInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($account_id=null)
    {
        return view('emi-list',compact('account_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmiInstallmentRequest $request)
    {
        $loanAccount = LoanAccount::with('emi')->where('finance_id','=',$request->finance_id)->get();
        foreach ($loanAccount as $key=>$value) {
            if ($value->emi===null){
                $paidAmount=$value->first_emi_amount;
            }else{
                $paidAmount=$value->emi_amount;
            }
            $penalty_amount=0.00;
            if ($value->account_id===$request->account_id){
                $penalty_amount=$request->has('penalty')?$request->penalty:0;
            }
            $emiInstallment = new EmiInstallment();
            $emiInstallment->account_id = $value->account_id;
            $emiInstallment->installment_date = $request->instalment_date;
            $emiInstallment->paid_date = $request->paid_date;
            $emiInstallment->installment_amount = $paidAmount;
            $emiInstallment->paid_amount = $paidAmount;
            $emiInstallment->penalty_amount = $request->has('penalty')?$request->penalty:0;
            $emiInstallment->remark = $request->remarks;
            $emiInstallment->save();

            $wallet = Wallet::where([['type', $request->finance_type],['status', '1']])
                ->first();
            $wallet->amount = $wallet->amount + ($paidAmount + $penalty_amount);
            $wallet->save();
        }
        return response()->json([
            'status'=>true,
            'message'=>'Emi Installment Add Successfully',
            'data'=>$emiInstallment
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  $account_id
     * @return \Illuminate\Http\Response
     */
    public function show($account_id)
    {
        $data = EmiInstallment::where('account_id','=',$account_id);
        return Datatables::of($data)->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmiInstallment  $emiInstallment
     * @return \Illuminate\Http\Response
     */
    public function edit(EmiInstallment $emiInstallment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmiInstallment  $emiInstallment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmiInstallment $emiInstallment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmiInstallment  $emiInstallment
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmiInstallment $emiInstallment)
    {
        //
    }
}
