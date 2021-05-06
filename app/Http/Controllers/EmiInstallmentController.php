<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmiInstallmentRequest;
use App\Models\EmiInstallment;
use App\Models\Wallet;
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
        $emiInstallment = new EmiInstallment();
        $emiInstallment->account_id = $request->account_id;
        $emiInstallment->installment_date = $request->instalment_date;
        $emiInstallment->paid_date = $request->paid_date;
        $emiInstallment->installment_amount = $request->instalment_amount;
        $emiInstallment->paid_amount = $request->paid_amount;
        $emiInstallment->penalty_amount = $request->penalty;
        $emiInstallment->remark = $request->remarks;
        $emiInstallment->save();

        $wallet = Wallet::where([['type', $request->finance_type],['status', '1']])
            ->first();
        $wallet->amount = $wallet->amount + ($request->paid_amount + $request->penalty);
        $wallet->save();
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
