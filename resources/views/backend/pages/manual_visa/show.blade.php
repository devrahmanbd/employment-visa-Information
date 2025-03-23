@extends('backend.admin')

@section('content')
    @push('styles')
    @endpush
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                {{-- Manual Visa Details ,passport_no ,dob ,nationality_en,pdf_file --}}
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title m-0"><i class="fas fa-passport"></i> Manual Visa Details</h3>
                        <a href="{{ route('admin.admin-manual-visas.index') }}" class="btn btn-success float-right">
                            <i class="fas fa-passport"></i> Back to Visa List </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Passport Number</label>
                                    <p>{{ $manual_visa->passport_no }}</p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Date of Birth</label>
                                    <p>{{ $manual_visa->dob }}</p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Nationality</label>
                                    <p>{{ $manual_visa->nationality_en }}</p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Visa PDF File</label>
                                    <a href="{{ route('admin.manual-visa-download', $manual_visa->id) }}" target="_blank">
                                        <i class="fas fa-download"></i> Download PDF
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 mt-3">
                                    <label>PDF Preview</label>
                                    <embed src="{{ asset($manual_visa->pdf_file) }}" type="application/pdf" width="100%"
                                        height="400px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
