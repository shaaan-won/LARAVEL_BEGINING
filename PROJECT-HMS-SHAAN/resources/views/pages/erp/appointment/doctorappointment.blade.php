{{-- @extends('layout.erp.app')

@section('title', 'Doctor Appointments')
@section('page')

    <div class="container">
        <h2>Doctor's Appointments</h2>

        <form method="GET" action="{{ route('doctor.appointments.index') }}">
            <div class="mb-3">
                <label for="status" class="form-label">Filter by Status</label>
                <select name="status" class="form-control">
                    <option value="">-- All Statuses --</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filter</button>
        </form>

        <div class="mt-4">
            @if ($appointments->isEmpty())
                <p>No appointments found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ $appointment->status->name }}</td>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                    <td>
                                        <form action="{{ route('doctor.appointments.updatebydoctor', $appointment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <button type="submit" class="btn btn-success">"Mark as Completed</button>

                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection --}}

@extends('layout.erp.app')

@section('title', 'Doctor Appointments')

@section('page')
    <section id="appointments-list">
        <div class="row" id="appointments-row">
            <div class="col-12">
                @if (session('success') || session('error'))
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div
                                        class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                                        <h2
                                            class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
                                            {{ session('success') ?? session('error') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bolder fs-2">Doctor's Appointments</h2>
                        <form method="GET" action="{{ route('doctor.appointments.index') }}" class="d-flex">
                            <!-- Status Filter -->
                            <div class="mb-3 me-3 d-flex justify-content-end">
                                <label for="status_id" class="form-label">Filter by Status</label>
                                <select name="status_id" class="form-control">
                                    <option value="">-- All Statuses --</option>
                                    <option value="4" {{ request('status_id') == '4' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="3" {{ request('status_id') == '3' ? 'selected' : '' }}>Approved
                                    </option>
                                    <option value="9" {{ request('status_id') == '9' ? 'selected' : '' }}>Processing
                                    </option>
                                    <option value="7" {{ request('status_id') == '7' ? 'selected' : '' }}>Confirmed
                                    </option>
                                    <option value="5" {{ request('status_id') == '5' ? 'selected' : '' }}>Completed
                                    </option>
                                    <option value="6" {{ request('status_id') == '6' ? 'selected' : '' }}>Cancelled
                                    </option>
                                </select>
                            </div>

                            <!-- Doctor Filter -->
                            <div class="mb-3 me-3 d-flex justify-content-end">
                                <label for="doctor_id" class="form-label">Filter by Doctor</label>
                                <select name="doctor_id" class="form-control">
                                    <option value="">-- All Doctors --</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Apply Filter Button -->
                            <button type="submit" class="btn btn-primary ">Apply Filter</button>
                        </form>
                    </div>

                    <div class="table-responsive theme-scrollbar card-body w-100">
                        @if ($appointments->isEmpty())
                            <h1 class="text-center fw-bold text-danger">No appointments found.</h1>
                        @else
                            <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1"
                                role="grid" aria-describedby="basic-1_info">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Patient</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-nowrap"
                                                style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $appointment->patient->name }}</td>
                                            <td>{{ $appointment->appointment_date }}</td>
                                            <td>{{ $appointment->appointment_time }}</td>
                                            <td>{{ $appointment->status->name }}</td>
                                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                                        <form action="{{ url('consultations/form', $appointment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('GET')
                                                            <button type="submit"
                                                                class="btn btn-primary">Consultation</button>
                                                        </form>
                                                        {{-- <form action="{{ url('/doctor/review', $appointment->id) }}" method="POST">
                                                            @csrf
                                                            @method('GET')
                                                            <button type="submit"
                                                                class="btn btn-warning">Review Test</button>
                                                        </form> --}}

                                                        {{-- <form action="{{ url('/doctor/review', $appointment->id) }}" --}}
                                                        @php
                                                            $ss =
                                                                    $appointment->consultation->id ??
                                                                    'No consultation found';
                                                                // print_r($ss);
                                                        @endphp
                                                        <form action="{{ url('/doctor/review', $ss) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('GET')
                                                            {{-- @php
                                                                // $consultation=$appointment->consultation->all();
                                                                $labTests=$appointment->consultation->labtestresults->all();
                                                                print_r($labTests);
                                                                // print_r($consultation);
                                                                // $hasTestResults =
                                                                //     $appointment->consultation &&
                                                                //     $appointment->consultation->labTests
                                                                //         ->whereNotNull('lab_test_result')
                                                                //         ->count() > 0;
                                                                // dd($hasTestResults);
                                                            @endphp --}}

                                                            @php
                                                                $hasTestResults = false;
                                                                $hasAllTestResults = false;
                                                                if (
                                                                    $appointment->consultation &&
                                                                    $appointment->consultation->labTests->count() > 0
                                                                ) {
                                                                    $hasAllTestResults = $appointment->consultation->labTests->every(
                                                                        function ($test) {
                                                                            return !is_null($test->lab_test_result);
                                                                        },
                                                                    );
                                                                }

                                                                if ($hasAllTestResults) {
                                                                    $hasTestResults = true;
                                                                }
                                                            @endphp

                                                            <button type="submit" class="btn btn-warning"
                                                                {{ $hasTestResults ? '' : 'disabled' }}>
                                                                Review Test
                                                            </button>
                                                        </form>

                                                        <form
                                                            action="{{ route('doctor.appointments.updatebydoctor', $appointment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success"
                                                                onclick="return confirm('Are you sure you want to mark this appointment as completed?')">Mark
                                                                as Completed</button>
                                                        </form>

                                                        <!-- Trigger Button for Modal -->
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancelModal{{ $appointment->id }}">
                                                            Cancel Appointment
                                                        </button>
                                                    </div>

                                                    <!-- Cancel Modal (Unique per appointment) -->
                                                    <div class="modal fade" id="cancelModal{{ $appointment->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="cancelModalLabel{{ $appointment->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <form
                                                                    action="{{ route('doctor.appointments.cancelbydoctor', $appointment->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="cancelModalLabel{{ $appointment->id }}">
                                                                            Cancel Appointment
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label
                                                                                for="cancellationReason{{ $appointment->id }}"
                                                                                class="form-label">Reason for
                                                                                Cancellation</label>
                                                                            <textarea class="form-control" id="cancellationReason{{ $appointment->id }}" name="cancellation_reason" rows="5"
                                                                                placeholder="Enter cancellation reason"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Confirm Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
