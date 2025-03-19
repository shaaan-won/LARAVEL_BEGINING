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
        // Validate input data
        // $request->validate ([
        //     'uname' => 'required|string|max:255',
        //     'uemail' => 'required|email|max:255',
        //     'unumber' => 'required|string|max:20',
        //     'udate' => 'required|date',
        //     'utime' => 'required',
        //     'udepartment' => 'required|exists:departments,id',
        //     'udoctor' => 'required|exists:doctors,id',
        //     'umsg' => 'nullable|string|max:500',
        // ]);

        // if ($request->fails()) {
        //     return response()->json(['errors' => $request->errors()], 422);
        // }

        // Store the appointment
        $appointment = Appointment::create([
            'name' => $request->uname,
            'email' => $request->uemail,
            'phone' => $request->unumber,
            'date' => $request->udate,
            'time' => $request->utime,
            'department_id' => $request->udepartment,
            'doctor_id' => $request->udoctor,
            'message' => $request->umsg,
        ]);

        return response()->json([
            'message' => 'Appointment booked successfully!',
            // 'appointment' => $appointment
        ], 201);
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
