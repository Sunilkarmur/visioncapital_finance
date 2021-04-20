<?php

namespace App\Http\Controllers;

use App\Models\BusinessDetail;
use App\Models\CurrentBankAccount;
use App\Models\FinanceBankLoanAccount;
use App\Models\FinanceForm;
use App\Models\SavingBankAccount;
use App\Models\OfficeUse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        }elseif ($step==="3"){
            return $this->residenceDetails($request);
        }elseif ($step==="4"){
            return $this->bankingFinanceDetails($request);
        }elseif ($step==="5"){
            return $this->guarantorDetails($request);
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
        $applicationList = FinanceForm::withoutTrashed()->where('finance_type','=',session()->get('finance_type'))->where('status','=','1');
        return DataTables::of($applicationList)->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$finandce_form)
    {
        $finance = FinanceForm::with(['business','businessOne','financeBanking','savingBanking','currentBanking', 'officeUse'])->find($finandce_form);
        if ($finance){
//            dd($finance->officeUse && $finance->officeUse->cibil_score_required_type=='1');
//            dd($finance->officeUse && $finance->officeUse->cibil_score_required_type=='1');
            return view('edit-application-form',compact('finance'));
        }
        return redirect()->back()->with('errors','Invalid finance application number');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function officialUse(Request $request,$finandce_form)
    {
        $finance = FinanceForm::with(['officeUse'])->find($finandce_form);
        if ($finance){
            return view('application-form-official-use',compact('finance'));
        }
        return redirect()->back()->with('errors','Invalid finance application number');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$financeForm,$step)
    {
        if ($step==="0"){
            return $this->referranceDetail($request,$financeForm);
        }elseif ($step==="1"){
            return $this->borrowerDetails($request,$financeForm);
        }elseif ($step==="2"){
            return $this->bussinessDetails($request,$financeForm);
        }elseif ($step==="3"){
            return $this->residenceDetails($request);
        }elseif ($step==="4"){
            return $this->bankingFinanceDetails($request);
        }elseif ($step==="5"){
            return $this->guarantorDetails($request);
        }elseif ($step==="6"){
            return $this->officeUseDetails($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinanceForm  $financeForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$finandce_form)
    {
        $financeForm = FinanceForm::find($finandce_form);
        if ($financeForm){
            $financeForm->deleted_at=Carbon::now()->toDateTime();
            $financeForm->save();
            return response()->json([
                'status'=>true,
                'message'=>'Your Form is Deleted!',
                'data'=>array()
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Something Went Wrong!',
            'data'=>array()
        ],422);
    }

    public function referranceDetail(Request $request,$financeForm=null){
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
        if ($financeForm){
            $financeForm = FinanceForm::find($financeForm);
        }else{
            if ($request->has('id')){
                $financeForm = FinanceForm::find($request->id);
            }else{
                $financeForm = new FinanceForm();
            }
        }
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

    public function borrowerDetails(Request $request,$financeForm=null){
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
            $financeForm->bor_amount = preg_replace("/[^0-9]/", "",$request->bor_amount);
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

    public function bussinessDetails(Request $request,$financeForm=null){

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
            BusinessDetail::where('finance_id','=',$request->id)->delete();
            foreach ($data as $datum) {
                $validator = Validator::make($datum,[
                    'business_name'=>'required',
                    'business_started_date'=>'required',
                    'business_type'=>'required',
                    'promoter_name'=>'required_if:business_type,Partnership',
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

                if ($financeForm===null){
                    $businessDetail = new BusinessDetail();
                }else{
                    $businessDetail = BusinessDetail::where('finance_id','=',$financeForm)->first();
                }
                if ($businessDetail===null){
                    $businessDetail = new BusinessDetail();
                }
                $businessDetail->finance_id = $request->id;
                $businessDetail->business_name = $datum['business_name'];
                $businessDetail->business_started_date = $datum['business_started_date'];
                $businessDetail->business_type = $datum['business_type'];
                $businessDetail->promoter_name = $datum['promoter_name'];
                $businessDetail->business_nature = $datum['business_nature'];
                $businessDetail->business_monthly_income = $datum['business_monthly_income'];
                $businessDetail->total_no_machines = $datum['total_no_machines'];
                $businessDetail->total_no_employees = $datum['total_no_employees'];
                $businessDetail->monthly_turnover = $datum['monthly_turnover'];
                $businessDetail->business_location = $datum['business_location'];
                $businessDetail->business_location_type = $datum['business_location_type'];
                $businessDetail->business_duration_place = $datum['business_duration_place'];
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

    public function residenceDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:finance_forms,id',
            'home_address'=>'required',
            'home_type'=>'required',
            'home_duration_place'=>'required',
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
            $financeForm->home_address = $request->home_address;
            $financeForm->home_type = $request->home_type;
            $financeForm->home_duration_place = $request->home_duration_place;
            $financeForm->save();
            return response()->json(['status'=>true,
                'message'=>'Residence Detail Add Successfully!',
                'data'=>$financeForm],200);
        }


        return response()->json(['status'=>false,
            'message'=>'Something Went Wrong!',
            'data'=>[]],422);
    }

    public function bankingFinanceDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:finance_forms,id',
            'finance_form'=>'required',
            'saving_bank'=>'required',
            'current_bank'=>'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors()->first(),
                'data'=>$validator->errors()->messages()
            ],422);
        }

        try {
            // Finance Form
            $financeBank = json_decode($request->finance_form,true);
            if ($financeBank!==null && count($financeBank)>0){
                FinanceBankLoanAccount::where('finance_id','=',$request->id)->delete();
                foreach ($financeBank as $value) {
                    $validator = Validator::make($value,[
                        'bank_name'=>'required',
                        'bank_branch'=>'required',
                        'previous_lona_type'=>'required',
                        'loan_amount'=>'required',
                        'emi_amount'=>'required',
                        'bank_balance'=>'required',
                        'duration'=>'required',
                    ]);

                    if ($validator->fails()){
                        return response()->json([
                            'status'=>false,
                            'message'=>$validator->errors()->first(),
                            'data'=>$validator->errors()->messages()
                        ],422);
                    }

                    $financeBankLoanAccount = new FinanceBankLoanAccount();
                    $financeBankLoanAccount->finance_id = $request->id;
                    $financeBankLoanAccount->user_id = Auth::user()->id;
                    $financeBankLoanAccount->bank_name = $value['bank_name'];
                    $financeBankLoanAccount->bank_branch = $value['bank_branch'];
                    $financeBankLoanAccount->previous_lona_type = $value['previous_lona_type'];
                    $financeBankLoanAccount->loan_amount = (float)$value['loan_amount'];
                    $financeBankLoanAccount->emi_amount = (float)$value['emi_amount'];
                    $financeBankLoanAccount->bank_balance = (float)$value['bank_balance'];
                    $financeBankLoanAccount->duration = (integer)$value['duration'];
                    $financeBankLoanAccount->save();
                }
            }

            // Saving Bank Form
            $savingBank = json_decode($request->saving_bank,true);
            if ($savingBank!==null && count($savingBank)>0){
                SavingBankAccount::where('finance_id','=',$request->id)->delete();
                foreach ($savingBank as $value) {
                    $validator = Validator::make($value,[
                        'saving_ac_bank'=>'required',
                        'saving_ac_branch'=>'required',
                    ]);

                    if ($validator->fails()){
                        return response()->json([
                            'status'=>false,
                            'message'=>$validator->errors()->first(),
                            'data'=>$validator->errors()->messages()
                        ],422);
                    }

                    $savingBankAccount = new SavingBankAccount();
                    $savingBankAccount->finance_id = $request->id;
                    $savingBankAccount->user_id = Auth::user()->id;
                    $savingBankAccount->bank_name = $value['saving_ac_bank'];
                    $savingBankAccount->branch_name = $value['saving_ac_branch'];
                    $savingBankAccount->save();
                }
            }

            // Current bank Form
            $currentBank = json_decode($request->current_bank,true);
            if ($currentBank!==null && count($currentBank)>0){
                CurrentBankAccount::where('finance_id','=',$request->id)->delete();
                foreach ($currentBank as $datum) {
                    $validator = Validator::make($datum,[
                        'current_ac_bank'=>'required',
                        'current_ac_branch'=>'required',
                    ]);

                    if ($validator->fails()){
                        return response()->json([
                            'status'=>false,
                            'message'=>$validator->errors()->first(),
                            'data'=>$validator->errors()->messages()
                        ],422);
                    }

                    $currentBankaccount = new CurrentBankAccount();
                    $currentBankaccount->finance_id = $request->id;
                    $currentBankaccount->user_id = Auth::user()->id;
                    $currentBankaccount->bank_name = $datum['current_ac_bank'];
                    $currentBankaccount->branch_name = $datum['current_ac_branch'];
                    $currentBankaccount->save();
                }
            }

            return response()->json(['status'=>true,
                'message'=>'Banking Detail Save Successfully!',
                'data'=>[]],200);
        }catch (\Exception $exception){
            return response()->json(['status'=>false,
                'message'=>$exception->getMessage(),
                'data'=>[]],422);
        }
    }


    public function guarantorDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:finance_forms,id',
            'data'=>'required',
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
            $financeForm->guarantor_detail = $request->data;
            $financeForm->status = '1';
            $financeForm->save();
            return response()->json(['status'=>true,
                'message'=>'Your Form Complete Submit',
                'data'=>$financeForm],200);
        }


        return response()->json(['status'=>false,
            'message'=>'Something Went Wrong!',
            'data'=>[]],422);
    }
    public function officeUseDetails(Request $request){
        try {
            $validator = Validator::make($request->all(),[
                'id'=> 'required|exists:finance_forms,id',
                'remarks'=> 'required',
            ]);

            if ($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>$validator->errors()->first(),
                    'data'=>$validator->errors()->messages()
                ],422);
            }

            $res_final = [];
            $busi_final = [];
            $id_final = [];
            $all_proof = [];
            if ($request->has('resi_proof')){
                foreach($request->resi_proof as $key=>$res)
                {
                    array_push($res_final, $res);
                }
            }
            if ($request->has('business_proof')){
                foreach($request->business_proof as $key=>$res)
                {
                    array_push($busi_final, $res);
                }
            }
            if ($request->has('id_proof')){
                foreach($request->id_proof as $key=>$res)
                {
                    array_push($id_final, $res);
                }
            }

            $all_proof = [
                'resi_proof' => $res_final,
                'busi_proof' => $busi_final,
                'id_proof' => $id_final
            ];
            $office_use =  OfficeUse::where('finance_id', $request->id)->first();
            if(!$office_use)
            {
                $office_use = new OfficeUse();
            }
            $office_use->finance_id = $request->id;
            $office_use->remark = $request->remarks;
            $office_use->cibil_score_required_type = $request->cibil_socre_required_type;
            $office_use->cibil_score = $request->cibil_score;
            $office_use->managment_review_select = $request->managment_review_select;
            $office_use->management_review_text = $request->management_review_text;
            $office_use->visit_select = $request->visit_select;
            $office_use->visit_review_select = $request->visit_review_select;
            $office_use->visit_review_text = $request->visit_review_text;
            $office_use->attend_by = $request->attend_by;
            $office_use->document_select = $request->document_select;
            $office_use->document_review_select = $request->document_review_select;
            $office_use->document_review_text = $request->document_review_text;
            $office_use->client_document_select = $request->client_document_select;
            $office_use->client_documents = json_encode($all_proof);
            $office_use->save();
            return response()->json([
                'status'=> true,
                'message'=> 'Details saved successfully!',
                'data'=> []],
                200);


        } catch (\Exceptions $e) {
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
                'data'=>[]],
                422);
        }
    }

    // Return Finance Details
    public function viewApplicationDetails($finance_id)
    {
        $application = FinanceForm::with(['business','financeBanking','savingBanking','currentBanking', 'officeUse'])->where('id', $finance_id)->first();
        // dd($application);
        if ($application){
            return view('view_application', compact('application'));
        }
        return redirect()->back()->with('errors','Invalid finance application number');   
    }

}
