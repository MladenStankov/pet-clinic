@extends('layouts.app')

@section('content')
<h1>Schedule Appointment</h1>
<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <label for="date">Date:</label>
    <input type="datetime-local" name="date" id="date" value="{{ old('date') }}" required>
    @error('date') <p>{{ $message }}</p> @enderror

    <label for="pet_id">Pet:</label>
    <select name="pet_id" id="pet_id" required>
        <option value="">Select Pet</option>
        @foreach ($pets as $pet)
        <option value="{{ $pet->id }}">{{ $pet->name }}</option>
        @endforeach
    </select>
    @error('pet_id') <p>{{ $message }}</p> @enderror

    <label for="reason">Reason:</label>
    <textarea name="reason" id="reason" required>{{ old('reason') }}</textarea>
    @error('reason') <p>{{ $message }}</p> @enderror

    <button type="submit">Schedule Appointment</button>
</form>
@endsection