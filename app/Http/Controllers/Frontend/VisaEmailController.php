<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisaEmailController extends Controller
{
    public function index()
    {
        return view('frontend.pages.visa-email');
    }
}
