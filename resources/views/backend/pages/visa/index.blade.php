@extends('backend.admin')

@section('title', 'Visa List')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0"><i class="fas fa-passport"></i> Visa List</h3>

                    <div class="d-flex">
                        <!-- Search Form -->
                        <form action="{{ route('admin.visas.index') }}" method="get" class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by visa number" value="{{ request()->search }}"
                                    aria-label="Search Visa">
                                <button type="submit" class="btn btn-primary input-group-append">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Add Visa Button -->
                        <a href="{{ route('admin.visas.create') }}" class="btn btn-success ms-3 ml-3">
                            <i class="fas fa-plus-circle"></i> Add Visa
                        </a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <table id="visaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Holder Name</th>
                            <th>Visa Number</th>
                            <th>Passport Number</th>
                            <th>visa Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visas as $key => $visa)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $visa->full_name_en }}</td>
                                <td>{{ $visa->visa_number }}</td>
                                <td>{{ $visa->passport_no }}</td>
                                <td>{{ \Carbon\Carbon::parse($visa->created_at)->format('Y-m-d H:i') }}</td>
                                <td>{{ $visa->expiry_date }}</td>
                                <td>
                                    <a href="{{ route('admin.visas.edit', $visa->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{ route('admin.visas.show', $visa->id) }}"
                                        class="btn btn-info btn-sm">Show</a>
                                    <a href="" target="_blank" class="btn btn-info btn-sm">Download</a>
                                    <form action="{{ route('admin.visas.destroy', $visa->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
