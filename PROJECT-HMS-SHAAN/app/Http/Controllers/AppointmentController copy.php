<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\DoctorAvailability;
use App\Models\Doctors\Doctor;
use App\Models\Patient\Patient;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AppointmentController extends Controller
{
	public function index()
	{
		$appointments = Appointment::all();
		return view("pages.erp.appointment.index", ["appointments" => $appointments]);
	}
	// public function create(){
	// 	return view("pages.erp.appointment.create",["status"=>Status::all()]);
	// }
	public function create()
	{
		$patients = Patient::all();
		$doctors = Doctor::all();
		$status = Status::all();
		$users = User::all();
		$departments = Department::all();
		$doctoravailability = DoctorAvailability::all();
		return view('pages.erp.appointment.create', compact('doctors', 'status', 'users', 'patients', 'departments', 'doctoravailability'));
	}
	// public function store(Request $request){
	// 	//Appointment::create($request->all());
	// 	$appointment = new Appointment;
	// 	$appointment->id=$request->id;
	// 	$appointment->doctor_id=$request->doctor_id;
	// 	$appointment->patient_id=$request->patient_id;
	// 	$appointment->appointment_date=$request->appointment_date;
	// 	$appointment->appointment_time=$request->appointment_time;
	// 	$appointment->status_id=$request->status_id;
	// 	$appointment->cancellation_reason=$request->cancellation_reason;
	// 	date_default_timezone_set("Asia/Dhaka");
	// 	$appointment->created_at=date('Y-m-d H:i:s');
	// 	date_default_timezone_set("Asia/Dhaka");
	// 	$appointment->updated_at=date('Y-m-d H:i:s');

	// 	$appointment->save();

	// 	return back()->with('success', 'Created Successfully.');
	// }

	//Last one
	// public function store(Request $request)
	// {	
	// 	// print_r($request->all());
	// 	// $patient_id = Patient::latest()->last()->id;
	// 	// print_r($patient_id);
	// 	$request->validate([
	// 		'department_id' => 'required|exists:departments,id',
	// 		'doctor_id' => 'required|exists:doctors,id',
	// 		'patient_id' => 'nullable|exists:patients,id',
	// 		'appointment_date' => 'required|date|after_or_equal:today',
	// 		'appointment_time' => 'required',
	// 		// Validation for walk-in patient details if patient_id is null
	// 		'walking_user_name' => 'required_if:patient_id,null',
	// 		'walking_name' => 'required_if:patient_id,null|string|max:255',
	// 		'walking_date_of_birth' => 'required_if:patient_id,null|date',
	// 		'walking_email' => 'required_if:patient_id,null',
	// 		'walking_contact_number' => 'required_if:patient_id,null',
	// 		'walking_emergency_contact' => 'required_if:patient_id,null',
	// 		'walking_address' => 'required_if:patient_id,null',
	// 		'walking_gender' => 'required_if:patient_id,null',
	// 		'walking_blood_group' => 'required_if:patient_id,null',
	// 	]);
	// 	print_r($request->all());
	// 	$patient_id = $request->patient_id;
	// 	print_r($patient_id);

	// 	// If patient_id is null, create a walk-in patient
	// 	// if (!$request->patient_id) {
	// 	// 	$patient = new Patient;
	// 	// 	$patient->user_id = $request->walking_user_name;
	// 	// 	$patient->name = $request->walking_name;
	// 	// 	$patient->date_of_birth = $request->walking_date_of_birth;
	// 	// 	$patient->email = $request->walking_email;
	// 	// 	$patient->contact_number = $request->walking_contact_number;
	// 	// 	$patient->emergency_contact = $request->walking_emergency_contact;
	// 	// 	$patient->address = $request->walking_address;
	// 	// 	$patient->gender = $request->walking_gender;
	// 	// 	$patient->blood_group = $request->walking_blood_group;
	// 	// 	$patient = $patient->save();
	// 	// 	if ($patient) {
	// 	// 		$patient_id = Patient::latest()->first()->id;
	// 	// 	}
	// 	// } else {
	// 	// 	$patient_id = $request->patient_id;
	// 	// }

	// 	// // print_r($request->all());
	// 	// $selectedDate = $request->appointment_date;
	// 	// $selectedTime = $request->appointment_time;
	// 	// $doctorId = $request->doctor_id;

	// 	// // Convert the selected date into a day name (e.g., "Monday")
	// 	// $selectedDay = Carbon::parse($selectedDate)->format('l');

	// 	// // Fetch the doctor's available days
	// 	// $doctorAvailability = DoctorAvailability::where('doctor_id', $doctorId)
	// 	// 	->where('day', $selectedDay)
	// 	// 	->first();

	// 	// if (!$doctorAvailability) {
	// 	// 	return back()->with('error', "Doctor is not available on {$selectedDay}.");
	// 	// }

	// 	// // Ensure the appointment time falls within the doctor's working hours
	// 	// if (
	// 	// 	$selectedTime < $doctorAvailability->start_time ||
	// 	// 	$selectedTime > $doctorAvailability->end_time
	// 	// ) {
	// 	// 	return back()->with('error', "Doctor is available from {$doctorAvailability->start_time} to {$doctorAvailability->end_time}.");
	// 	// }

	// 	// // Ensure the appointment date is within the next 15 days
	// 	// $today = now()->toDateString();
	// 	// $DaysLater = now()->addDays(15)->toDateString();

	// 	// if ($selectedDate < $today || $selectedDate > $DaysLater) {
	// 	// 	return back()->with('error', 'Appointments can only be booked within the next 7 days.');
	// 	// }

	// 	// // Check for conflicts within 30 minutes
	// 	// $existingAppointment = Appointment::where('doctor_id', $doctorId)
	// 	// 	->where('appointment_date', $selectedDate)
	// 	// 	->where(function ($query) use ($selectedTime) {
	// 	// 		$query->whereBetween('appointment_time', [
	// 	// 			date('H:i:s', strtotime($selectedTime) - 1800), // 30 mins before
	// 	// 			date('H:i:s', strtotime($selectedTime) + 1800)  // 30 mins after
	// 	// 		]);
	// 	// 	})
	// 	// 	->exists();

	// 	// if ($existingAppointment) {
	// 	// 	return back()->with('error', 'Doctor is not available within 30 minutes of this time.');
	// 	// }

	// 	// // Create appointment if all conditions are met
	// 	// $appointment = new Appointment;
	// 	// $appointment->doctor_id = $doctorId;
	// 	// $appointment->patient_id = $patient_id;
	// 	// $appointment->appointment_date = $selectedDate;
	// 	// $appointment->appointment_time = $selectedTime;
	// 	// $appointment->status_id = 1;
	// 	// $appointment->cancellation_reason='';
	// 	// date_default_timezone_set("Asia/Dhaka");
	// 	// $appointment->created_at=date('Y-m-d H:i:s');
	// 	// date_default_timezone_set("Asia/Dhaka");
	// 	// $appointment->updated_at=date('Y-m-d H:i:s');
	// 	// $appointment = $appointment->save();

	// 	// if ($appointment) {
	// 	// 	return redirect()->route("appointments.index")->with('success', 'Created Successfully.');
	// 	// }else{
	// 	// 	return back()->with('error', 'Something went wrong.');
	// 	// }
	// }

	// New one



	public function store(Request $request)
	{
		// Debugging: Check incoming request data
		// dd($request->all());

		// $validated = $request->validate([
		$request->validate([
			'department_id' => 'required|exists:departments,id',
			'doctor_id' => 'required|exists:doctors,id',
			'patient_id' => 'nullable|integer|exists:patients,id',
			'appointment_date' => 'required|date|after_or_equal:today',
			'appointment_time' => 'required|date_format:H:i',

			// Require walk-in details if patient_id is not provided
			'walking_user_name' => 'required_without:patient_id',
			'walking_name' => 'required_without:patient_id',
			'walking_date_of_birth' => 'required_without:patient_id',
			'walking_email' => 'required_without:patient_id',
			'walking_contact_number' => 'required_without:patient_id',
			'walking_emergency_contact' => 'required_without:patient_id',
			'walking_address' => 'required_without:patient_id',
			'walking_gender' => 'required_without:patient_id',
			'walking_blood_group' => 'required_without:patient_id',
		]);

		// If validation fails, you will not get here.
		// dd('Validation Passed', $validated);

		//if patient is registerd then patient_id is not null
		$patient_id = $request->patient_id;

		$selectedDate = $request->appointment_date;
		$selectedTime = $request->appointment_time;
		$doctorId = $request->doctor_id;
		$selectedDay = Carbon::parse($selectedDate)->format('l');
		// print_r([$selectedDate, $selectedTime, $doctorId, $selectedDay]);

		// Check if the doctor is available on the selected day
		$doctorAvailability = DoctorAvailability::where('doctor_id', $doctorId)
			->whereJsonContains('day', $selectedDay)
			->first();

		// dd($doctorAvailability);
		// print_r($doctorAvailability);

		if (!$doctorAvailability) {
			return back()->with('error', "Doctor is not available on {$selectedDay}.");
		}
		// else{
		// 	echo "Doctor is available on {$selectedDay}.";
		// }

		if ($selectedTime < $doctorAvailability->start_time || $selectedTime > $doctorAvailability->end_time) {
			return back()->with('error', "Doctor is available from {$doctorAvailability->start_time} to {$doctorAvailability->end_time}.");
		}

		$DaysLater = now()->addDays(7)->toDateString();
		if ($selectedDate < now()->toDateString() || $selectedDate > $DaysLater) {
			return back()->with('error', 'Appointments can only be booked within the next 7 days.');
		}

		$selectedTimeCarbon = Carbon::parse($selectedTime);
		$existingAppointment = Appointment::where('doctor_id', $doctorId)
			->where('appointment_date', $selectedDate)
			->whereBetween('appointment_time', [
				$selectedTimeCarbon->copy()->subMinutes(30)->format('H:i:s'),
				$selectedTimeCarbon->copy()->addMinutes(30)->format('H:i:s')
			])
			->exists();

		if ($existingAppointment) {
			return back()->with('error', 'Doctor is not available within 30 minutes of this time.');
		}
		// echo "All checks passed.";
		if (!$patient_id) {
			// Create a new patient
			$patient = new Patient;
			// $patient->user_id = $request->walking_user_id;
			$patient->user_id = $request->walking_user_name;
			$patient->name = $request->walking_name;
			$patient->date_of_birth = $request->walking_date_of_birth;
			$patient->email = $request->walking_email;
			$patient->contact_number = $request->walking_contact_number;
			$patient->emergency_contact = $request->walking_emergency_contact;
			$patient->address = $request->walking_address;
			$patient->gender = $request->walking_gender;
			$patient->blood_group = $request->walking_blood_group;
			date_default_timezone_set("Asia/Dhaka");
			$patient->created_at = date('Y-m-d H:i:s');
			date_default_timezone_set("Asia/Dhaka");
			$patient->updated_at = date('Y-m-d H:i:s');
			$patient->save();

			// Get the ID from the created patient directly
			$patient_id = $patient->id;
		}
		$appointment = new Appointment;
		$appointment->doctor_id = $doctorId;
		$appointment->patient_id = $patient_id;
		$appointment->appointment_date = $selectedDate;
		$appointment->appointment_time = $selectedTime;
		$appointment->status_id = 4;
		$appointment->cancellation_reason = 'Not Applicable';
		date_default_timezone_set("Asia/Dhaka");
		$appointment->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$appointment->updated_at = date('Y-m-d H:i:s');
		$appointment = $appointment->save();

		if ($appointment) {
			return redirect()->route("appointments.index")->with('success', 'Created Successfully.');
		} else {
			return back()->with('error', 'Something went wrong.');
		}
	}

	public function show($id)
	{
		$appointment = Appointment::find($id);
		return view("pages.erp.appointment.show", ["appointment" => $appointment]);
	}
	public function edit(Appointment $appointment)
	{
		$patients = Patient::all();
		$doctors = Doctor::all();
		$status = Status::all();
		$users = User::all();
		$departments = Department::all();
		$doctoravailability = DoctorAvailability::all();
		return view('pages.erp.appointment.edit', compact('appointment', 'doctors', 'status', 'users', 'patients', 'departments', 'doctoravailability'));
		// return view("pages.erp.appointment.edit", ["appointment" => $appointment, "status" => Status::all()]);
	}
	public function update(Request $request, Appointment $appointment)
	{
		//Appointment::update($request->all());
		$appointment = Appointment::find($appointment->id);
		$appointment->id = $request->id;
		$appointment->doctor_id = $request->doctor_id;
		$appointment->patient_id = $request->patient_id;
		$appointment->appointment_date = $request->appointment_date;
		$appointment->appointment_time = $request->appointment_time;
		$appointment->status_id = $request->status_id;
		$appointment->cancellation_reason = $request->cancellation_reason;
		date_default_timezone_set("Asia/Dhaka");
		$appointment->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$appointment->updated_at = date('Y-m-d H:i:s');

		$appointment->save();

		return redirect()->route("appointments.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Appointment $appointment)
	{
		$appointment->delete();
		return redirect()->route("appointments.index")->with('success', 'Deleted Successfully.');
	}
	
	// public function updateStatus(Request $request, $id) {
	// 	$request->validate([
	// 		'status_id' => 'required'
	// 	]);

	// 	$appointment = Appointment::findOrFail($id);
	// 	$appointment->update(['status_id' => $request->status_id]);

	// 	// Notify the patient if status changes
	// 	// $appointment->patient->notify(new AppointmentStatusChangedNotification($appointment));

	// 	return redirect()->route('appointments.pending')->with('success', 'Appointment status updated.');
	// }
}
