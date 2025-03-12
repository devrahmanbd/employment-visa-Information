@extends('frontend.app')

@section('content')
    <div class="timeline">
        <h2><ins>eVisa (Electronic Visa) checking rules: </ins> </h2>

        <p class="ps-4">To check your Electronic Visa (eVisa), you can install the Kuwait Visa app on your Android
            operating system-powered smart phone by going to the Google Play Store or Apple iPhone's App Store. </p>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>Then click on the Inquiry-Visa Inquiries option and enter all the information of Visa Number, MOI
                    Reference (Only Reference is written on the Employment Visa) and Passport Number and click on the
                    Inquiry option written in blue.
                    If you click on the Inquiry option written in blue, a page will open in a short time where the Approved
                    text will be shown in GREEN and the short details of the Visa issued will be shown on your mobile
                    screen. </p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>Here on this page, if you click on the QR Code on the right side of the Details option, you will
                    automatically see a QR Code. There, Visa Verification QR Code is written above the QR Code. If you open
                    the Verify-Visa Verification of the same Kuwait Visa app running on any other Android or IOS operating
                    system and scan the displayed QR Code, a short detail of the Employment Visa written in GREEN with Valid
                    document will show on your mobile screen as soon as possible. Here, if you wish, you can verify the
                    information provided using the default QR code scanner on any smart phone. </p>
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
            <h2 class=""><ins>Manual Employment Visa checking rules: </ins></h2>
            <p>
                To check all information thoroughly, click on https://rnt.moi.gov.kw/esrv/visastat.do?lang=eng#mobsec link,
                there you will find the Visa Application Status link. For Manual Employment Visa by clicking on the
                mentioned link, enter the Captcha with Application Number, Unified Number, Visa Number, Entry Number,
                Position Number submit. You can see APPROVED in the top place where you entered the number at the moment of
                submission. If you see Approved, you will understand that all the information of your manual Employment Visa
                is correct.
            </p>
        </div>

        <div class="">
            <a href="">
                <h2 class=""><ins>To update Employment Visa applications and download issued Employment Visas
                        automatically, follow the steps below: </ins></h2>
            </a>
            <div class="timeline-item">
                <div class="timeline-icon">
                    <div class="timeline-circle"></div>
                </div>
                <div class="timeline-content">
                    <p>Then click on the Inquiry-Visa Inquiries option and enter all the information of Visa Number, MOI
                        Reference (Only Reference is written on the Employment Visa) and Passport Number and click on the
                        Inquiry option written in blue.
                        If you click on the Inquiry option written in blue, a page will open in a short time where the
                        Approved
                        text will be shown in GREEN and the short details of the Visa issued will be shown on your mobile
                        screen. </p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-icon">
                    <div class="timeline-circle"></div>
                </div>
                <div class="timeline-content">
                    <p>Here on this page, if you click on the QR Code on the right side of the Details option, you will
                        automatically see a QR Code. There, Visa Verification QR Code is written above the QR Code. If you
                        open
                        the Verify-Visa Verification of the same Kuwait Visa app running on any other Android or IOS
                        operating
                        system and scan the displayed QR Code, a short detail of the Employment Visa written in GREEN with
                        Valid
                        document will show on your mobile screen as soon as possible. Here, if you wish, you can verify the
                        information provided using the default QR code scanner on any smart phone. </p>
                </div>
            </div>
        </div>


    </div>
    <div class="container text-center my-5">
        <div class="row justify-content-center">
            <!-- First Card -->
            <div class="col-md-4 col-6 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: space-between;">
                    <a href="" class="text-decoration-none">
                        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo"
                            class="img-fluid mb-3" style="max-width: 150px;">
                        <h5 class="text-primary text-center">Present Visa Status</h5>
                    </a>

                </div>
            </div>
            <!-- Second Card -->
            <div class="col-md-4 col-6 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: space-between;">
                    <a href="" class="text-decoration-none">
                        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo"
                            class="img-fluid mb-3" style="max-width: 150px;">
                        <h5 class="text-primary text-center">Download or Print the Employment Visa</h5>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
