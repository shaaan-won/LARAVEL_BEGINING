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
                                    <div class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                                        <h2 class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
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
                                    <option value="1" {{ request('status_id') == '4' ? 'selected' : '' }}>Pending</option>
                                    <option value="2" {{ request('status_id') == '7' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="3" {{ request('status_id') == '5' ? 'selected' : '' }}>Completed</option>
                                    <option value="4" {{ request('status_id') == '6' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        
                            <!-- Doctor Filter -->
                            <div class="mb-3 me-3 d-flex justify-content-end">
                                <label for="doctor_id" class="form-label">Filter by Doctor</label>
                                <select name="doctor_id" class="form-control">
                                    <option value="">-- All Doctors --</option>
                                    @foreach( $doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <!-- Apply Filter Button -->
                            <button type="submit" class="btn btn-primary ">Apply Filter</button>
                        </form>                        
                    </div>

                    <div class="table-responsive theme-scrollbar card-body">
                        @if ($appointments->isEmpty())
                            <p>No appointments found.</p>
                        @else
                            <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
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
                                                    <form action="{{ route('doctor.appointments.updatebydoctor', $appointment->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Mark as Completed</button>
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
            </div>
        </div>
    </section>
@endsection

