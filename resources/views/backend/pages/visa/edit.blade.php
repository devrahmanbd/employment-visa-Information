@extends('backend.admin')

@section('content')
    @push('styles')
       <style>
            body {
                background-color: #f5faf5;
                font-family: Arial, sans-serif;
            }

            .visa-form-container {
                max-width: 1200px;
                background-color: #eef7ee;
                padding: 15px 15px;
                border-radius: 15px;
                margin: 10px 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            }

            .visa-form label {
                font-weight: bold;
                margin-bottom: 5px;
                display: block;
            }

            .visa-form input,
            .visa-form select,
            .visa-form textarea {
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 10px;
                font-size: 1rem;
                width: 100%;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
                margin-bottom: 15px;
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

            .section-heading {
                font-size: 22px;
                font-weight: bold;
                margin-top: 5px;
                color: #0000FE;
                text-align: center;
            }

            hr {
                border: 1px solid #b68a35;
                margin: 20px 0;
            }
        </style>
    @endpush

    <div class="visa-form-container">
        <h2 class="text-center">Edit Visa Form</h2>

        <!-- Displaying All Errors at the Top -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.visas.update', $visa->id) }}" method="POST" class="visa-form">
            @csrf
            @method('PUT')

            <div class="section-heading">Visa Details (ﺑﻴﺎﻧﺎت اﻟﺘﺄﺷﻴﺮة)</div>
            <hr>
            <div class="row">
                <div class="col-md-12 ">
                    <label>Visa Number</label>
                    <input type="text" name="visa_number" value="{{ old('visa_number', $visa->visa_number) }}"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Visa Type In Arabic </label>
                    <input type="text" name="visa_type_ar" value="{{ old('visa_type_ar', $visa->visa_type_ar) }}"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Visa Type In English </label>
                    <input type="text" name="visa_type_en" value="{{ old('visa_type_en', $visa->visa_type_en) }}"
                        class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Date of Issue</label>
                    <input type="date" name="issue_date" value="{{ old('issue_date', $visa->issue_date) }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Date Of Expiry</label>
                    <input type="date" name="expiry_date" value="{{ old('expiry_date', $visa->expiry_date) }}"
                        class="form-control">
                </div>

            </div>

            <div class="section-heading">Visa Holder Details (بيانات صاحب التأشيرة)</div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Full Name in Arabic</label>
                    <input type="text" name="full_name_ar" value="{{ old('full_name_ar', $visa->full_name_ar) }}"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Full Name in English</label>
                    <input type="text" name="full_name_en" value="{{ old('full_name_en', $visa->full_name_en) }}"
                        class="form-control">
                </div>
                <div class="col-md-12">
                    <label>MOI Reference</label>
                    <input type="text" name="moi_reference" value="{{ old('moi_reference', $visa->moi_reference) }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Nationality Arabic</label>
                    <select id="nationality_ar" name="nationality_ar" class="form-control">
                        <option value="">Select Nationality</option>
                        <!-- Add your nationality options here -->
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Nationality English</label>
                    <select id="nationality_en" name="nationality_en" class="form-control">
                        <option value="">Select Nationality</option>
                        <!-- Add your nationality options here -->
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="{{ old('dob', $visa->dob) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male" {{ $visa->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $visa->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Occupation In Arabic</label>
                    <input type="text" name="occupation_ar" value="{{ old('occupation_ar', $visa->occupation_ar) }}"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Occupation In English</label>
                    <input type="text" name="occupation_en" value="{{ old('occupation_en', $visa->occupation_en) }}"
                        class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Passport No</label>
                    <input type="text" name="passport_no" value="{{ old('passport_no', $visa->passport_no) }}"
                        class="form-control">
                </div>
                 <div class="col-md-6">
                    <label>Passport Issue Date</label>
                    <input type="date" name="passport_issue_date" value="{{ old('passport_issue_date',$visa->passport_issue_date) }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Passport Expiry Date</label>
                    <input type="date" name="passport_expiry_date" value="{{ old('passport_expiry_date',$visa->passport_expiry_date) }}"
                        placeholder="Enter Passport Expiry Date" class="form-control">
                </div>
                
               
            </div>

            <div class="section-heading">Employer/Family Breadwinner Details (بيانات صاحب العمل/العائل)</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label>Full Name of Company in Arabic</label>
                    <input type="text" name="company_name_ar"
                        value="{{ old('company_name_ar', $visa->company_name_ar) }}" class="form-control">
                </div>
               
            </div>

           

            <button type="submit" class="submit-btn">Update Visa</button>
        </form>
    </div>

    <script>
        async function loadNationalities(selectedValueEn = "", selectedValueAr = "") {
            console.log("loadNationalities function called");

            try {
                let response = await fetch("https://restcountries.com/v3.1/all");
                if (!response.ok) {
                    throw new Error("Failed to fetch countries");
                }
                let countries = await response.json();
                console.log("Countries fetched:", countries);

                let nationalitySelectEn = document.getElementById("nationality_en");
                let nationalitySelectAr = document.getElementById("nationality_ar");

                if (!nationalitySelectEn || !nationalitySelectAr) {
                    throw new Error("Dropdown elements not found");
                }

                // Clear existing options
                nationalitySelectEn.innerHTML = `<option value="">Select Nationality (English)</option>`;
                nationalitySelectAr.innerHTML = `<option value="">Select Nationality (Arabic)</option>`;

                // Sort countries by English name
                countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

                // Populate dropdowns
                countries.forEach(country => {
                    let englishName = country.name.common;
                    let arabicName = country.translations?.ara?.common || "";

                    // Add option to English dropdown
                    let optionEn = document.createElement("option");
                    optionEn.value = englishName;
                    optionEn.textContent = englishName;
                    nationalitySelectEn.appendChild(optionEn);

                    // Add option to Arabic dropdown
                    let optionAr = document.createElement("option");
                    optionAr.value = arabicName;
                    optionAr.textContent = arabicName || englishName;
                    nationalitySelectAr.appendChild(optionAr);
                });

                // Set selected values after populating options
                console.log("Setting selected values...");
                nationalitySelectEn.value = selectedValueEn;
                nationalitySelectAr.value = selectedValueAr;
                console.log("Selected values set successfully!");

            } catch (error) {
                console.error("Error in loadNationalities:", error);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            console.log("DOM fully loaded");
            let selectedNationalityEn = "{{ old('nationality_en', $visa->nationality_en) }}"; // Example value
            let selectedNationalityAr = "{{ old('nationality_ar', $visa->nationality_ar) }}"; // Example value
            loadNationalities(selectedNationalityEn, selectedNationalityAr);
        });
    </script>
@endsection
