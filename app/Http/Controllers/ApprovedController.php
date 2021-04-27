<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinanceForm;
use DataTables, Response;

class ApprovedController extends Controller
{

    // Return application list
    public function approvedApplicationList(Request $request)
    {
        if($request->ajax())
        {
            $applications = FinanceForm::with('officeUse')
                                ->whereHas('officeUse', function($q){
                                    $q->where('status','Approved');
                                })
                                ->orderBy('id', 'DESC')
                                ->get();
                                return Datatables::of($applications)
                                ->addIndexColumn()
                                ->make(true);
                                
        }   
        return view('approved_application');
    }

}
