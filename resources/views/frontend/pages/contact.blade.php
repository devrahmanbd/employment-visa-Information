@extends('frontend.app')

@section('content')
   
    <div class="">
        <div class="py-3">
            <h3 class="text-center">Ministries and Government Bodies</h3>
        </div>
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Fax</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    @if ($contact->type == 'Ministries and Government')
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->telephone }}</td>
                            <td>{{ $contact->fax }}</td>
                            <td><a href="mailto:{{ $contact->email }}" class="text-decoration-none">{{ $contact->email }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="">
        <div class="py-3">
            <h3 class="text-center">State Organization and Authorities</h3>
        </div>
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Fax</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    @if ($contact->type == 'State Organization')
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->telephone }}</td>
                            <td>{{ $contact->fax }}</td>
                            <td><a href="mailto:{{ $contact->email }}"
                                    class="text-decoration-none">{{ $contact->email }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
