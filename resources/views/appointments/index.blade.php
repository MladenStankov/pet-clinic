@extends('layouts.app')

@section('content')
<h1>Appointments</h1>
<a href="{{ route('appointments.create') }}">Schedule Appointment</a>

@if (session('success'))
<p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Pet</th>
            <th>Reason</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->pet->name }}</td>
            <td>{{ $appointment->reason }}</td>
            <td>
                <a href="{{ route('appointments.edit', $appointment->id) }}">Edit</a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
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