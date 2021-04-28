<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackApplicationController extends Controller
{
    //
    public function index(){
        return view('track-application');
    }
    public function trackApproveApplication(){
        return view('track-approve-application');
    }
}
