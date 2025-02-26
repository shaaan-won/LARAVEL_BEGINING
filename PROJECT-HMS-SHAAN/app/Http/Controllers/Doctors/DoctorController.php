<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Doctors\Doctor;
use App\Models\Status;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('pages.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::all();
        return view('pages.doctors.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // print_r($request->all());
    // Validate the incoming request data
    $request->validate([
        'user_id' => 'required',
        'name' => 'required|max:255 |unique:doctors,name',
        'date_of_birth' => 'required|date',
        'department_id' => 'nullable|exists:departments,id',
        'specialization' => 'required|max:255',
        'experience' => 'required|integer',
        'contact_number' => 'required|max:20',
        'email' => 'required|max:255',
        'address' => 'required',
        'gender' => 'required|in:Male,Female,Other',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for the image
        'qualification' => 'required|string|max:255',
        'registration_no' => 'required|string|max:255',
        'consultation_fee' => 'required|integer',
        'status_id' => 'required',
    ]);

    // Create a new Doctor instance
    $doctor = new Doctor();
    $doctor->user_id = $request->input('user_id');
    $doctor->name = $request->input('name');
    $doctor->date_of_birth = $request->input('date_of_birth');
    $doctor->department_id = $request->input('department_id');
    $doctor->specialization = $request->input('specialization');
    $doctor->experience = $request->input('experience');
    $doctor->contact_number = $request->input('contact_number');
    $doctor->email = $request->input('email');
    $doctor->address = $request->input('address');
    $doctor->gender = $request->input('gender');
    $doctor->qualification = $request->input('qualification');
    $doctor->registration_no = $request->input('registration_no');
    $doctor->bio = $request->input('bio');
    $doctor->consultation_fee = $request->input('consultation_fee');
    $doctor->status_id = $request->input('status_id');

    // Handle the image upload
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = $doctor->name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/doctors'), $imageName);
        $doctor->photo = $imageName;
    }

    // print_r($doctor-> toArray());

    // // Save the doctor to the database
    $success = $doctor->save();

    if ($success) {
        return redirect('/doctors')->with('success', 'Doctor created successfully.');
    } else {
        return redirect('/doctors')->with('error', 'Doctor creation failed.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('pages.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('pages.doctors.update', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        // print_r($request->all());
        $request->validate([
            'user_id' => 'required',
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
            'specialization' => 'required|max:255',
            'experience' => 'required|integer',
            'contact_number' => 'required|max:20',
            'email' => 'required|max:255',
            'address' => 'required',
            'gender' => 'required|in:Male,Female,Other',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for the image
            'qualification' => 'required|string|max:255',
            'registration_no' => 'required|string|max:255',
            'consultation_fee' => 'required|integer',
            'status_id' => 'required',
        ]);

        $doctor = Doctor::find($doctor->id);
        $doctor->user_id = $request->input('user_id');
        $doctor->name = $request->input('name');
        $doctor->date_of_birth = $request->input('date_of_birth');
        $doctor->department_id = $request->input('department_id');
        $doctor->specialization = $request->input('specialization');
        $doctor->experience = $request->input('experience');
        $doctor->contact_number = $request->input('contact_number');
        $doctor->email = $request->input('email');
        $doctor->address = $request->input('address');
        $doctor->gender = $request->input('gender');
        $doctor->qualification = $request->input('qualification');
        $doctor->registration_no = $request->input('registration_no');
        $doctor->bio = $request->input('bio');
        $doctor->consultation_fee = $request->input('consultation_fee');
        $doctor->status_id = $request->input('status_id');

        // Handle the image upload
        //use the handleFileUpload method to prevent code duplication
        // function handleFileUpload($request, $fileKey, $destinationPath, $doctor, $attribute)
        // {
        //     if ($request->hasFile($fileKey)) {
        //         $file = $request->file($fileKey);
        //         $fileName = $doctor->name . '.' . $file->getClientOriginalExtension();
        //         $file->move(public_path($destinationPath), $fileName);
        //         $doctor->$attribute = $fileName;
        //     }
        // }

        // handleFileUpload($request, 'photo', 'img/doctors', $doctor, 'photo');

        // useing uplink method to prevent code duplication
        if ($request->hasFile('photo')) {

            if (file_exists(public_path('img/doctors/' . $doctor->photo))) {
                unlink(public_path('img/doctors/' . $doctor->photo));
            }

            $image = $request->file('photo');
            $imageName = $doctor->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/doctors'), $imageName);
            $doctor->photo = $imageName;
        }


        // Save the updated doctor to the database
        $success = $doctor->update();

        if ($success) {
            return redirect('/doctors')->with('success', 'Doctor updated successfully.');
        } else {
            return redirect('/doctors')->with('error', 'Doctor update failed.');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.delete', compact('doctor'));
    }
    public function destroy(Doctor $doctor)
    {
        $success = $doctor->delete();
        if ($success) {
            return redirect('/doctors')->with('success', 'Doctor deleted successfully.');
        } else {
            return redirect('/doctors')->with('error', 'Doctor deleted failed.');
        }
    }


    // Consultations review and finalize
    // Show test results for a consultation
    public function reviewTestResults($consultationId) {
        $consultation = Consultation::with('appointment.patient', 'labTests.labTest')->findOrFail($consultationId);

        return view('pages.doctors.review', compact('consultation'));
    }

    // Finalize consultation with prescription
    public function finalizeConsultation(Request $request, $consultationId) {
        $request->validate([
            'prescription' => 'required|string',
        ]);

        $consultation = Consultation::findOrFail($consultationId);
        $consultation->update([
            'prescription' => $request->prescription,
        ]);

        return redirect()->route('doctor.review', $consultationId)->with('success', 'Consultation finalized.');
    }
}
