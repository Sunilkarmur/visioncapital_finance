<?php

namespace App\Http\Controllers;

use App\Models\BusinessDetail;
use App\Models\FinanceForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class FinanceFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('application');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance-form');
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
        }elseif ($step==="1"){
            return $this->borrowerDetails($request);
        }elseif ($step==="2"){
            return $this->bussinessDetails($request);
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
        $applicationList = FinanceForm::where('finance_type','=',session()->get('finance_type'));
        return DataTables::of($applicationList)->make(true);
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
        $financeForm->finance_type = session()->get('finance_type');
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

    public function borrowerDetails(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:finance_forms,id',
            'bor_name'=>'required',
            'bor_amount'=>'required',
            'bor_time_limit'=>'required',
            'bor_purpose'=>'required',
            'bor_affiliate_vc'=>'required',
            'bor_affiliate_type'=>'required_if:bor_affiliate_vc,Yes',
            'bor_affiliate_type_other'=>'required_if:bor_affiliate_type,Other',
            'bor_pan_no'=>'required',
            'bor_aadhar_no'=>'required',
            'bor_pin_code'=>'required',
            'bor_dob'=>'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors()->first(),
                'data'=>$validator->errors()->messages()
            ],422);
        }

        $financeForm = FinanceForm::find($request->id);
        if ($financeForm){
            $financeForm->bor_name = $request->bor_name;
            $financeForm->bor_amount = $request->bor_amount;
            $financeForm->bor_time_limit = $request->bor_time_limit;
            $financeForm->bor_purpose = $request->bor_purpose;
            $financeForm->bor_affiliate_vc = $request->bor_affiliate_vc;
            $financeForm->bor_affiliate_type = $request->bor_affiliate_type;
            $financeForm->bor_affiliate_type_other = $request->bor_affiliate_type_other;
            $financeForm->bor_pan_no = $request->bor_pan_no;
            $financeForm->bor_aadhar_no = $request->bor_aadhar_no;
            $financeForm->bor_pin_code = $request->bor_pin_code;
            $financeForm->bor_dob = $request->bor_dob;
            if ($financeForm->save()){
                return response()->json(['status'=>true,
                    'message'=>'Finance Borrower Detail Add Successfully!',
                    'data'=>$financeForm],200);
            }
        }

        return response()->json(['status'=>false,
            'message'=>'Something Went Wrong!',
            'data'=>[]],422);
    }

    public function bussinessDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:finance_forms,id',
            'data'=>'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors()->first(),
                'data'=>$validator->errors()->messages()
            ],422);
        }

        $data = json_decode($request->data,true);
        if ($data){
            foreach ($data as $datum) {
                $validator = Validator::make($datum,[
                    'business_name'=>'required',
                    'business_started_date'=>'required',
                    'business_type'=>'required',
                    'promoter_name'=>'required',
                    'business_nature'=>'required',
                    'business_monthly_income'=>'required_if:bor_affiliate_vc,Yes',
                    'total_no_machines'=>'required_if:bor_affiliate_type,Other',
                    'total_no_employees'=>'required',
                    'monthly_turnover'=>'required',
                    'business_location'=>'required',
                    'business_location_type'=>'required',
                    'business_duration_place'=>'required',
                ]);

                if ($validator->fails()){
                    return response()->json([
                        'status'=>false,
                        'message'=>$validator->errors()->first(),
                        'data'=>$validator->errors()->messages()
                    ],422);
                }

                $businessDetail = new BusinessDetail();
                $businessDetail->finance_id = $request->id;
                $businessDetail->business_name = $datum->business_name;
                $businessDetail->business_started_date = $datum->business_started_date;
                $businessDetail->business_type = $datum->business_type;
                $businessDetail->promoter_name = $datum->promoter_name;
                $businessDetail->business_nature = $datum->business_nature;
                $businessDetail->business_monthly_income = $datum->business_monthly_income;
                $businessDetail->total_no_machines = $datum->total_no_machines;
                $businessDetail->total_no_employees = $datum->total_no_employees;
                $businessDetail->monthly_turnover = $datum->monthly_turnover;
                $businessDetail->business_location = $datum->business_location;
                $businessDetail->business_location_type = $datum->business_location_type;
                $businessDetail->business_duration_place = $datum->business_duration_place;
                $businessDetail->save();
            }
            return response()->json(['status'=>true,
                'message'=>'Bussiness Detail Add Successfully!',
                'data'=>[]],200);
        }

        return response()->json(['status'=>false,
            'message'=>'Something Went Wrong!',
            'data'=>[]],422);
    }
}
