@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            body {
                background-color: #f5faf5;
                font-family: Arial, sans-serif;
            }

            .email-form-container {
                max-width: 700px;
                background-color: #eef7ee;
                padding: 40px;
                border-radius: 15px;
                margin: 50px auto;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            }

            .email-form label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
                position: relative;
            }

            .required::after {
                content: "*";
                color: red;
                position: absolute;
                top: -5px;
                font-size: 20px;
            }

            .email-form input,
            .email-form select,
            .email-form textarea {
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 12px;
                font-size: 1rem;
                width: 100%;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .phone-input {
                display: flex;
                align-items: center;
                width: 100%;
            }

            .phone-input .iti {
                width: 100% !important;
            }

            .phone-input input {
                flex: 1;
                width: 100% !important;
                min-width: 250px !important;
                max-width: 700px !important;
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


            .char-counter {
                font-size: 12px;
                color: #666;
                position: absolute;
                bottom: 10px;
                left: 10px;
            }

            .textarea-container {
                position: relative;
            }


            @media (max-width: 768px) {
                .email-form-container {
                    max-width: 95%;
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
    <div class="email-form-container">
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="email-form" action="{{ route('message.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <h2 class="text-center">Email Us</h2>
            </div>
            <br>
            <div class="mb-3">
                <label class="required">Name</label>
<<<<<<< Updated upstream
                <input type="text" class="form-control" placeholder="Enter your name">
=======
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your name" required>
>>>>>>> Stashed changes
            </div>

            <div class="mb-3">
                <label class="required">Email</label>
<<<<<<< Updated upstream
                <input type="email" class="form-control" placeholder="Enter your email">
=======
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email" required>
>>>>>>> Stashed changes
            </div>

            <div class="mb-3">
                <label>Phone Number</label>
                <div class="phone-input">
<<<<<<< Updated upstream
                    <input type="tel" id="phone" class="form-control">
=======
                    <input type="tel" name="phone_number" id="phone" value="{{ old('phone_number') }}" class="form-control" required>
                    <input type="hidden" name="full_phone_number" value="{{ old('full_phone_number') }}" id="full_phone_number">
>>>>>>> Stashed changes
                </div>
            </div>

            <div class="mb-3">
                <label>Nationality</label>
                <select id="nationality" class="form-control">
                    <option value="" selected>Select Nationality</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Subject</label>
                <div class="textarea-container">
<<<<<<< Updated upstream
                    <textarea id="subject" class="form-control" rows="4" placeholder="Enter your main text here"
                        maxlength="500"></textarea>
=======
                    <textarea name="subject" id="subject" class="form-control" rows="4" placeholder="Enter your main text here"
                        maxlength="500" value="{{ old('subject') }}" required></textarea>
>>>>>>> Stashed changes
                    <span class="char-counter">500/500</span>
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 3000
                    });
                });
            </script>
        @endif
    </div>
    @push('scripts')
        <script>
            const phoneInputField = document.querySelector("#phone");
            const phoneInput = window.intlTelInput(phoneInputField, {
                initialCountry: "auto",
                geoIpLookup: function(success, failure) {
                    fetch("https://ipapi.co/json")
                        .then(res => res.json())
                        .then(data => success(data.country_code))
                        .catch(() => success("US"));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            async function loadNationalities() {
                try {
                    let response = await fetch("https://restcountries.com/v3.1/all");
                    let countries = await response.json();
                    let nationalitySelect = document.getElementById("nationality");


                    countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

                    countries.forEach(country => {
                        let option = document.createElement("option");
                        option.value = country.cca2;
                        option.textContent = country.name.common;

                        nationalitySelect.appendChild(option);
                    });
                } catch (error) {
                    console.error("Error fetching country list:", error);
                }
            }

            document.addEventListener("DOMContentLoaded", loadNationalities);
            loadNationalities();

            const textArea = document.getElementById("subject");
            const charCounter = document.querySelector(".char-counter");

            textArea.addEventListener("input", function() {
                let remaining = 500 - this.value.length;
                charCounter.textContent = `${remaining}/500`;
            });
        </script>

    @endpush
@endsection