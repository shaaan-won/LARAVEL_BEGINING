{{-- @extends('layout.erp.app')

@section('page')
<div class="container">
    <h2>Review Test Results & Finalize Consultation</h2>

    @if (session('success'))
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
            @foreach ($consultation->labTests as $test)
                <tr>
                    <td>{{ $test->labTest->name }}</td>
                    <td>{{ $test->lab_test_result ?? 'Processing' }}</td>
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
@endsection --}}


@extends('layout.erp.app')

@section('title', 'Review Test Results & Finalize Consultation')
@section('css')
@endsection
@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Review Test Results & Finalize Consultation</h3>
                        <a href="{{ url('/doctor/appointments') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success') || session('error'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                                {{ session('success') ?? session('error') }}
                            </div>
                        @endif

                        <h4 class="mb-3 text-primary fw-bold fs-3 text-uppercase text-center">Patient Information</h4>
                        <div class="card p-3 shadow-sm">
                            <div class="row fs-5">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> {{ $consultation->appointment->patient->name }}</p>
                                    <p><strong>Appointment Date:</strong> {{ $consultation->appointment->appointment_date }}
                                    </p>
                                    <p><strong>Age:</strong>
                                        {{ \Carbon\Carbon::parse($consultation->appointment->patient->date_of_birth)->age }}
                                        years</p>
                                    <p><strong>Gender:</strong> {{ $consultation->appointment->patient->gender }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Blood Group:</strong> {{ $consultation->appointment->patient->blood_group }}
                                    </p>
                                    <p><strong>Email:</strong> {{ $consultation->appointment->patient->email }}</p>
                                    <p><strong>Phone:</strong> {{ $consultation->appointment->patient->contact_number }}</p>
                                    <p><strong>Address:</strong> {{ $consultation->appointment->patient->address }}</p>
                                </div>
                            </div>
                        </div>

                        <h4 class="mb-3 text-primary fw-bold fs-3 text-uppercase text-center">Lab Test Results</h4>
                        <div class="card p-3 shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-middle">
                                    <thead class="text-white fs-3 fs-bold">
                                        <tr>
                                            <th class="py-3">Test Name</th>
                                            <th class="py-3">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-5">
                                        @foreach ($consultation->labTests as $test)
                                            <tr>
                                                <td class="py-2">{{ $test->labTest->name }}</td>
                                                {{-- <td class="py-2 text-{!! $test->lab_test_result ? 'success' : 'warning' !!}">
                                                    {{ $test->lab_test_result ?? 'Processing' }}
                                                </td> --}}
                                                {{-- <td class="py-2">
                                                    @if ($test->lab_test_result && file_exists(public_path($test->lab_test_result)))
                                                        <a href="{{ asset($test->lab_test_result) }}" target="_blank">
                                                            <i class="icofont icofont-file-pdf"></i> View Result
                                                        </a>
                                                    @elseif (!empty($test->lab_test_result) && !file_exists(public_path($test->lab_test_result)))
                                                        <span class="text-muted">{{ $test->lab_test_result }}</span>
                                                    @else
                                                        <span class="text-muted">No result available.</span>
                                                    @endif
                                                </td> --}}
                                                <td class="py-2">
                                                    @if ($test->lab_test_result && file_exists(public_path($test->lab_test_result)))
                                                        <a class="fs-5" href="javascript:void(0);" data-toggle="modal"
                                                            data-target="#resultModal"
                                                            onclick="showModal('{{ asset($test->lab_test_result) }}')">
                                                            <i class="icofont icofont-file-pdf"></i> View Result
                                                        </a>
                                                    @elseif (!empty($test->lab_test_result) && !file_exists(public_path($test->lab_test_result)))
                                                        <span class="text-muted">{{ $test->lab_test_result }}</span>
                                                    @else
                                                        <span class="text-muted">No result available.</span>
                                                    @endif
                                                </td>
                                                <!-- Modal -->
                                                <div class="modal fade" id="resultModal" tabindex="-1"
                                                    aria-labelledby="resultModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="resultModalLabel">Lab Test
                                                                    Result</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <embed id="testResultEmbed" src=""
                                                                    type="application/pdf" width="100%" height="500px">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h4 class="mb-2 mt-2 text-primary fw-bold fs-3 text-uppercase text-center">Finalize Consultation
                        </h4>
                        <form action="{{ route('doctor.finalize', $consultation->id) }}" method="POST">
                            @csrf
                            {{-- <div class="mb-3">
                                <label class="form-label">Final Prescription</label>
                                <textarea name="prescription" class="form-control" required>{{ $consultation->prescription }}</textarea>
                            </div> --}}
                            <div class="mb-3 ">
                                <label class="form-label">Prescription</label>
                                <select name="prescription[]" class="form-select select2" multiple="multiple"
                                    id="prescription">
                                    @php
                                        $medicines = json_decode(
                                            file_get_contents(public_path('assets/data/medicines/medicines.json')),
                                        );
                                    @endphp
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->name }}">
                                            {{ $medicine->name }} ({{ $medicine->strength }}) - ${{ $medicine->price }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('prescription')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Additional Notes</label>
                                <textarea name="consultation_notes" class="form-control">{{ old('consultation_notes') }}</textarea>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">Finalize Consultation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#prescription').select2({
                placeholder: "Search and select medicines",
                allowClear: true
            });
        });
    </script>
    <script>
        function showModal(resultUrl) {
            // Set the src of the modal embed to the test result PDF
            $('#testResultEmbed').attr('src', resultUrl);
        }
    </script>
@endsection
