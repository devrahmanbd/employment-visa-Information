@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            a.text-decoration-none {
                padding-bottom: 28px;
            }
        </style>
    @endpush
    <div class="timeline">
        <h2 class="fw-bold"><ins>eVisa (Electronic Visa) checking rules</ins>:</h2>

        <p class="">
            First, click on the place where the <span class="fst-italic" style="color:#0066cc">Kuwait Police</span> logo is
            attached at the bottom of this page, <span class="fst-italic" style="color:#0066cc"> Download or print
                the Employment Visa </span>, clicking here will automatically open a page, on that page there will be
            options written as
            <span class="fst-italic" style="color:#0066cc">Manual Visa</span> and <span class="fst-italic"
                style="color:#0066cc">eVisa (Electronic Visa)
            </span>. Since you want to download an <span class="fst-italic" style="color:#0066cc">eVisa/Electronic
                Visa</span>, click on the <span class="fst-italic" style="color:#0066cc">eVisa
                (Electronic Visa) option</span>. Clicking here automatically opens a new page where the <span
                class="fst-italic" style="color:#0066cc">Electronic Visa Inquiry</span> is
            written. If you fill in all the correct information required of the Visa holder below that text, enter the
            <span class="fst-italic" style="color:#0066cc">Captcha</span> displayed on the screen and click on Submit and
            Find, the issued visa will be downloaded automatically.
        </p>

        <p>
            Print the Visa page you downloaded. All the necessary information is included in the Visa page. When you entered
            this site, you downloaded the Kuwait Visa app. Now, if you click on the <span class="fst-italic"
                style="color:#0066cc">Kuwait Visa</span> app and follow the
            instructions below, you will know the validity of the visa instantly.
        </p>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>Then click on the <a href="{{ route('kuwait-evisa-verification') }}">Inquiry-Visa Inquiries</a>
                    option and enter all the information of Visa Number, MOI
                    Reference (Only Reference is written on the Employment Visa) and Passport Number and click on the
                    Inquiry option written in blue. <br> <br>
                    If you click on the Inquiry option written in blue, a page will open in a short time where the Approved
                    text will be shown in <span style="color: green;">GREEN</span> and the short details of the Visa issued
                    will be shown on your mobile
                    screen. </p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>On this page, if you click on the <strong>Verify - Visa Verification</strong> option on the right side of
                    Inquiry-Visa
                    Inquiries, a scanner will automatically open, when you scan the blue QR code under the passport details
                    on your visa with that scanner, a brief description of the Employment Visa with the word Valid document
                    written in GREEN colour will appear on your mobile screen as soon as possible.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">If the above 2 are correct, then you will understand that the Employment Visa is correct.
                </p>
            </div>
        </div>

        <div class="">
            <h2 class="fw-bold"><ins>Manual Employment Visa checking rules</ins>:</h2>
            <p>
                To check all information thoroughly,<a href="https://rnt.moi.gov.kw/esrv/VisaStat.do?lang=eng#mobSec"> click
                    on</a> link,
                there you will find the Visa Application Status link. For Manual Employment Visa by clicking on the
                mentioned link, enter the Captcha with Application Number, Unified Number, Visa Number, Entry Number,
                Position Number submit. You can see APPROVED in the top place where you entered the number at the moment of
                submission. If you see Approved, you will understand that all the information of your manual Employment Visa
                is correct.
            </p>
        </div>

        <div class="">
            <h2 class="fw-bold"><ins>To update Employment Visa applications and download issued Employment Visas
                    automatically, follow the steps below</ins>:</h2>

            <div class="timeline-item">
                <div class="timeline-icon">
                    <div class="timeline-circle"></div>
                </div>
                <div class="timeline-content">
                    <p>Click on the Present Visa Status button to know the correct information of the Employment Visa
                        application. Fill the requested information correctly and type the Captcha correctly then click on
                        Submit to see/know all the correct information related to the Empoyment Visa. </p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-icon">
                    <div class="timeline-circle"></div>
                </div>
                <div class="timeline-content">
                    <p>If your desired Employment Visa has been issued then click
                        on the Download or Print the Employment
                        Visa button. Clicking on that button will show the options of Manual Employment Visa and eVisa
                        (Electronic Visa). Click on the type of Visa you want to view/ download or print. Fill the requested
                        information correctly and type the Captcha correctly then click on Submit. The issued Employment
                        Visa will automatically be displayed or downloaded here.</p>
                </div>
            </div>
        </div>


    </div>
    <div class="container text-center my-5">
        <div class="row justify-content-center">
            <!-- First Card -->
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 mb-2 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: space-between;">
                    <a href="{{ route('download-employment-visa') }}" class="text-decoration-none">
                        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo"
                            class="img-fluid mb-3" style="max-width: 150px;">
                        <h5 class="text-primary text-center">Download or print <br> the Employment Visa
                        </h5>
                    </a>

                </div>
            </div>
            <!-- Second Card -->
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 mb-2 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: end;">
                    <a href="{{ route('kuwait-evisa-verification') }}" class="text-decoration-none">
                        <img src="{{ asset('images/unnamed__1_.png') }}" alt="Kuwait Police Logo" class="img-fluid mb-3"
                            style="max-width: 150px;">
                        <h5 class="text-primary text-center">eVisa (Electronic Visa) <br> Inquiry & Verification</h5>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
