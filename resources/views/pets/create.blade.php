@extends('layouts.app')

@section('content')
<h1>Add New Pet</h1>
<form action="{{ route('pets.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    @error('name') <p>{{ $message }}</p> @enderror

    <label for="species">Species:</label>
    <input type="text" name="species" id="species" value="{{ old('species') }}" required>
    @error('species') <p>{{ $message }}</p> @enderror

    <label for="owner_id">Owner:</label>
    <select name="owner_id" id="owner_id" required>
        <option value="">Select Owner</option>
        @foreach ($owners as $owner)
        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
        @endforeach
    </select>
    @error('owner_id') <p>{{ $message }}</p> @enderror

    <button type="submit">Add Pet</button>
</form>
@endsection