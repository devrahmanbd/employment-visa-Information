<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $setting['site_title'] ?? 'Kuwait eVisa System' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="theme-color" content="#0a1e4d" />
  <meta name="application-name" content="Kuwait Visa" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title" content="Kuwait Visa" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="msapplication-TileColor" content="#0a1e4d" />
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/icon/mipmap-xhdpi/ic_launcher.png') }}">
  <link rel="manifest" href="{{ route('pwa.manifest') }}">
  <meta name="description" content="{{ $setting['meta_description'] ?? 'Official Kuwait electronic visa verification system' }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Include html5-qrcode -->
  <script src="https://unpkg.com/html5-qrcode"></script>
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    @font-face {
      font-family: "Helvetica Neue Arabic 75 Bold";
      src: url("../../../fonts/HelveticaNeueLTArabic-Bold.ttf") format("truetype");
      font-weight: bold;
      font-style: normal;
    }
    
    @font-face {
      font-family: "Helvetica Neue Arabic 45 Light";
      src: url("../../../fonts/HelveticaNeueLTArabic-Light.ttf") format("truetype");
      font-weight: normal;
      font-style: normal;
    }
    
    body {
      font-family: "Helvetica Neue Arabic 45 Light", Arial, sans-serif;
    }
    
    .font-bold-arabic {
      font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
    }
    
    .header-title {
      font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
    }
    
    .blue-heading {
      font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
      color: #0060c7;
    }
    
    /* Custom styles for the QR scanner */
    #reader {
      border: none !important;
      width: 100% !important;
      height: 100% !important;
    }
    
    #reader video {
      object-fit: cover !important;
      width: 100% !important;
      height: 100% !important;
    }
    
    /* Hide default UI elements */
    #reader__dashboard_section_csr {
      display: none !important;
    }
    
    #reader__scan_region {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
    }
    
    #reader__scan_region > img {
      display: none !important;
    }
    
    /* Custom green border for scanner */
    .custom-scanner-border {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 80%;
      height: 80%;
      transform: translate(-50%, -50%);
      border: 3px solid #00FF00;
      z-index: 100;
      pointer-events: none;
    }
  </style>
</head>

<body class="bg-white">
  <div class="w-full h-screen mx-auto bg-white">
    <!-- Header Section -->
    <div class="bg-[#0a1e4d] text-white p-4 flex items-center">
      <button class="mr-4" onclick="window.history.back();">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
          stroke="currentColor" fill="none" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>
      <h1 class="text-xl font-bold-arabic text-center flex-grow mr-6">Verify</h1>
    </div>
    
    <div class="p-4">
      <!-- Content Section -->
      <div class="p-5 text-center">
        <h2 class="text-gray-700 text-xl mb-1">To Verify Visa</h2>
        <h3 class="blue-heading text-2xl font-bold">Scan the QR Code</h3>
        
        <!-- Checklist -->
        <div class="bg-[#f0f2f5] p-4 rounded-lg mt-6 text-left">
          <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
              <svg class="h-6 w-6 text-[#0060c7]" fill="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M9 12l2 2 4-4" fill="white" stroke="white" stroke-width="2" />
              </svg>
            </div>
            <p class="text-gray-800">Generated in the document</p>
          </div>
          <div class="flex items-center space-x-3 mt-3">
            <div class="flex-shrink-0">
              <svg class="h-6 w-6 text-[#0060c7]" fill="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M9 12l2 2 4-4" fill="white" stroke="white" stroke-width="2" />
              </svg>
            </div>
            <p class="text-gray-800">Generated in the mobile application</p>
          </div>
        </div>
        
        <!-- QR Scanner Box -->
        <div id="scanner-container" class="relative mt-6 mx-auto w-full h-[300px] bg-black rounded-lg overflow-hidden">
          <div id="reader"></div>
          <div id="custom-border" class="custom-scanner-border"></div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- QR Scanner Script -->
  <script>
    function onScanSuccess(decodedText, decodedResult) {
      console.log("Scanned Code:", decodedText);

      $.ajax({
        url: `/barcode-search-evisa`,
        type: 'GET',
        data: {
          'barcode': decodedText
        },
        success: function(data) {
          if (data.success) {
            console.log("Visa Data:", data);
            window.location.href = data.route; // Redirect based on returned route URL
          } else {
            alert("Visa not found!");
          }
        },
        error: function(error) {
          console.error("Error fetching data:", error);
          alert("Error fetching visa details!");
        }
      });
    }

    // Configuration for the scanner
    const config = {
      fps: 10,
      experimentalFeatures: {
        useBarCodeDetectorIfSupported: true
      }
    };

    // Initialize scanner
    const html5QrCode = new Html5Qrcode("reader");
    
    // Start scanner
    html5QrCode.start(
      { facingMode: "environment" }, 
      config, 
      onScanSuccess
    ).then(() => {
      // After scanner starts successfully, remove default UI elements
      setTimeout(function() {
        // Find and remove any default corner elements that may be added by the library
        const scanRegion = document.getElementById('reader__scan_region');
        if (scanRegion) {
          const qrElements = scanRegion.querySelectorAll('div');
          qrElements.forEach(el => {
            if (el.style.position === 'absolute') {
              el.style.display = 'none';
            }
          });
        }
        
        // Hide any other unwanted UI elements
        const dashboardSection = document.getElementById('reader__dashboard_section_csr');
        if (dashboardSection) {
          dashboardSection.style.display = 'none';
        }
        
        // Set custom styling for video element
        const videoElements = document.querySelectorAll('video');
        videoElements.forEach(video => {
          video.style.objectFit = 'cover';
          video.style.width = '100%';
          video.style.height = '100%';
        });
      }, 500);
    }).catch(err => {
      console.error("Error starting scanner:", err);
    });
  </script>
</body>
</html>
