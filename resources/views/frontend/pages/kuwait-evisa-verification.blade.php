<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kuwait Visa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('frontend/assets/visa/home.css') }}" />
</head>
<body>
  <div id="sidebar" class="sidebar fixed top-0 left-0 h-full w-64 transform -translate-x-full transition-transform duration-300 z-50 overflow-y-auto">
    <div class="flex flex-col justify-between h-full">
      <div>
        <div class="p-4 text-center banner">
          <img src="{{ asset('images/kuwaitappslogo-r.png') }}" alt="Kuwait Apps Logo" class="mx-auto mb-4 width-sidebar-logo" />
        </div>
        <div class="flex items-center gap-2 p-4">
          <img src="{{ asset('images/globe.svg') }}" alt="Language Icon" class="w-6 h-6" />
          <span class="language-arabic">العربية</span>
        </div>
      </div>
      <div class="p-4 text-center">
        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo" class="mx-auto mb-2 w-16" />
        <p class="footer-text">Privacy Policy</p>
        <p class="footer-text">Design & Development by Ministry of Interior</p>
      </div>
    </div>
  </div>
  
  <div class="main-container max-w-md mx-auto bg-gray-50 min-h-screen relative">
    <header class="w-full bg-blue-900 flex items-center p-2 touch-target">
      <button id="hamburger-button" class="focus:outline-none touch-target">
        <img src="{{ asset('images/hamburger-menu.svg') }}" alt="Menu" class="hamburger-svg" />
      </button>
    </header>
    
    <div class="text-center card-position">
      <img src="{{ asset('images/apps-banner.png') }}" alt="Kuwait Visa Logo" class="w-full max-w-full" />
    </div>
    
    <div class="content-container px-8 mb-6">
      <h2 class="verify-title text-2xl md:text-3xl">Verify the Visa</h2>
      <p class="text-gray-600 text-sm md:text-base">Verify visa that issued by the Ministry of Interior</p>
      <div class="grid grid-cols-2 gap-4 mt-3">
        <a href="{{ route('web-app-visa-inquiries') }}" class="block">
          <div class="card p-4 flex flex-col items-start h-full">
            <div class="text-blue-600 mb-2">
              <img class="w-16 h-16" src="{{ asset('images/user-icon.png') }}" alt="Inquiry Icon" />
            </div>
            <p class="font-semibold text-gray-800 mb-1">Inquiry</p>
            <p class="text-xs text-gray-500">Visa Inquiries</p>
          </div>
        </a>
        <a href="{{ route('visa-verification-scan') }}" class="block">
          <div class="card p-4 flex flex-col items-start h-full">
            <div class="text-blue-600 mb-2">
              <img class="w-16 h-16" src="{{ asset('images/barcode-scaner-icon.png') }}" alt="Verify Icon" />
            </div>
            <p class="font-semibold text-gray-800 mb-1">Verify</p>
            <p class="text-xs text-gray-500">Visa Verification</p>
          </div>
        </a>
      </div>
    </div>
    <div class="content-container px-8 mb-6">
    <h2 class="verify-title text-2xl md:text-3xl">Residency Inquiry</h2>
    <p class="text-gray-600 text-sm md:text-base">Inquire the status of the residency</p>
      <div class="grid grid-cols-2 gap-4 mt-3">
        <a href="{{ route('web-app-visa-inquiries') }}" class="block">
          <div class="card p-4 flex flex-col items-start h-full">
            <div class="text-blue-600 mb-2">
              <img class="w-16 h-16" src="{{ asset('images/scanner.svg') }}" alt="Inquiry Icon" />
            </div>
            <p class="font-semibold text-gray-800 mb-1">Inquiry</p>
            <p class="text-xs text-gray-500">Residency Inquiries</p>
          </div>
        </a>
        <a href="{{ route('visa-verification-scan') }}" class="block" style="display: none;">
          <div class="card p-4 flex flex-col items-start h-full">
            <div class="text-blue-600 mb-2">
            </div>
            <p class="font-semibold text-gray-800 mb-1"></p>
            <p class="text-xs text-gray-500"></p>
          </div>
        </a>
      </div>
    </div>
    
    <div class="content-container px-8 mb-6">
      <h2 class="text-lg font-bold text-blue-700 md:text-xl">Verify the Documents and Certificates</h2>
      <p class="text-gray-600 text-sm md:text-base">Verify the documents and certificates issued by the Ministry of Interior</p>
      <div class="blue-card p-4 rounded-lg text-center mt-3">
        <div class="flex justify-center mb-3">
          <img class="w-16 h-16" src="{{ asset('images/scanercode.png') }}" alt="MOI Logo" />
        </div>
        <p class="font-semibold mb-4 text-base md:text-lg">Verify the Documents and Certificates</p>
        <button class="blue-button w-full touch-target">Verification</button>
      </div>
    </div>
  </div>
  
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
  
  <script>
document.getElementById('download-pdf').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const element = document.getElementById('visa-details');

    // Set the scale to match A4 dimensions at 300 DPI
    const scale = 300 / 96; // 300 DPI / 96 DPI (default screen resolution)
    const pdfWidth = 210;
    const pdfHeight = 297;

    html2canvas(element, {
        scale: scale,
        useCORS: true,
        allowTaint: true,
        backgroundColor: '#FFFFFF'
    }).then(canvas => {
        const pdf = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: [pdfWidth, pdfHeight]
        });

        const imgData = canvas.toDataURL('image/jpeg', 1.0);

        // Add image at exact A4 dimensions without any scaling or positioning
        pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);

        pdf.save('visa-details.pdf');
    });
});

  </script>
</body>
</html>
