<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuwait Visa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/home.css') }}" />
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto app-banner">
        <div class="text-center mb-6">
            <img src="{{ asset('images/apps-banner.png') }}" alt="Kuwait Visa Logo">
            {{-- <h1 class="text-xl font-bold text-blue-900">Kuwait VISA</h1> --}}
        </div>

        <!-- Verify the Visa -->
        <div class="mb-6">
            <h2 class="verify-title">Verify the Visa</h2>
            <p class="text-gray-600 text-sm">Verify visa that issued by the Ministry of Interior</p>
            <div class="grid grid-cols-2 gap-4 mt-3">
                    <a href="{{ route('web-app-visa-inquiries') }}">
                        <div class="p-4 bg-gray-100 rounded-lg">
                    <div class="text-blue-600 text-2xl flex justify-start">
                        <img class="max-w-[65px]" src="{{ asset('images/user-icon.png') }}" alt=""
                            srcset="">
                    </div>
                    <p class="font-semibold">Inquiry</p>
                    <p class="text-xs text-gray-500">Visa Inquiries</p>
                </div>
                    </a>
                <div class="p-4 bg-gray-100 rounded-lg">
                    <a href="{{ route('visa-verification-scan') }}">
                        <div class="text-blue-600 text-2xl">
                            <img class="max-w-[65px]" src="{{ asset('images/barcode-scaner-icon.png') }}" alt=""
                                srcset="">
                        </div>
                        <p class="font-semibold">Verify</p>
                        <p class="text-xs text-gray-500">Visa Verification</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Residency Inquiry -->
        <div class="mb-6">
            <h2 class="text-lg font-bold text-blue-700">Residency Inquiry</h2>
            <p class="text-gray-600 text-sm">Inquire the status of the residency</p>
            <div class="p-4 bg-gray-100 rounded-lg text-center mt-3">
                <div class="text-blue-600 text-2xl">
                    <img class="max-w-[65px] mx-auto" src="{{ asset('images/residency-icon.png') }}" alt=""
                        srcset="">
                </div>
                <p class="font-semibold">Inquiry</p>
                <p class="text-xs text-gray-500">Residency Inquiries</p>
            </div>
        </div>

        <!-- Verify the Documents and Certificates -->
        <div class="mb-6">
            <h2 class="text-lg font-bold text-blue-700">Verify the Documents and Certificates</h2>
            <p class="text-gray-600 text-sm">Verify the documents and certificates issued by the Ministry of Interior
            </p>
            <div class="p-4 bg-blue-600 text-white rounded-lg text-center mt-3">
                <div class="text-2xl"><img class="max-w-[65px] mx-auto" src="{{ asset('images/moi-logo.png') }}"
                        alt="" srcset=""></div>
                <button class="bg-white text-blue-600 px-4 py-2 rounded-lg w-[100%]">Verification</button>
            </div>
        </div>
    </div>
</body>

</html>
