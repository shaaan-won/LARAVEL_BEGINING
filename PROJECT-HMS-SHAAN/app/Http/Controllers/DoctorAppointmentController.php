<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctors\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentController extends Controller
{
    // public function index(Request $request) {
    //     // Get doctor appointments
    //     $doctor = auth()->user(); // Assuming doctor is logged in
    //     $appointments = Appointment::where('doctor_id', $doctor->id);

    //     // Filter by appointment status (Pending or Completed)
    //     if ($request->has('status_id')) {
    //         $appointments = $appointments->where('status_id', $request->status_id);
    //     }

    //     $appointments = $appointments->get(); // Fetch filtered appointments

    //     return view('pages.erp.appointment.doctorappointment', compact('appointments'));
    // }

    public function index(Request $request)
    {

        $doctors = Doctor::all();

        // Get doctor appointments
        switch (Auth::user()->role_id) {
            case 3: // Doctor
                $appointments = Appointment::where('doctor_id', Auth::user()->id)
                    ->whereIn('status_id', [3, 4])
                    ->get();
                break;
 
            case 2: // Admin
            case 1: // Superadmin
                $appointments = Appointment::all();
                break;

            default:
                $appointments = collect (); // Empty collection for unauthorized users
                break;
        }
        
        // print_r($appointments);

        // Filter by appointment status (if selected)
        if ($request->has('status_id') && $request->status_id != '') {
            $appointments = $appointments->where('status_id', $request->status_id);
        }

        // Filter by doctor (if selected)
        if ($request->has('doctor_id') && $request->doctor_id != '') {
            $appointments = $appointments->where('doctor_id', $request->doctor_id);
        }

        // $appointments = $appointments->get(); // Fetch filtered appointments

        return view('pages.erp.appointment.doctorappointment', compact('appointments', 'doctors'));
    }


    public function updatebydoctor($id)
    {
        $appointment = Appointment::findOrFail($id);

        // Ensure only the doctor assigned to the appointment can update it
        if (!auth()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $appointment->update(['status_id' => '5']); // Assuming status ID for "Completed"
        return back()->with('success', 'Appointment status updated.');
    }
    public function cancelbydoctor(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        // Ensure the user is authenticated
        if (!auth()) {
            return back()->with('error', 'Unauthorized action.');
        }

        // Ensure only the assigned doctor can cancel the appointment
        // if (auth()->user()->id !== $appointment->doctor_id) {
        //     return back()->with('error', 'You are not authorized to cancel this appointment.');
        // }

        // Validate cancellation reason
        $request->validate([
            'cancellation_reason' => 'required|string|max:255',
        ]);

        // Update appointment status and add cancellation reason
        $appointment->update([
            'status_id' => 6, // Consider replacing with a constant or config
            'cancellation_reason' => $request->cancellation_reason ?? 'ooooooooo',
        ]);

        return back()->with('success', 'Appointment has been cancelled successfully.');
    }
}
