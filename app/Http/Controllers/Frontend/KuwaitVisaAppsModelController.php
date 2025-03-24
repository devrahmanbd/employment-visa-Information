<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KuwaitVisaAppsModelController extends Controller
{
    public function index()
    {
        return view('frontend.pages.kuwait-evisa-verification');
    }

    public function verificationScan()
    {
        return view('frontend.pages.visa-verification-scan');
    }

    public function visaInquiries(){
        return view('frontend.pages.evisa_inquiry_form');
    }

    public function visaDetails(Request $request){
        
        $evisaApps = Visa::where('visa_number', $request->visa_number)
        ->where('moi_reference', $request->mio_reference)
        ->where('passport_no', $request->passport_number)
        ->first();

        
        return view('frontend.pages.evisa_web_app_details', compact('evisaApps'));
    }
}