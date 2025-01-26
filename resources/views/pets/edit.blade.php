@extends('layouts.app')

@section('content')
<h1>Edit Pet</h1>
<form action="{{ route('pets.update', $pet->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $pet->name }}" required>
    @error('name') <p>{{ $message }}</p> @enderror

    <label for="species">Species:</label>
    <input type="text" name="species" id="species" value="{{ $pet->species }}" required>
    @error('species') <p>{{ $message }}</p> @enderror

    <label for="owner_id">Owner:</label>
    <select name="owner_id" id="owner_id" required>
        @foreach ($owners as $owner)
        <option value="{{ $owner->id }}" {{ $pet->owner_id == $owner->id ? 'selected' : '' }}>
            {{ $owner->name }}
        </option>
        @endforeach
    </select>
    @error('owner_id') <p>{{ $message }}</p> @enderror

    <button type="submit">Update Pet</button>
</form>
@endsection