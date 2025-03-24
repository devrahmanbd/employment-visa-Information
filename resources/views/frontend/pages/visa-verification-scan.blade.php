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

    <style>
        @keyframes scanAnimation {
            0% {
                top: 0;
            }

            50% {
                top: 100%;
            }

            100% {
                top: 0;
            }
        }

        .animate-scan {
            animation: scanAnimation 2s infinite linear;
            position: absolute;
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
                <div class="mt-6 flex justify-center">
                    <div
                        class="relative border-4 border-green-500 h-60 w-60 md:h-72 md:w-72 flex items-center justify-center overflow-hidden">
                        <!-- Video inside the bordered box -->
                        <video id="barcode-scanner" class="w-full h-full object-cover"></video>

                        <!-- QR Focus Box (Inside Video) -->
                        <div class="absolute w-36 h-36 border-4 border-blue-500 rounded-lg pointer-events-none"
                            style="top: 50%; left: 50%; transform: translate(-50%, -50%);">

                            <!-- Scanning Line Animation -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-red-500 animate-scan"></div>
                        </div>
                    </div>
                </div>

                <!-- Scan Result Text -->
                <div class="mt-4 text-center">
                    <span id="barcode-result"
                        class="text-blue-600 font-bold bg-white px-3 py-2 rounded-lg shadow-md"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- QR Scanner Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <script src="https://unpkg.com/@zxing/library@latest"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const codeReader = new ZXing.BrowserBarcodeReader();
            const videoElement = document.getElementById('barcode-scanner');
            const resultElement = document.getElementById('barcode-result');

            codeReader.decodeFromVideoDevice(null, videoElement, (result, err) => {
                if (result) {
                    resultElement.textContent = "QR Code: " + result.text;
                    resultElement.style.color = "green";

                    fetch(`/barcode-search?barcode=${result.text}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Visa Found: " + data.visaDetails);
                            } else {
                                alert("Visa not found!");
                            }
                        });
                }
            });

            // Camera permission check
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                alert("Your browser does not support camera access. Try using Chrome or Firefox.");
            } else {
                console.log("Camera access is supported!");
            }
        });
    </script>

</body>

</html>
