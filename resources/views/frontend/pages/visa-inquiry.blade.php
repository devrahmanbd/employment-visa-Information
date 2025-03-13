@extends('frontend.app')

@section('content')
@push('styles')
        <style>
             body {
            background-color: #f5faf5; 
            font-family: Arial, sans-serif;
        }

        .visa-form-container {
            max-width: 700px; 
            background-color: #eef7ee; 
            padding: 40px;
            border-radius: 15px;
            margin: 50px auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }

        .visa-form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .visa-form input,
        .visa-form select {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            width: 100%;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .submit-btn {
            background-color: #b68a35; 
            color: white;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            border: none;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .submit-btn:hover {
            background-color: #9b702e;
            transform: scale(1.02);
        }

      
        .visa-heading {
            text-decoration: underline;
            font-size: 24px;
            font-weight: bold;
            color: #0000FE; 
        }

   
        .date-picker-wrapper {
            position: relative;
        }

        .date-picker-wrapper input {
            cursor: pointer;
            background-color: #fff;
            border-radius: 8px;
            padding: 12px;
        }

    
        @media (max-width: 768px) {
            .visa-form-container {
                max-width: 90%;
                padding: 25px;
                margin: 20px auto;
            }

            .submit-btn {
                font-size: 0.9rem;
                padding: 12px;
            }
        }

        </style>
    @endpush
    <h2 class="text-center mt-4">
        <a href="#" class="visa-heading">Visa Inquiry</a>
    </h2>

    <div class="visa-form-container">
        <form class="visa-form">
            <div class="mb-3">
                <label for="passport">Passport No.</label>
                <input type="text" id="passport" class="form-control" placeholder="Enter Passport No">
            </div>

            <div class="mb-3">
                <label for="dob">Date of Birth</label>
                <div class="date-picker-wrapper">
                    <input type="date" id="dob" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="nationality">Nationality</label>
                <select id="nationality" class="form-control">
                    <option value="" selected>Select Nationality</option>
                </select>
            </div>            

            <div class="mb-3">
                <label for="captcha">Enter Captcha</label>
                <input type="text" id="captcha" class="form-control" placeholder="Enter Captcha Here">
            </div>

            <button type="submit" class="submit-btn">Submit and Find</button>
        </form>
    </div>
    @push('scripts')
    <script>
        async function loadNationalities() {
            try {
              
                let response = await fetch("https://restcountries.com/v3.1/all");
                let countries = await response.json();
                let nationalitySelect = document.getElementById("nationality");
    

                countries.sort((a, b) => a.name.common.localeCompare(b.name.common));
    
               
                countries.forEach(country => {
                    let option = document.createElement("option");
                    option.value = country.name.common; 
                    option.textContent = country.name.common; 
    
                    nationalitySelect.appendChild(option);
                });
            } catch (error) {
                console.error("Error fetching country list:", error);
            }
        }
    
        document.addEventListener("DOMContentLoaded", loadNationalities);
    </script>   
    
    @endpush
@endsection