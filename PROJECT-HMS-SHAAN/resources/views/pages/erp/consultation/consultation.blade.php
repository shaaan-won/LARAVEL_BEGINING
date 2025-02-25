@extends('layout.erp.app')

@section('page')
<div class="container">
    <h2>Doctor Consultation</h2>

    <h4>Patient Information</h4>
    <p><strong>Name:</strong> {{ $appointment->patient->name }}</p>
    <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>

    <h4>Consultation Details</h4>
    <form action="{{ route('consultations.store', $appointment->id) }}" method="POST">
        @csrf
        <label>Symptoms</label>
        <textarea name="symptoms" class="form-control" required></textarea>

        <label>Diagnosis</label>
        <textarea name="diagnosis" class="form-control" required></textarea>

        <label>Prescription</label>
        <textarea name="prescription" class="form-control"></textarea>

        <label>Additional Notes</label>
        <textarea name="consultation_notes" class="form-control"></textarea>

        <h4 class="mt-3">Order Lab Tests (Optional)</h4>
        @foreach($labTests as $labTest)
            <div>
                <input type="checkbox" name="lab_tests[]" value="{{ $labTest->id }}">
                <label>{{ $labTest->name }} ({{ $labTest->price }} USD)</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Save Consultation</button>
    </form>
</div>
@endsection
