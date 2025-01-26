@extends('layouts.app')

@section('content')
<h1>Pets</h1>
<a href="{{ route('pets.create') }}">Add New Pet</a>

@if (session('success'))
<p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Species</th>
            <th>Owner</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pets as $pet)
        <tr>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->species }}</td>
            <td>{{ $pet->owner->name }}</td>
            <td>
                <a href="{{ route('pets.edit', $pet->id) }}">Edit</a>
                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
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