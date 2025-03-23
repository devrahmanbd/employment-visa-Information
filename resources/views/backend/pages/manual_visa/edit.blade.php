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
                padding: 8px;
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

            .col-6 {
                border: 1px solid #c9c8c8;
                padding: 10px;
                border-radius: 8px;
            }
        </style>
    @endpush
    <div class="visa-form-container">
        <h2 class="text-center">Edit Manual Visa</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.admin-manual-visas.update', $manualVisa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="col-md-12">
                        <label for="pdf_file">Visa PDF File</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                        @if($manualVisa->pdf_file)
                            <a href="{{ asset($manualVisa->pdf_file) }}" target="_blank">View Current PDF</a>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label>Passport Number</label>
                        <input type="text" name="passport_no" value="{{ old('passport_no', $manualVisa->passport_no) }}" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob', $manualVisa->dob) }}" class="form-control">
                    </div>

                    <div class="col-md-12 mb-5">
                        <label>Nationality</label>
                        <input type="text" name="nationality_en" id="nationality_en" value="{{ old('nationality_en', $manualVisa->nationality_en) }}" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="submit-btn">Update Visa</button>
                    </div>
                </div>

                <div class="col-6">
                    <div class="col-md-6 mt-3">
                        <label>PDF Preview</label>
                        <iframe id="pdf_preview" style="width: 100%; height: 400px; border: 1px solid #ccc;"
                            @if($manualVisa->pdf_file) src="{{ asset($manualVisa->pdf_file) }}" @endif></iframe>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('script')
        <script>
            document.getElementById('pdf_file').addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file && file.type === "application/pdf") {
                    var pdfPreview = document.getElementById('pdf_preview');
                    var objectURL = URL.createObjectURL(file);
                    pdfPreview.src = objectURL;
                } else {
                    alert("Please upload a valid PDF file.");
                }
            });

            async function loadNationalities() {
                try {
                    let response = await fetch("https://restcountries.com/v3.1/all");
                    let countries = await response.json();
                    let nationalitySelect = document.getElementById("nationality_en");
                    countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

                    countries.forEach(country => {
                        let englishName = country.name.common;
                        let option = document.createElement("option");
                        option.value = englishName;
                        option.textContent = englishName;
                        nationalitySelect.appendChild(option);
                    });

                    nationalitySelect.value = "{{ old('nationality_en', $manualVisa->nationality_en) }}";
                } catch (error) {
                    console.error("Error fetching country list:", error);
                }
            }

            document.addEventListener("DOMContentLoaded", loadNationalities);
        </script>
    @endpush
@endsection
