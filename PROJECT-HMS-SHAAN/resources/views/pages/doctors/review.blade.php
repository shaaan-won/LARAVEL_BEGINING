@extends('layout.erp.app')

@section('page')
<div class="container">
    <h2>Review Test Results & Finalize Consultation</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Patient Information</h4>
    <p><strong>Name:</strong> {{ $consultation->appointment->patient->name }}</p>

    <h4>Lab Test Results</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Test Name</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultation->labTests as $test)
                <tr>
                    <td>{{ $test->labTest->name }}</td>
                    <td>{{ $test->lab_test_result ?? 'Pending' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Finalize Consultation</h4>
    <form action="{{ route('doctor.finalize', $consultation->id) }}" method="POST">
        @csrf
        <label>Final Prescription</label>
        <textarea name="prescription" class="form-control" required>{{ $consultation->prescription }}</textarea>
        <button type="submit" class="btn btn-primary mt-2">Finalize Consultation</button>
    </form>
</div>
@endsection
