<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appoitment = Appointment::all();
        return response()->json($appoitment);
    }

    public function  findPatient($id)
    {
        $appointments = Appointment::where('patient_id', $id)->get();
        $completed = $appointments->where('status_id', '5');
        $ongoing = $appointments->where('status_id', '4'); // Adjust according to your status
        $approved = $appointments->where('status_id', '3');
        return response()->json([
            'completed' => $completed,
            'ongoing' => $ongoing,
            'approved' => $approved
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
