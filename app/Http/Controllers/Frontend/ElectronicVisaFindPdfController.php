<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElectronicVisaFindPdfController extends Controller
{

    public function evisa(){
        //  if ($request->captcha !== Session::get('captcha')) {
        //     return back()->withErrors(['captcha' => 'Invalid captcha, please try again.']);
        // }
        return view('frontend.pages.electronic-visa-find');
    }
   
}