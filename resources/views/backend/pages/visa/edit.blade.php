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
        </style>
    @endpush

    <div class="visa-form-container">
        <h2 class="text-center">Edit Visa Form</h2>

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

            <div class="section-heading">Visa Details</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label>Visa Number</label>
                    <input type="text" name="visa_number" value="{{ old('visa_number', $visa->visa_number) }}"
                        class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Visa Type In Arabic</label>
                    <input type="text" name="visa_type_ar" value="{{ old('visa_type_ar', $visa->visa_type_ar) }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Visa Issue Date</label>
                    <input type="date" name="issue_date" value="{{ old('issue_date', $visa->issue_date) }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Visa Expiry Date</label>
                    <input type="date" name="expiry_date" value="{{ old('expiry_date', $visa->expiry_date) }}"
                        class="form-control">
                </div>
            </div>

            <div class="section-heading">Visa Holder Details</div>
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
            </div>

            <div class="section-heading">Employer/Company Details</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label>Company Name (Arabic)</label>
                    <input type="text" name="company_name_ar"
                        value="{{ old('company_name_ar', $visa->company_name_ar) }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="barcode_text_up">Barcode Text (Up)</label>
                    <textarea name="barcode_text_up" id="barcode_text_up" class="form-control" rows="1">{{ old('barcode_text_up', $visa->barcode_text_up) }}</textarea>
                </div>
                <div class="col-md-12 mt-3">
                    <label for="barcode_text_down">Barcode Text (Down)</label>
                    <textarea name="barcode_text_down" id="barcode_text_down" class="form-control" rows="1">{{ old('barcode_text_down', $visa->barcode_text_down) }}</textarea>
                </div>
            </div>

            <button type="submit" class="submit-btn">Update Visa</button>
        </form>
    </div>
@endsection
