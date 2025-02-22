{{-- 
@extends('layout.erp.app')
@section('title','Show Appointment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('appointments.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$appointment->id}}</td></tr>
		<tr><th>Doctor Id</th><td>{{$appointment->doctor_id}}</td></tr>
		<tr><th>Patient Id</th><td>{{$appointment->patient_id}}</td></tr>
		<tr><th>Appointment Date</th><td>{{$appointment->appointment_date}}</td></tr>
		<tr><th>Appointment Time</th><td>{{$appointment->appointment_time}}</td></tr>
		<tr><th>Status Id</th><td>{{$appointment->status_id}}</td></tr>
		<tr><th>Cancellation Reason</th><td>{{$appointment->cancellation_reason}}</td></tr>
		<tr><th>Created At</th><td>{{$appointment->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$appointment->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')

@section('title', 'Show Appointment')

@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Appointment Details</h3>
                        <a href="{{ route('appointments.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $appointment->id }}</td>
                                </tr>
                                <tr>
                                    <th>Doctor Name</th>
                                    <td>{{ $appointment->doctor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Patient Name</th>
                                    <td>{{ $appointment->patient->name }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment Date</th>
                                    <td>{{ $appointment->appointment_date }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment Time</th>
                                    <td>{{ $appointment->appointment_time }}</td>
                                </tr>
                                <tr>
									<th>Status</th>
									<td class="{{ $appointment->status_id == 1 ? 'text-danger bg-info' : ($appointment->status_id == 2 ? 'text-warning bg-success' : 'text-danger bg-primary') }}">
										{{ $appointment->status->name }}
									</td>
									
                                </tr>
                                <tr>
                                    <th>Cancellation Reason</th>
                                    <td>{{ $appointment->cancellation_reason ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $appointment->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $appointment->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('appointments.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-lg btn-warning">Edit</a>

                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this appointment?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
