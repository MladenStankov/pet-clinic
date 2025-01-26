@extends('layouts.app')

@section('content')
<h1>Add New Owner</h1>
<form action="{{ route('owners.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    @error('name') <p>{{ $message }}</p> @enderror

    <label for="contact_info">Contact Info:</label>
    <input type="text" name="contact_info" id="contact_info" value="{{ old('contact_info') }}" required>
    @error('contact_info') <p>{{ $message }}</p> @enderror

    <button type="submit">Add Owner</button>
</form>
@endsection