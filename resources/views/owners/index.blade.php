@extends('layouts.app')

@section('content')
<h1>Owners</h1>
<a href="{{ route('owners.create') }}">Add New Owner</a>

@if (session('success'))
<p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Contact Info</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($owners as $owner)
        <tr>
            <td>{{ $owner->name }}</td>
            <td>{{ $owner->contact_info }}</td>
            <td>
                <a href="{{ route('owners.edit', $owner->id) }}">Edit</a>
                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection