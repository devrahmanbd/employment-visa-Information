<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kuwait eVisa Information -  Kuwait</title>
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
  <link rel="icon" type="image/png" sizes="192x192" href="http://localhost/images/icon/mipmap-xhdpi/ic_launcher.png">
  <link rel="manifest" href="http://localhost/manifest.json">
  <meta name="description" content="Official Kuwait electronic visa verification system">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://unpkg.com/html5-qrcode"></script>
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
    
    .blue-heading {
      font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
      color: #0060c7;
    }
    
    /* Checklist styling - smaller circle with better checkmark */
    .checklist-item {
      display: flex;
      align-items: center;
      margin-bottom: 12px;
    }
    
    .check-icon {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background-color: #0980FF;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      flex-shrink: 0;
      position: relative;
    }
    
    .check-icon::before {
      content: "✓";
      color: white;
      font-size: 10px;
      font-weight: bold;
      line-height: 1;
    }
    
    /* Scanner container with smaller scan area */
    .scanner-container {
      position: relative;
      margin-top: 1.5rem;
      width: 100%;
      height: 280px;
      overflow: hidden;
    }
    
    /* Green border - thinner and smaller area */
    .green-border {
      position: absolute;
      top: 2.5rem;
      left: 2rem;
      right: 2rem;
      bottom: 2rem;
      border: 2px solid #00FF00;
      pointer-events: none;
      z-index: 50;
    }
    
    /* QR Scanner styling */
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
    
    /* Hide unwanted scanner UI elements */
    #reader__dashboard_section_csr,
    #reader__dashboard_section_swaplink,
    #reader__status_span,
    #reader__scan_region img {
      display: none !important;
    }
  </style>
</head>

<body class="bg-white">
  <div class="w-full h-screen mx-auto bg-white">
    <div class="bg-[#0a1e4d] text-white p-4 flex items-center">
      <button class="mr-4" onclick="window.history.back();">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
          stroke="currentColor" fill="none" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>
      <h1 class="text-xl font-bold-arabic text-center w-full mr-6">Verify</h1>
    </div>
    
    <div class="px-0">
      <div class="p-5 text-center">
        <h2 class="text-gray-700 text-xl mb-1">To Verify Visa</h2>
        <h3 class="blue-heading text-2xl font-bold">Scan the QR Code</h3>
        <div class="bg-[#f0f2f5] p-4 rounded-lg mt-6 text-left mx-4">
          <div class="checklist-item">
            <div class="check-icon"></div>
            <p class="text-gray-800">Generated in the document</p>
          </div>
          <div class="checklist-item">
            <div class="check-icon"></div>
            <p class="text-gray-800">Generated in the mobile application</p>
          </div>
        </div>
        <div class="scanner-container mx-0 px-0 w-full">
          <div id="reader"></div>
          <div class="green-border"></div>
        </div>
      </div>
    </div>
  </div>
  
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
            window.location.href = data.route;
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
    
    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start(
      { facingMode: "environment" }, 
      { fps: 10 },
      onScanSuccess
    ).then(() => {
      setTimeout(() => {
        const elementsToHide = document.querySelectorAll("#reader__dashboard_section_csr, #reader__dashboard_section_swaplink, #reader__status_span, #reader__scan_region img");
        elementsToHide.forEach(el => {
          if (el) el.style.display = "none";
        });
        
        const scanRegion = document.getElementById('reader__scan_region');
        if (scanRegion) {
          scanRegion.style.border = "none";
          const qrRegionElements = scanRegion.querySelectorAll('div');
          qrRegionElements.forEach(el => {
            if (el.style.position === 'absolute') {
              el.style.display = 'none';
            }
          });
        }
        
        const videoElements = document.querySelectorAll('video');
        videoElements.forEach(video => {
          video.style.width = "100%";
          video.style.height = "100%";
          video.style.objectFit = "cover";
        });
      }, 500);
    }).catch(err => {
      console.error("Error starting scanner:", err);
    });
  </script>
</body>
</html>
