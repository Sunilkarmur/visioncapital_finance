<?php

namespace App\Http\Controllers;

use App\Models\FinanceForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinanceFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('finance-form');
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
     * @param  \Illuminate\Http\Request  $step
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$step)
    {
        if ($step==="0"){
           return $this->referranceDetail($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinanceForm  $financeForm
     * @return \Illuminate\Http\Response
     */
    public function show(FinanceForm $financeForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinanceForm  $financeForm
     * @return \Illuminate\Http\Response
     */
    public function edit(FinanceForm $financeForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinanceForm  $financeForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinanceForm $financeForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinanceForm  $financeForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinanceForm $financeForm)
    {
        //
    }

    public function referranceDetail(Request $request){

        $validator = Validator::make($request->all(),[
            'ref_name'=>'required',
            'ref_firm'=>'required',
            'ref_contact'=>'required',
            'ref_affiliate_vc'=>'required',
            'ref_affiliate_type'=>'required_if:ref_affiliate_vc,Yes',
            'ref_affiliate_type_other'=>'required_if:ref_affiliate_type,Other'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors()->first(),
                'data'=>$validator->errors()->messages()
                ],422);
        }

        $financeForm = new FinanceForm();
        $financeForm->ref_name = $request->ref_name;
        $financeForm->ref_firm = $request->ref_firm;
        $financeForm->ref_contact = $request->ref_contact;
        $financeForm->ref_affiliate_vc = $request->ref_affiliate_vc;
        if ($request->ref_affiliate_vc==='Yes'){
            $financeForm->ref_affiliate_type = $request->ref_affiliate_type;
            if ($request->ref_affiliate_type==='Other'){
                $financeForm->ref_affiliate_type_other = $request->ref_affiliate_type_other;
            }
        }
        if ($financeForm->save()){
            return response()->json(['status'=>true,
                'message'=>'Finance Referral Detail Add Successfully!',
                'data'=>$financeForm],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Something Went Wrong!',
            'data'=>null
        ],422);
    }
}
