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
            
            // validation
            $manual_visa = ManualVisa::where('passport_no', $request->passport_no)
                ->where('dob', $request->dob)
                ->where('nationality_en', $request->nationality)
                ->first();

        //    if no manual visa found with the provided details
            if (!$manual_visa) {
                return back()->withErrors(['passport_no' => 'No Manual visa found with the provided details.']);
            }

            // captcha validation
            if ($request->captcha !== Session::get('captcha')) {
                return back()->withErrors(['captcha' => 'Invalid captcha, please try again.']);
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