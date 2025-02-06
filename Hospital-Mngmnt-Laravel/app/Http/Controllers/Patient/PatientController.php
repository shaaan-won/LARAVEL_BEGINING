<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('pages.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->all());  
        $request->validate([
            'user_name' => 'required',
            'name' => 'required|unique:hms_patients,name',
            'date_of_birth' => 'required|date',
            'email' => 'required',
            'contact_number' => 'required|numeric',
            'emergency_contact' => 'required|numeric',
            'address' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'insurance_provider' => 'required',
            'insurance_number' => 'required',
            'terms' => 'required',
        ]);

        $patient = new Patient();
        $patient->user_id = $request->input('user_name');
        $patient->name = $request->input('name');
        $patient->date_of_birth = $request->input('date_of_birth');
        $patient->email = $request->input('email');
        $patient->contact_number = $request->input('contact_number');
        $patient->emergency_contact = $request->input('emergency_contact');
        $patient->address = $request->input('address');
        $patient->gender = $request->input('gender');
        $patient->blood_group = $request->input('blood_group');
        $patient->insurance_provider = $request->input('insurance_provider');
        $patient->insurance_number = $request->input('insurance_number');
        // $patient->terms = $request->input('terms');
        // print_r($patient->toArray());

        $success =  $patient->save();
        if ($success) {
            return redirect('/patients')->with('success', 'Patient created successfully.');
        } else {
            return redirect('/patients')->with('error', 'Patient created failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('pages.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('pages.patients.update', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        // print_r($request->all());  
        $request->validate([
            'user_name' => 'required',
            // 'name' => 'required|unique:hms_patients,name',
            'date_of_birth' => 'required|date',
            'email' => 'required',
            'contact_number' => 'required|numeric',
            'emergency_contact' => 'required|numeric',
            'address' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'insurance_provider' => 'required',
            'insurance_number' => 'required',
            'terms' => 'required',
        ]);

        $patient = new Patient();
        $patient->user_id = $request->input('user_name');
        $patient->name = $request->input('name');
        $patient->date_of_birth = $request->input('date_of_birth');
        $patient->email = $request->input('email');
        $patient->contact_number = $request->input('contact_number');
        $patient->emergency_contact = $request->input('emergency_contact');
        $patient->address = $request->input('address');
        $patient->gender = $request->input('gender');
        $patient->blood_group = $request->input('blood_group');
        $patient->insurance_provider = $request->input('insurance_provider');
        $patient->insurance_number = $request->input('insurance_number');
        // $patient->terms = $request->input('terms');
        // print_r($patient->toArray());

        $success =  $patient->save();
        if ($success) {
            return redirect('/patients')->with('success', 'Patient Updated successfully.');
        } else {
            return redirect('/patients')->with('error', 'Patient Updated failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return redirect('/patients')->with('error', 'Patient record not found.');
        }
        return view('pages.patients.delete', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        $success = $patient->delete();
        if ($success) {
            return redirect('/patients')->with('success', 'Hospital deleted successfully.');
        } else {
            return redirect('/patients')->with('error', 'Hospital deleted failed.');
        }
    }
}
