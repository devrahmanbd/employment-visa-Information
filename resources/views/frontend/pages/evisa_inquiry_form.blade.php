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
        .w-32 {
            width: 26rem !important;
        }

        .icon-container-globe {
            margin: 7px -4px;
        }

        .card {
            border-radius: 15px;
        }

        .btn-submit {
            background-color: #0060c7;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="card w-full h-screen max-w-md mx-auto min-h-[450px] bg-white shadow-lg">
        <!-- Header with Back Icon -->
        <div class="bg-[#1d305b] flex items-center p-3 ">
            <button class="mr-4" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                    stroke="currentColor" fill="none" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-xl font-bold text-white text-center flex-grow">Visa</h1>
        </div>

        <!-- Form Section -->
        <div class="p-6">
            <p class="text-blue-700 text-sm mb-4 font-bold">Fill the following information to retrieve the visa details</p>

            <form action="{{ route('web-app-evisa-details') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="visa_number" class="text-sm text-black-500">Visa Number</label>
                        <input type="text" name="visa_number" id="visa_number"
                            class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your visa number" required>
                    </div>

                    <div>
                        <label for="mio_reference" class="text-sm text-black-500">MIO Reference</label>
                        <input type="text" name="mio_reference" id="mio_reference"
                            class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your MOI reference" required>
                    </div>

                    <div>
                        <label for="passport_number" class="text-sm text-black-500">Passport Number</label>
                        <input type="text" name="passport_number" id="passport_number"
                            class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your passport number" required>
                    </div>

                    <div>
                        <button type="submit" class="w-full py-3 rounded-lg btn-submit">Inquiry</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
