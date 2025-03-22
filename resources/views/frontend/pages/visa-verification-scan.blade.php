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

</head>

<body class="bg-gray-100">
    <div class="max-w-md h-screen mx-auto p-4 bg-white shadow-lg rounded-lg">
        <!-- Header Section -->
        <div class="bg-blue-900 text-white p-4 flex items-center">
            <button class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                    stroke="currentColor" fill="none" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-lg font-semibold">Verify</h1>
        </div>

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
                <div class="border-4 border-green-500 h-40 w-40 md:h-48 md:w-48">
                    <video id="barcode-scanner" style="width: 100%; height: 300px;"></video>
                    <p>Scan QR Code</p><span id="barcode-result"></span></p>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>


    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script>
        const codeReader = new ZXing.BrowserBarcodeReader();
        const videoElement = document.getElementById('barcode-scanner');
        const resultElement = document.getElementById('barcode-result');

        codeReader.decodeFromVideoDevice(null, videoElement, (result, err) => {
            if (result) {
                resultElement.textContent = result.text;
                fetch(`/barcode-search?barcode=${result.text}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Product Found: " + data.product.name);
                        } else {
                            alert("No product found!");
                        }
                    });
            }
        });
    </script>

    <script>
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            alert("Your browser does not support camera access. Try updating your browser or using Chrome/Firefox.");
        } else {
            console.log("Camera access is supported!");
        }
    </script>



</body>

</html>
