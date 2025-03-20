<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // public function store(Request $request)
    // {
    //     // Validate input data
    //     $request->validate ([
    //         'uname' => 'required|string|max:255',
    //         'uemail' => 'nullable|email|max:255',
    //         'unumber' => 'required|string|max:20',
    //         'gender' => 'required|in:male,female,other',
    //         'udate' => 'required|date',
    //         'utime' => 'required',
    //         'udepartment' => 'nullable|exists:departments,id',
    //         'udoctor' => 'required|exists:doctors,id',
    //         'umsg' => 'nullable|string|max:500',
    //     ]);
    //     //Store the patient
    //     $patient = Patient::create([
    //         'user_id' => 1,
    //         'name' => $request->uname,
    //         'email' => $request->uemail,
    //         'gender' => $request->gender,
    //         'contact_number' => $request->unumber
    //     ]);

    //     // Store the appointment
    //     $appointment = Appointment::create([
    //         'patient_id' => $patient->id,
    //         'doctor_id' => $request->udoctor,
    //         'appointment_date' => $request->udate,
    //         'appointment_time' => $request->utime,
    //         'status_id' => 4,
    //         'cancellation_reason' => $request->umsg,
    //     ]);

    //     if ($appointment) {
    //         return response()->json(['message' => 'Appointment created successfully'], 201);
    //     } else {
    //         return response()->json(['message' => 'Failed to create appointment'], 500);
    //     }
    // }

    public function store(Request $request)
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'uname' => 'required|string|max:255',
                'uemail' => 'nullable|email|max:255',
                'unumber' => 'required|string|max:20',
                'gender' => 'required|in:male,female,other',
                'udate' => 'required|date',
                'utime' => 'required',
                'udepartment' => 'nullable|exists:departments,id',
                'udoctor' => 'required|exists:doctors,id',
                'umsg' => 'nullable|string|max:500',
            ]);

            // Start database transaction
            DB::beginTransaction();

            // Store the patient
            $patient = Patient::create([
                'user_id' => 1, // Ensure this user exists or make dynamic
                'name' => $validatedData['uname'],
                'email' => $validatedData['uemail'] ?? null, // Handle nullable email
                'gender' => $validatedData['gender'],
                'contact_number' => $validatedData['unumber'],
            ]);

            if (!$patient) {
                DB::rollBack();
                return response()->json(['message' => 'Failed to create patient'], 500);
            }

            // Store the appointment
            $appointment = Appointment::create([
                'patient_id' => $patient->id,
                'doctor_id' => $validatedData['udoctor'],
                'appointment_date' => $validatedData['udate'],
                'appointment_time' => $validatedData['utime'],
                'status_id' => 4, // Ensure this status exists in the statuses table
                'cancellation_reason' => $validatedData['umsg'] ?? null,
            ]);

            if (!$appointment) {
                DB::rollBack();
                return response()->json(['message' => 'Failed to create appointment'], 500);
            }

            // Commit the transaction if everything is successful
            DB::commit();

            return response()->json(['message' => 'Appointment created successfully'], 201);
        } catch (\Exception $e) {
            // Rollback in case of any failure
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
