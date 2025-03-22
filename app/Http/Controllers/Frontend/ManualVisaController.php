<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManualVisaController extends Controller
{
    public function manualVisa()
    {
        return view('frontend.page.manual-visa');
    }
}