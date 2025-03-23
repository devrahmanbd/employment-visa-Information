@extends('backend.admin')

@section('title', 'Visa List')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h3 class="card-title m-0"><i class="fas fa-passport"></i> Manual Visa List</h3>
                <a href="{{ route('admin.admin-manual-visas.create') }}" class="btn btn-success float-right">
                    <i class="fas fa-passport"></i> Add Manual Visa
                </a>
            </div>

            <div class="card-body">
                <table id="visaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Passport Number</th>
                            <th>Date of Birth</th>
                            <th>Nationality</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manual_visas as $key => $manual_visa)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $manual_visa->passport_no }}</td>
                                <td>{{ $manual_visa->dob }}</td>
                                <td>{{ $manual_visa->nationality_en }}</td>
                                <td>
                                    <a href="{{ route('admin.visas.edit', $manual_visa->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{ route('admin.admin-manual-visas.show', $manual_visa->id) }}"
                                        class="btn btn-info btn-sm">Show</a>

                                    <a href="{{ route('admin.manual-visa-download', $manual_visa->id) }}" target="_blank" class="btn btn-info btn-sm">
                                        </i> Download
                                    </a>
                                    <form action="{{ route('admin.visas.destroy', $manual_visa->id) }}" method="POST"
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
