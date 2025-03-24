<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuwait Visa Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
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
            <h3 class="text-blue-500 text-xs font-bold">الموقع الرسمي للتحقق من الوثائق والشهادات الصادرة من وزارة الداخلية</h3>
            <h3 class="text-blue-500 text-xs font-bold">The official website to verify documents and certificates issued by Ministry of Interior</h3>
          
        </div>

        <!-- Document Content -->
        <div class="p-6 flex-grow">
            <div class="text-center mb-6 pb-4 text-green-700">
                {{-- verify icon border circle  --}}
                <div class="flex justify-center items-center my-2">
                    <img src="{{ asset('images/verify-logo.png') }}" alt="Verify Icon" class="w-16">
                </div>
                <h3 class="text-green-600 text-xs font-bold">وثيقة صالحة</h3>
                <h3 class="text-green-600 text-xs font-bold">Valid Document</h3>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">نوع الوثيقة | Type Certificate</span>
                <div class="text-gray-900">تأشيرة الكترونية | Electronic Visa</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">حالة التأشيرة | Visa Status</span>
                <div class="text-green-600">مقبولة | Approved</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">نوع التأشيرة | Visa Type</span>
                <div class="text-gray-900">تأشيرة عمل القطاع الخاص | Private Sector Work Visa</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p class="text-xs text-gray-600">هذه الوثيقة صادرة من نظام وزارة الداخلية</p>
            <p class="text-xs text-gray-600">This document is issued by Ministry of Interior system</p>
        </div>
    </div>
</body>

</html>
