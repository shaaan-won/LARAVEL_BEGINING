{{-- @extends('layout.erp.app')

@section('page')
<div class="container">
    <h2>Doctor Consultation</h2>

    <h4>Patient Information</h4>
    <p><strong>Name:</strong> {{ $appointment->patient->name }}</p>
    <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
    <p><strong>Age:</strong> {{ \Carbon\Carbon::parse($appointment->patient->date_of_birth)->age }} years</p>
    <p><strong>Date of Birth:</strong> {{ $appointment->patient->date_of_birth }}</p>
    <p><strong>Gender:</strong> {{ $appointment->patient->gender }}</p>
    <p><strong>Blood Group:</strong> {{ $appointment->patient->blood_group }}</p>
    <p><strong>Email:</strong> {{ $appointment->patient->email }}</p>
    <p><strong>Phone:</strong> {{ $appointment->patient->contact_number }}</p>
    <p><strong>Address:</strong> {{ $appointment->patient->address }}</p>

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
        @foreach ($labTests as $labTest)
            <div>
                <input type="checkbox" name="lab_tests[]" value="{{ $labTest->id }}">
                <label>{{ $labTest->name }} ({{ $labTest->price }} USD)</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Save Consultation</button>
    </form>
</div>
@endsection --}}


@extends('layout.erp.app')
@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Doctor Consultation</h3>
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
                                    <p><strong>Name:</strong> {{ $appointment->patient->name }}</p>
                                    <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
                                    <p><strong>Age:</strong>
                                        {{ \Carbon\Carbon::parse($appointment->patient->date_of_birth)->age }} years</p>
                                    <p><strong>Gender:</strong> {{ $appointment->patient->gender }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Blood Group:</strong> {{ $appointment->patient->blood_group }}</p>
                                    <p><strong>Email:</strong> {{ $appointment->patient->email }}</p>
                                    <p><strong>Phone:</strong> {{ $appointment->patient->contact_number }}</p>
                                    <p><strong>Address:</strong> {{ $appointment->patient->address }}</p>
                                </div>
                            </div>
                        </div>

                        <h4 class="mb-3 text-primary fw-bold fs-3 text-uppercase text-center">Consultation Details</h4>
                        <form action="{{ route('consultations.form.store', $appointment->id) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Symptoms</label>
                                <select name="symptoms[]" class="form-select select2" multiple="multiple"
                                    id="symptomsSelect">
                                    @php
                                        $symptoms = json_decode(
                                            file_get_contents(public_path('assets/data/disease/disease.json')),
                                        );
                                    @endphp
                                    @foreach ($symptoms as $symptom)
                                        <option value="{{ $symptom->symptom }}"
                                            @if (in_array($symptom->symptom, old('symptoms', []))) selected @endif>
                                            {{ $symptom->symptom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Diagnosis</label>
                                {{-- <textarea name="diagnosis" class="form-control" id="diagnosisTextarea" style="">{{ old('diagnosis') }}</textarea> --}}
                                <textarea name="diagnosis" class="form-control" id="diagnosisTextarea"
                                    style="width: 100%; height: 150px; border: 1px solid #ccc; padding: 10px; font-size: 16px; resize: vertical; background-color: #f9f9f9; color: #333;">
                                    {{ old('diagnosis') }}
                                </textarea>

                            </div>
                            
                            <div class="mb-3">
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
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Additional Notes</label>
                                <textarea name="consultation_notes" class="form-control">{{ old('consultation_notes') }}</textarea>
                            </div>

                            <h4 class="mt-3">Order Lab Tests (Optional)</h4>
                            @foreach ($labTests as $labTest)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lab_tests[]"
                                        value="{{ $labTest->id }} {{ old('lab_tests[]') == $labTest->id ? 'checked' : '' }}">
                                    <label class="form-check-label">{{ $labTest->name }} ({{ $labTest->price }}
                                        USD)</label>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">Save Consultation</button>
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
        $(document).ready(function() {
            $('#symptomsSelect').select2({
                placeholder: "Search and select medicines",
                allowClear: true
            });
        });
        $(document).ready(function() {
            // Sample JSON data (can be fetched from your backend if necessary)
            const symptomsAndDiagnosis = @json($symptoms); // Pass the symptoms data from Laravel to JS

            // Function to update the diagnosis field based on selected symptoms
            function updateDiagnosis() {
                const selectedSymptoms = $("#symptomsSelect").val(); // Get selected symptoms
                let diagnosis = [];

                // Loop through the selected symptoms to find the corresponding diagnosis
                selectedSymptoms.forEach(symptom => {
                    const symptomData = symptomsAndDiagnosis.find(item => item.symptom === symptom);
                    if (symptomData) {
                        diagnosis = [...diagnosis, ...symptomData.diagnosis];
                    }
                });

                // Populate the diagnosis textarea with the related diagnoses
                $("#diagnosisTextarea").val(diagnosis.join(",\n"));
            }

            // Event listener when symptoms are selected or deselected
            $("#symptomsSelect").on("change", function() {
                updateDiagnosis(); // Update diagnosis whenever selection changes
            });

            // Initial population of diagnosis when page loads (if there are any pre-selected symptoms)
            updateDiagnosis();
        });
    </script>
@endsection


                            {{-- <div class="mb-3">
                                <label class="form-label">Symptoms</label>
                                <select name="symptoms[]" class="form-select select2" multiple="multiple" id="symptomsSelect">
                                    @php
                                        $symptoms = json_decode(file_get_contents(public_path('assets/data/disease/disease.json')));
                                    @endphp
                                    @foreach ($symptoms as $symptom)
                                        <option value="{{ $symptom->symptom }}" 
                                            @if (in_array($symptom->symptom, old('symptoms', []))) selected @endif>
                                            {{ $symptom->symptom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>                             --}}

                            {{-- <div class="mb-3">
                                <label class="form-label">Diagnosis</label>
                                <textarea name="diagnosis" class="form-control" id="diagnosisTextarea" readonly>{{ old('diagnosis') }}</textarea>
                            </div> --}}

                            {{-- <div class="mb-3">
                            <label class="form-label">Prescription</label>
                            <textarea name="prescription" class="form-control">{{ old('prescription') }}</textarea>
                        </div> --}}