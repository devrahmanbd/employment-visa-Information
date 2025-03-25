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
            background-color: #2f79df;
            color: white;
        }

        .text-error {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="card w-full h-screen max-w-md mx-auto min-h-[450px] bg-white shadow-lg">

        <!-- Header with Back Icon -->
        <div class="bg-[#35609c] flex items-center p-3 ">
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
            <p class="text-gray-600 text-sm mb-4">Please enter the Civil id to verify the residency status</p>

            <form id="visa-form">
                <div class="space-y-4">
                    <div>
                        <label for="civil_id" class="text-xs text-gray-500">Civil ID</label>
                        <input type="text" name="civil_id" id="civil_id"
                            class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter the Civil id number"
                            required>
                        <span id="error-message" class="text-error"></span> <!-- Error message here -->
                    </div>

                    <div>
                        <button type="submit" class="w-full py-2 rounded-lg btn-submit">Inquiry</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('visa-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            var civilId = document.getElementById('civil_id').value;
            var errorMessage = document.getElementById('error-message');

            // Simple validation for Civil ID (check if it's empty or not in valid format)
            if (civilId) {
                errorMessage.textContent = "Please enter a valid Civil ID number.";
            }
        });
    </script>

</body>

</html>
