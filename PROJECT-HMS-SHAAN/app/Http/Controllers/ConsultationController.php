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
		return view("pages.erp.consultation.index", ["consultations" => $consultations]);
	}
	public function create()
	{
		return view("pages.erp.consultation.create", []);
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
		return view("pages.erp.consultation.show", ["consultation" => $consultation]);
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

	// Consultation Controller
	
	// Show consultation form
	public function showConsultationForm($appointmentId)
	{
		$appointment = Appointment::with('patient', 'doctor')->findOrFail($appointmentId);
		$labTests = LabTest::all(); // Fetch available lab tests

		return view('pages.erp.consultation.consultation', compact('appointment', 'labTests'));
	}

	// Store Consultation Data
	public function storeConsultation(Request $request, $appointmentId)
	{
		$request->validate([
			'symptoms' => 'required|string',
			'diagnosis' => 'required|string',
			'prescription' => 'nullable|string',
			'consultation_notes' => 'nullable|string',
			'lab_tests' => 'array', // Optional lab tests
		]);

		$consultation = Consultation::create([
			'appointment_id' => $appointmentId,
			'symptoms' => $request->symptoms,
			'diagnosis' => $request->diagnosis,
			'prescription' => $request->prescription,
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
			return redirect()->back()->with('success', 'Lab tests ordered successfully.');
		}

		return redirect()->route('consultations', $appointmentId)->with('success', 'Consultation saved successfully.');
	}
}
