<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('pet')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $pets = Pet::all();
        return view('appointments.create', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'pet_id' => 'required|exists:pets,id',
            'reason' => 'required|string|max:255',
        ]);

        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $pets = Pet::all();
        return view('appointments.edit', compact('appointment', 'pets'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'date' => 'required|date',
            'pet_id' => 'required|exists:pets,id',
            'reason' => 'required|string|max:255',
        ]);

        $appointment->update($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
