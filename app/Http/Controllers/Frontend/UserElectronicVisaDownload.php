<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;
use App\Models\Visa;
use Session;

class UserElectronicVisaDownload extends Controller
{
    public function userElectronicVisaDownload()
    {
        return view('frontend.pages.evisa-find-download_user_form');
    }

    public function frontendEvisaDownload(Request $request)
    {


           // validation
            $visa = Visa::where('passport_no', $request->passport_no)
                ->where('dob', $request->dob)
                ->where('nationality_en', $request->nationality)
                ->first();


        //    if no manual visa found with the provided details
            if (!$visa) {
                return back()->withErrors(['passport_no' => 'No visa found with the provided details.']);
            }

            // captcha validation
            if ($request->captcha !== Session::get('captcha')) {
                return back()->withErrors(['captcha' => 'Invalid captcha, please try again.']);
            }

             $logoPath = public_path('images/visa-barcode-logo.png');
            if (!file_exists($logoPath)) {
                abort(404, 'Logo file not found!');
            }

        
        $qrCode = base64_encode(
            QrCode::format('png')
                ->size(150)
                ->color(53, 96, 156)
                ->backgroundColor(255, 255, 255)
                ->merge($logoPath, 0.3, true)
                ->generate($visa->barcode)
        );

    
        $html = View::make('backend.pages.visa.show', compact('visa', 'qrCode'))->render();

        Browsershot::html($html)
        ->showBackground()
        ->noSandbox()
        ->format('A4')
        ->setOption('args', [
            '--disable-gpu', 
            '--no-sandbox', 
            '--disable-dev-shm-usage',
            '--font-render-hinting=none'  // Can help with font rendering
        ])
        ->margins(10, 50, 10, 10) // Top, Right, Bottom, Left
        ->setOption('userAgent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36')
        ->save(public_path('pdfs/visa.pdf'));

    
        return response()->download(public_path('pdfs/visa.pdf'))->deleteFileAfterSend(true);
    }
}