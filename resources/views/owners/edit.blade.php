@extends('layouts.app')

@section('content')
<h1>Edit Owner</h1>
<form action="{{ route('owners.update', $owner->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $owner->name }}" required>
    @error('name') <p>{{ $message }}</p> @enderror

    <label for="contact_info">Contact Info:</label>
    <input type="text" name="contact_info" id="contact_info" value="{{ $owner->contact_info }}" required>
    @error('contact_info') <p>{{ $message }}</p> @enderror

    <button type="submit">Update Owner</button>
</form>
@endsection