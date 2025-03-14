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
                margin-top: 20px;
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
                <div class="col-md-6 mb-3">
                    <label>Visa Purpose In Arabic</label>
                    <input type="text" name="visa_purpose_ar"
                        value="{{ old('visa_purpose_ar', $visa->visa_purpose_ar) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Visa Purpose In English</label>
                    <input type="text" name="visa_purpose_en"
                        value="{{ old('visa_purpose_en', $visa->visa_purpose_en) }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Date of Issue</label>
                    <input type="date" name="issue_date" value="{{ old('issue_date', $visa->issue_date) }}"
                        class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Date Of Expiry</label>
                    <input type="date" name="expiry_date" value="{{ old('expiry_date', $visa->expiry_date) }}"
                        class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Place of Issue In Arabic </label>
                    <input type="text" name="place_of_issue" value="{{ old('place_of_issue', $visa->place_of_issue) }}"
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
                <div class="col-md-12">
                    <label>Nationality</label>
                    <select id="nationality" name="nationality" class="form-control">
                        <option value="">Select Nationality</option>
                        {{-- @foreach ($countries as $country)
                            <option value="{{ $country['cca2'] }}" {{ $visa->nationality == $country['cca2'] ? 'selected' : '' }}>
                                {{ $country['name']['common'] }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="{{ old('dob', $visa->dob) }}" class="form-control">
                </div>
                <div class="col-md-12">
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
                <div class="col-md-12">
                    <label>Place Of Issue</label>
                    <input type="text" name="place_issue" value="{{ old('place_issue', $visa->place_issue) }}"
                        class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Passport Type</label>
                    <select name="passport_type" class="form-control">
                        <option value="Diplomatic" {{ $visa->passport_type == 'Diplomatic' ? 'selected' : '' }}>Diplomatic
                        </option>
                        <option value="Official" {{ $visa->passport_type == 'Official' ? 'selected' : '' }}>Official
                        </option>
                        <option value="Normal" {{ $visa->passport_type == 'Normal' ? 'selected' : '' }}>Normal</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Passport Expiry Date</label>
                    <input type="date" name="passport_expiry_date"
                        value="{{ old('passport_expiry_date', $visa->passport_expiry_date) }}" class="form-control">
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
                <div class="col-md-12">
                    <label>MOI Reference</label>
                    <input type="text" name="company_moi_reference"
                        value="{{ old('company_moi_reference', $visa->company_moi_reference) }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Mobile Number</label>
                    <input type="text" name="mobile_number" value="{{ old('mobile_number', $visa->mobile_number) }}"
                        class="form-control">
                </div>
            </div>

            <div class="section-heading">Message</div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <textarea name="message" placeholder="Enter Message" class="form-control">{{ old('message', $visa->message) }}</textarea>
                </div>
            </div>

            <button type="submit" class="submit-btn">Update Visa</button>
        </form>
    </div>

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
@endsection
