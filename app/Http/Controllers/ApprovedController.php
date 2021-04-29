<?php

namespace App\Http\Controllers;

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
            $applications = FinanceForm::with('officeUse')
                ->whereHas('officeUse', function ($q) {
                    $q->where('status', 'Approved');
                })
                ->orderBy('id', 'DESC')
                ->get();

            return Datatables::of($applications)
                ->addColumn('status', function ($applications) {
                    return '';
                })
                ->addColumn('action', function ($applications) {
                    $button = '<ul class="table-controls">
                    <li>
                        <a href="'. route('finance.view_approved_application', encrypt($applications->id)) .'" data-toggle="tooltip" data-placement="top" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                    </li>
                    <li>
                        <a href="'. route('finance.form.edit', $applications->id) .'" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" class="warning confirm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                    </li>
                </ul>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);

        }
        return view('approved_application');
    }

    // view approved application details
    public function viewApprovedApplication($id)
    {
        $application = FinanceForm::with('officeUse')->where('id', decrypt($id))->first();
        return view('approved_application_view', compact('application'));
    }

    // store all the details of approved application's process form
    public function storeApprovedApplication(LoanProcessionRequest $request, $id)
    {
        try {
            if(session('finance_type'))
            {
                $wallet = Wallet::where([['type', session('finance_type')],['status', '1']])
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

                $wallet->amount = $wallet->amount - $request->disbursement_amt;
                $wallet->save();
                return response()->json(['status'=>true,'message'=>'Loan Account Generate Successfully!','data'=>$accounnt_loan],200);

            }
            return response()->json(['status'=>false,'message'=>'Session not Exists!','data'=>[]],422);

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
        $totalDays = $currentDate->diffInDays($currentMonthDate);

        $si = ((float)$price * config('constants.loan_pecentage'))/100;
        $daysInterest = $si/30;
        $si = $daysInterest*$totalDays;
        return $si;
    }

    public function calcEmiAmount($price){
        $si = ((float)$price * config('constants.loan_pecentage'))/100;
        return $si;
    }
}

