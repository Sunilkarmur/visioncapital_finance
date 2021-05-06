<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisburseLoanProcessRequest;
use App\Http\Requests\LoanProcessionRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\FinanceForm;
use App\Models\LoanAccount;
use App\Models\Wallet;
use DataTables, Response, Carbon\Carbon;

class ApprovedController extends Controller
{

    // Return application list
    public function approvedApplicationList(Request $request)
    {
        if ($request->ajax()) {
            $applications = FinanceForm::with('officeUse', 'loanAccountDetails')
                ->whereHas('officeUse', function ($q) {
                    $q->where('status', 'Approved');
                })
                ->orderBy('id', 'DESC')
                ->get();

            // dd($applications);

            return Datatables::of($applications)
                ->addColumn('loan_account_id',function ($applications){
                    if ($applications->loanAccountDetails) {
                        return $applications->loanAccountDetails->account_id;
                    }
                    return '-';
                })
                ->addColumn('status', function ($applications) {
                    $status = 'Approved';
                    if ($applications->loanAccountDetails) {
                        $status_data = $applications->loanAccountDetails;
                        $status = [];
                        $status_data->agreement ? array_push($status, $status_data->agreement) : '';
                        $status_data->franking ? array_push($status, $status_data->franking) : '';
                        $status_data->sign ? array_push($status, $status_data->sign) : '';
                        $status_data->notarized_agreement ? array_push($status, $status_data->notarized_agreement) : '';
                        $status = implode(', ', array_values($status));
                    }
                    $status_data = '<div class="n-chk">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                                            <input type="checkbox" class="new-control-input" checked="">
                                            <span class="new-control-indicator"></span>' . $status . '
                                        </label>
                                    </div>';
                    return $status_data;
                })
                ->addColumn('action', function ($applications) {
                    $button = '<ul class="table-controls">
                    <li>
                        <button type="button" class="btn btn-primary" onclick="onAddInstallment('.$applications->id.')" data-toggle="modal" data-target="#addInstallment">Add Installment</button>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onclick="onDistributeAmount('.$applications->id.')" title="Disburse Amount" data-toggle="modal" data-target="#addDisbursement">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="' . route('finance.view_approved_application', encrypt($applications->id)) . '" data-toggle="tooltip" data-placement="top" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                    </li>
                    <li>
                        <a href="' . route('finance.form.edit', $applications->id) . '" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" class="warning confirm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                    </li>
                </ul>';
                    return $button;
                })
                ->rawColumns(['action', 'status','loan_account_id'])
                ->addIndexColumn()
                ->make(true);

        }
        return view('approved_application');
    }

    // view approved application details
    public function viewApprovedApplication($id)
    {
        $application = FinanceForm::with(['officeUse','loanAccounts'])->where('id', decrypt($id))->first();
//        dd($application->loanAccounts);
        return view('approved_application_view', compact('application'));
    }

    // store all the details of approved application's process form
    public function storeApprovedApplication(LoanProcessionRequest $request, $id)
    {
        try {
            $wallet = Wallet::where([['type', $request->finance_type],['status', '1']])
                ->first();

            $first_month_interest = $this->firstMonthCalculateInterest($request->disbursement_amt);

            $accounnt_loan = new LoanAccount();
            $accounnt_loan->account_id = $this->generateLoanAccountNumber() ;
            $accounnt_loan->finance_id = $request->finance_id;
            $accounnt_loan->is_processing_fees = $request->processing_fees_select;
            $accounnt_loan->agreement = $request->agreement;
            $accounnt_loan->franking = $request->franking;
            $accounnt_loan->sign = $request->sign;
            $accounnt_loan->notarized_agreement = $request->notarized_agreement;
            $accounnt_loan->disbursement = $request->disbusrsement;
            $accounnt_loan->processing_fees = $request->processing_fees;
            $accounnt_loan->signature = $request->signature_type;
            $accounnt_loan->notarized_status = $request->notarised_select;
            $accounnt_loan->disbursement_status = $request->disbursement_select;
            $accounnt_loan->disbursement_amount = $request->disbursement_amt;
            $accounnt_loan->processing_date = Carbon::now();
            $accounnt_loan->loan_pecentage = config('constants.loan_pecentage');
            $accounnt_loan->first_emi_amount = $first_month_interest;
            $accounnt_loan->emi_amount = $this->calcEmiAmount($request->disbursement_amt);
            $accounnt_loan->save();

            $financeForm = FinanceForm::find($request->finance_id);
            $financeForm->remaing_disbursement_amount = (float)$request->disbursement_amt - (float)$financeForm->bor_amount;
            $financeForm->save();

            $wallet->amount = $wallet->amount - $request->disbursement_amt;
            $wallet->save();
            return response()->json(['status'=>true,'message'=>'Loan Account Generate Successfully!','data'=>$accounnt_loan],200);

        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage(),'data'=>[]],422);
        }
    }

    public function generateLoanAccountNumber(){
        $number = 'VCF'.mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if (LoanAccount::where('account_id','=',$number)->exists()) {
            return $this->generateLoanAccountNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    public function firstMonthCalculateInterest($price){

        $currentDate = Carbon::now();
        $currentMonthDate = Carbon::parse($currentDate->year.'-'.$currentDate->month.'-12');
        if ($currentDate->format('Y-m-d')>=$currentMonthDate->format('Y-m-d')){
            $currentMonthDate = Carbon::parse(Carbon::now()->addMonth(1)->year.'-'.Carbon::now()->addMonth(1)->month.'-12')->format('Y-m-d');
        }
//        $to = Carbon::createFromFormat('Y-m-d H:s:i', $currentDate->format('Y-m-d'));
//        $from = Carbon::createFromFormat('Y-m-d H:s:i', $currentMonthDate->format('Y-m-d'));

//        $diff_in_days = $to->diffInDays($from);

//        $datetime1 = $currentDate->format('Y-m-d H:s:i');
//        $datetime2 = $currentMonthDate->format('Y-m-d H:s:i');
//        $totalDays = $datetime1->diff($datetime2);
        $totalDays = $currentDate->diffInDays($currentMonthDate);

        $fdate = $currentDate->format('Y-m-d');
        $tdate = $currentMonthDate->format('Y-m-d');
        $datetime1 = strtotime($fdate); // convert to timestamps
        $datetime2 = strtotime($tdate); // convert to timestamps
        $days = (int)(($datetime2 - $datetime1)/86400); // will give the difference in days , 86400 is the timestamp difference of a day
        $totalDays=$days+1;
        $si = ((float)$price * config('constants.loan_pecentage'))/100;
        $daysInterest = $si/30;
        $si = $daysInterest*$totalDays;
        return $si;
    }

    public function calcEmiAmount($price){
        $si = ((float)$price * config('constants.loan_pecentage'))/100;
        return $si;
    }

    public function distributeAmountSubmit(DisburseLoanProcessRequest $request){
        try {
            $wallet = Wallet::where([['type', $request->finance_type],['status', '1']])
                ->first();

            $first_month_interest = $this->firstMonthCalculateInterest($request->disbursement_amt);

            $financeForm = LoanAccount::where('finance_id','=',$request->finance_id)->first();
            if ($financeForm===null){
                return response()->json(['status'=>false,'message'=>'First Create Your Loan then after disburse amount','data'=>[]],422);
            }
            $accounnt_loan = new LoanAccount();
            $accounnt_loan->account_id = $this->generateLoanAccountNumber() ;
            $accounnt_loan->finance_id = $request->finance_id;
            $accounnt_loan->is_processing_fees = $financeForm->is_processing_fees;
            $accounnt_loan->agreement = $financeForm->agreement;
            $accounnt_loan->franking = $financeForm->franking;
            $accounnt_loan->sign = $financeForm->sign;
            $accounnt_loan->notarized_agreement = $financeForm->notarized_agreement;
            $accounnt_loan->disbursement = $financeForm->disbusrsement;
            $accounnt_loan->processing_fees = $financeForm->processing_fees;
            $accounnt_loan->signature = $financeForm->signature_type;
            $accounnt_loan->notarized_status = $financeForm->notarized_status;
            $accounnt_loan->disbursement_status = $financeForm->disbursement_status;
            $accounnt_loan->disbursement_amount = $request->disbursement_amt;
            $accounnt_loan->processing_date = Carbon::now();
            $accounnt_loan->loan_pecentage = config('constants.loan_pecentage');
            $accounnt_loan->first_emi_amount = $first_month_interest;
            $accounnt_loan->emi_amount = $this->calcEmiAmount($request->disbursement_amt);
            $accounnt_loan->save();

            $financeForm = FinanceForm::find($request->finance_id);
            $financeForm->remaing_disbursement_amount = (float)$request->disbursement_amt - (float)$financeForm->bor_amount;
            $financeForm->save();

            $wallet->amount = $wallet->amount - $request->disbursement_amt;
            $wallet->save();
            return response()->json(['status'=>true,'message'=>'Loan Account Generate Successfully!','data'=>$accounnt_loan],200);

        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage(),'data'=>[]],422);
        }
    }

    public function getLoanAccountList(Request $request){
        $this->validate($request,[
            'finance_id'=>'required|exists:finance_forms,id'
        ]);
        $loanAccount = LoanAccount::where('finance_id','=',$request->finance_id)->pluck('account_id');
        if (count($loanAccount)>0){
            return response()->json([
                'status'=>true,
                'message'=>'Loan Account List',
                'data'=>$loanAccount
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Loan Account Not List',
            'data'=>array()
        ],422);
    }

    public function getLoanAccountDetail(Request $request){
        $this->validate($request,[
            'account_id'=>'required|exists:loan_accounts,account_id'
        ]);
        $loanAccount = LoanAccount::with('emi')->where('account_id','=',$request->account_id)->first();
        if ($loanAccount){
            if ($loanAccount->emi===null){
                $loanAccount->emi_amount=$loanAccount->first_emi_amount;
            }
            return response()->json([
                'status'=>true,
                'message'=>'Loan Account List',
                'data'=>$loanAccount
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Loan Account Not List',
            'data'=>array()
        ],422);
    }
}
