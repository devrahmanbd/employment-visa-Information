<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}