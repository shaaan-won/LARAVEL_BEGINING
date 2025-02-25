<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctors\Doctor;
use Illuminate\Http\Request;

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

    public function index(Request $request) {

        $doctors = Doctor::all();
    
        // Get doctor appointments
        $appointments = Appointment::get();
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
    

    public function updatebydoctor($id) {
        $appointment = Appointment::findOrFail($id);
    
        // Ensure only the doctor assigned to the appointment can update it
        if (!auth()) {
            return back()->with('error', 'Unauthorized action.');
        }
    
        $appointment->update(['status_id' => '5']); // Assuming status ID for "Completed"
        return back()->with('success', 'Appointment status updated.');
    }
    
}
