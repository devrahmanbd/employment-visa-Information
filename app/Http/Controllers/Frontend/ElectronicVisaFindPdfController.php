<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElectronicVisaFindPdfController extends Controller
{
    public function evisa(){
        return view('frontend.pages.electronic-visa-find');
    }
}