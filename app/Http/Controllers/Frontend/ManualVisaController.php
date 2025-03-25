<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ManualVisa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ManualVisaController extends Controller
{
    public function manualVisa()
    {
        return view('frontend.pages.manual-visa');
    }


    public function downloadManualVisaFromFrontend(Request $request)
        {
            
            
                        // Validation rules
            $validatedData = $request->validate([
                'passport_no' => 'required|min:6|max:15',
                'dob' => 'required|date',
                'nationality' => 'required|string|max:50',
                'captcha' => 'required',
            ], [
                'passport_no.required' => 'Passport number is required.',
                'passport_no.min' => 'Passport number must be at least 6 characters.',
                'passport_no.max' => 'Passport number cannot exceed 15 characters.',

                'dob.required' => 'Date of birth is required.',
                'dob.date' => 'Invalid date format.',

                'nationality.required' => 'Nationality is required.',
                'nationality.string' => 'Nationality must be a valid text.',
                'nationality.max' => 'Nationality cannot exceed 50 characters.',

                'captcha.required' => 'Captcha is required.',
            ]);

            // Captcha validation
            if ($request->captcha !== Session::get('captcha')) {
                return back()->withErrors(['captcha' => 'Enter the correct captcha.']);
            }

            // file path
            $filePath = public_path($manual_visa->pdf_file);
            $newFileName = $manual_visa->file_owner_name . '.pdf';

            // check if the file exists
            if (file_exists($filePath)) {
                return response()->download($filePath, $newFileName);
            } else {
                return back()->withErrors(['file' => 'The file does not exist.']);
            }
        }

}