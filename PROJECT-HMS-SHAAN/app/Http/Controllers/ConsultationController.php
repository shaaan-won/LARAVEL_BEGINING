<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\ConsultationLabTest;
use App\Models\LabTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ConsultationController extends Controller
{
	public function index()
	{
		$consultations = Consultation::all();
		return view ("pages.erp.consultation.index", ["consultations" => $consultations]);
	}
	public function create()
	{
		return view ("pages.erp.consultation.create", []);
	}
	public function store(Request $request)
	{
		//Consultation::create($request->all());
		$consultation = new Consultation;
		$consultation->id = $request->id;
		$consultation->appointment_id = $request->appointment_id;
		$consultation->symptoms = $request->symptoms;
		$consultation->diagnosis = $request->diagnosis;
		$consultation->prescription = $request->prescription;
		$consultation->consultation_notes = $request->consultation_notes;
		date_default_timezone_set("Asia/Dhaka");
		$consultation->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$consultation->updated_at = date('Y-m-d H:i:s');

		$consultation->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$consultation = Consultation::find($id);
		return view ("pages.erp.consultation.show", ["consultation" => $consultation]);
	}
	public function edit(Consultation $consultation)
	{
		return view("pages.erp.consultation.edit", ["consultation" => $consultation,]);
	}
	public function update(Request $request, Consultation $consultation)
	{
		//Consultation::update($request->all());
		$consultation = Consultation::find($consultation->id);
		$consultation->id = $request->id;
		$consultation->appointment_id = $request->appointment_id;
		$consultation->symptoms = $request->symptoms;
		$consultation->diagnosis = $request->diagnosis;
		$consultation->prescription = $request->prescription;
		$consultation->consultation_notes = $request->consultation_notes;
		date_default_timezone_set("Asia/Dhaka");
		$consultation->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$consultation->updated_at = date('Y-m-d H:i:s');

		$consultation->save();

		return redirect()->route("consultations.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Consultation $consultation)
	{
		$consultation->delete();
		return redirect()->route("consultations.index")->with('success', 'Deleted Successfully.');
	}

	// Consultation Controller End

	// Show consultation form for doctor
	public function showConsultationForm($appointmentId, Consultation $consultation)
	{
		$appointment = Appointment::with('patient', 'doctor')->findOrFail($appointmentId);
		$consultation = Consultation::where('appointment_id', $appointmentId)->first();
		// print_r(in_array($appointmentId, $consultation));
		// print_r($appointmentId);
		// echo json_encode($consultation->symptoms);
		// $existingSymptoms = $consultation ? json_decode($consultation->symptoms, true) : [];
		$labTests = LabTest::all(); // Fetch available lab tests

		return view('pages.erp.consultation.consultation', compact('appointment', 'labTests', 'consultation'));
	}

	// Store Consultation Data
	// public function storeConsultation(Request $request, $appointmentId)
	// {
	// 	// print_r($request->all());
	// 	$request->validate([
	// 		'symptoms' => 'required|string',
	// 		'diagnosis' => 'required|string',
	// 		'prescription' => 'nullable|string',
	// 		'consultation_notes' => 'nullable|string',
	// 		'lab_tests' => 'array', // Optional lab tests
	// 	]);

	// 	$consultation = Consultation::create([
	// 		'appointment_id' => $appointmentId,
	// 		'symptoms' => $request->symptoms,
	// 		'diagnosis' => $request->diagnosis,
	// 		'prescription' => $request->prescription,
	// 		'consultation_notes' => $request->consultation_notes,
	// 	]);

	// 	// If lab tests are selected, assign them to the consultation
	// 	if ($request->has('lab_tests')) {
	// 		foreach ($request->lab_tests as $labTestId) {
	// 			ConsultationLabTest::create([
	// 				'consultation_id' => $consultation->id,
	// 				'lab_test_id' => $labTestId,
	// 				'lab_test_result' => null, // No result yet
	// 			]);
	// 		}
	// 		$appointment = Appointment::findOrFail($appointmentId);
	// 		$appointment->status_id = 9; // Completed Status
	// 		$appointment->save();
	// 		return redirect()->back()->with('success', 'Lab tests ordered successfully.');
	// 	}

	// 	// return redirect('/doctor/appointments')->with('success', 'Consultation saved successfully.');
	// 	return redirect('/doctor/appointments/updatebydoctor/{ $appointmentId}')->with('success', 'Consultation saved successfully.');
	// }

	public function storeConsultation(Request $request, $appointmentId)
	{
		$request->validate([
			'symptoms' => 'required|array',
			'diagnosis' => 'required|string',
			'prescription' => 'nullable|array',
			'consultation_notes' => 'nullable|string',
			'lab_tests' => 'array', // Optional lab tests
		]);
		$diagnosis = $request->has(!'lab_tests') ? $request->diagnosis : '';
		$consultation = Consultation::create([
			'appointment_id' => $appointmentId,
			'symptoms' => json_encode($request->symptoms), // Store as JSON
			'diagnosis' => $diagnosis,
			'prescription' => json_encode($request->prescription), // Store as JSON
			'consultation_notes' => $request->consultation_notes,
		]);

		// If lab tests are selected, assign them to the consultation
		if ($request->has('lab_tests')) {
			foreach ($request->lab_tests as $labTestId) {
				ConsultationLabTest::create([
					'consultation_id' => $consultation->id,
					'lab_test_id' => $labTestId,
					'lab_test_result' => null, // No result yet
				]);
			}

			$appointment = Appointment::findOrFail($appointmentId);
			$appointment->status_id = 9; // processing Status
			$appointment->save();

			return redirect()->route('doctor.appointments.index')
			   ->with('success', 'Lab tests ordered successfully.');
		}

		$appointment = Appointment::findOrFail($appointmentId);
		$appointment->status_id = 5; // Completed Status
		$appointment->save();

		return redirect()->route('doctor.appointments.index')
			->with('success', 'Consultation saved successfully.');
	}
}
