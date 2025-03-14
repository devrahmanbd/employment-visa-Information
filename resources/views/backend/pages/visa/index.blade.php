@extends('backend.admin')

@section('title', 'Visa List')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h3 class="card-title m-0"><i class="fas fa-passport"></i> Visa List</h3>
                <a href="{{ route('admin.visas.create') }}" class="btn btn-success float-right">
                    <i class="fas fa-passport"></i> Add Visa
                </a>
            </div>

            <div class="card-body">
                <table id="visaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Visa Number</th>
                            <th>Visa Type</th>
                            <th>Holder Name</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visas as $key => $visa)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $visa->visa_number }}</td>
                                <td>{{ $visa->visa_type_en }}</td>
                                <td>{{ $visa->full_name_en }}</td>
                                <td>{{ $visa->issue_date }}</td>
                                <td>{{ $visa->expiry_date }}</td>
                                <td>
                                    <a href="{{ route('admin.visas.edit', $visa->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                        <a href="{{ route('admin.visas.show', $visa->id) }}" class="btn btn-info btn-sm">Show</a>
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
