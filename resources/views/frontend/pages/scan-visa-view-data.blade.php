<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuwait Visa Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .document-container {
            width: 595px;
            height: 842px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .ministry-header {
            background-color: #ffffff;
            text-align: center;
            padding: 15px;
        }

        .footer {
            background-color: #f3f4f6;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="max-w-md mx-auto bg-[#F7F8FA] shadow h-screen">
        <!-- Ministry Header -->
        <div class="header-blue bg-green-800 text-white px-4 py-3 flex justify-start">
            <button class="mr-2" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        <div class="ministry-header flex flex-row justify-between items-center">
            <h3 class="text-dark text-sm font-bold">دولة الكويت <br> وزارة الداخلية </h3>
            <div class="flex justify-center items-center my-2">
                <img src="{{ asset('images/scanercode.png') }}" alt="Ministry Logo" class="w-16 h-16">
            </div>
            <h3 class="text-dark text-sm font-bold">State of Kuwait <br>
                Ministry of Interior </h3>
        </div>


        <div class="text-center bg-gray-200 p-3">
            <h3 class="text-blue-500 text-xs font-bold">الموقع الرسمي للتحقق من الوثائق والشهادات الصادرة من وزارة
                الداخلية</h3>
            <h3 class="text-blue-500 text-xs font-bold">The official website to verify documents and certificates issued
                by Ministry of Interior</h3>

        </div>

        <!-- Document Content -->
        <div class="p-6 flex-grow">
            @if ($visa->visa_status == 'approved')
                <div class="text-center mb-6 pb-4 text-green-700">
                    {{-- verify icon border circle  --}}
                    <div class="flex justify-center items-center my-2">
                        <img src="{{ asset('images/verify-logo.png') }}" alt="Verify Icon" class="w-16">
                    </div>
                    <h3 class="text-green-600 text-xs font-bold">وثيقة صالحة</h3>
                    <h3 class="text-green-600 text-xs font-bold">Valid Document</h3>
                </div>
            @else
                <div class="text-center mb-6 pb-4 text-red-700">
                    {{-- verify icon border circle  --}}
                    <div class="flex justify-center items-center my-2">
                        {{-- <img src="{{ asset('images/verify-logo.png') }}" alt="Verify Icon" class="w-16"> --}}
                    </div>
                    <h3 class="text-red-600 text-xs font-bold">وثيقة غير صالحة</h3>
                    <h3 class="text-red-600 text-xs font-bold">Invalid Document</h3>
                </div>
            @endif

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">نوع الوثيقة Type Certificate</span>
                <div class="text-gray-900">تأشيرة الكترونية <br> Electronic Visa</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">حالة التأشيرة Visa Status</span>
                <div class="text-green-600">مقبولة @if ($visa->visa_status == 'approved')
                        | Approved
                    @else
                        Waiting for approval
                    @endif
                </div>

            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">نوع التأشيرة Visa Type</span>
                <div class="text-gray-900">{{ $visa->visa_type_en }} {{ $visa->visa_type_ar }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">رقم التأشيرة Visa Number</span>
                <div class="text-gray-900">{{ $visa->visa_number }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">الجنسية Nationality</span>
                <div class="text-gray-900">{{ $visa->nationality_ar }} {{ $visa->nationality_en }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">رقم الجواز Passport Number</span>
                <div class="text-gray-900">{{ $visa->passport_no }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">الاسم العربي Arabic </span>
                <div class="text-gray-900">{{ $visa->full_name_ar }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">الاسم اللاتيني Latin </span>
                <div class="text-gray-900">{{ $visa->full_name_en }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">تاريخ الإنتهاء Expiry </span>
                <div class="text-gray-900">{{ $visa->full_name_ar }}</div>
            </div>
        </div>


        <!-- Footer -->
        <div class="footer">
            <p class="text-xs text-gray-600">هذه الوثيقة صادرة من نظام وزارة الداخلية</p>
            <p class="text-xs text-gray-600">This document is issued by Ministry of Interior system</p>
            <div class="flex justify-center space-x-6 text-gray-600 text-2xl">
                @php
                    $socialLinks = json_decode($setting['social_links'], true);
                @endphp

                <a href="{{ $socialLinks[0]['url'] }}" class="hover:text-pink-500">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="{{ $socialLinks[1]['url'] }}" class="hover:text-black">
                    <i class="fab fa-x-twitter"></i>
                </a>



                <a href="{{ $socialLinks[3]['url'] }}" class="hover:text-blue-600">
                    <i class="fab fa-facebook"></i>
                </a>

                <a href="{{ $socialLinks[2]['url'] }}" class="hover:text-red-500">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
