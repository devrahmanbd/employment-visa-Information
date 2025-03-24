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
    <!-- Include html5-qrcode -->
    <script src="https://unpkg.com/html5-qrcode"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Style for Animation -->
    <style>
        @keyframes scanAnimation {
            0% {
                transform: translate(-50%, -50%) scale(1);
            }

            50% {
                transform: translate(-50%, -50%) scale(1.2);
            }

            100% {
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .animate-scan-box {
            animation: scanAnimation 2s infinite;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="max-w-md h-screen mx-auto bg-white shadow-lg rounded-lg">
        <!-- Header Section -->
        <div class="bg-blue-900 text-white p-4 flex items-center">
            <button class="mr-4" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                    stroke="currentColor" fill="none" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-lg font-semibold">Verify</h1>
        </div>
        <div class="p-4">
            <!-- Content Section -->
            <div class="p-5 text-center">
                <h2 class="text-gray-600 text-lg">To Verify Visa</h2>
                <h3 class="text-blue-600 font-semibold text-xl mt-1">Scan the QR Code</h3>
                <!-- Checklist -->
                <div class="bg-gray-200 p-4 rounded-lg mt-4 text-left">
                    <div class="flex items-center space-x-2">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <p class="text-gray-700 text-sm md:text-base">Generated in the document</p>
                    </div>
                    <div class="flex items-center space-x-2 mt-2">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <p class="text-gray-700 text-sm md:text-base">Generated in the mobile application</p>
                    </div>
                </div>
                <!-- QR Scanner Box -->
                <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg mt-6 flex justify-center">
                    <div class="relative w-full h-full flex items-center justify-center overflow-hidden">
                        <!-- QR Scanner using html5-qrcode -->
                        <div id="reader" class="w-full"></div>
                        <!-- QR Focus Box (Animated) -->
                        <div class="absolute w-36 h-36 border-4 border-blue-500 rounded-lg pointer-events-none animate-scan-box"
                            style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>
                    </div>
                </div>
                {{-- <!-- Scan Result Text -->
                <div class="mt-4 text-center">
                    <span id="barcode-result" class="text-blue-600 font-bold bg-white px-3 py-2 rounded-lg shadow-md">
                        No QR Code Scanned
                    </span>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- QR Scanner Script -->
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Display the scanned QR code
            const resultElem = document.getElementById("barcode-result");
            resultElem.innerText = "QR Code: " + decodedText;
            resultElem.style.color = "green";
            console.log("Scanned Code:", decodedText);
            // Send API Request using jQuery AJAX
            $.ajax({
                url: `/barcode-search-evisa`,
                type: 'GET',
                data: {
                    'barcode': decodedText
                },
                success: function(data) {
                    if (data.success) {
                        console.log("Visa Data:", data);
                        window.location.href = data.route; // Perform the redirect based on the response route URL
                    } else {
                        alert("Visa not found!"); // Can also show a more detailed message if required
                    }
                },
                error: function(error) {
                    console.error("Error fetching data:", error);
                    alert("Error fetching visa details!");
                }
            });
        }
        // Start the QR Code Scanner using html5-qrcode
        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start({
                facingMode: "environment"
            }, // Use back camera
            {
                fps: 10,
                qrbox: 250
            },
            onScanSuccess
        ).catch(err => {
            console.error("Camera Error:", err);
        });
    </script>
</body>

</html>
