<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ManualVisa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManualVisaController extends Controller
{
    public function manualVisa()
    {
        return view('frontend.pages.manual-visa');
    }


    public function downloadManualVisaFromFrontend(Request $request)
        {
            
            
         $messages = [
        'passport_no.required' => 'Please enter your passport number.',
        'dob.required' => 'Please enter your date of birth.',
        'nationality.required' => 'Please select your nationality.',
        ];

        $validator = Validator::make($request->all(), [
            'passport_no' => 'required',
            'dob' => 'required|date',
            'nationality' => 'required',
        ], $messages);

        if ($validator->fails()) {
            foreach (['passport_no', 'dob', 'nationality'] as $field) {
                if ($validator->errors()->has($field)) {
                    return back()->withErrors([$field => $validator->errors()->first($field)]);
                }
            }
        }

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