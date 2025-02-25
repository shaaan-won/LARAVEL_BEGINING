{{-- 
@extends('layout.erp.app')
@section('title','Show AppointmentTrashed')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('appointmenttrasheds.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$appointmenttrashed->id}}</td></tr>
		<tr><th>Doctor Id</th><td>{{$appointmenttrashed->doctor->name}}</td></tr>
		<tr><th>Patient Id</th><td>{{$appointmenttrashed->patient->name}}</td></tr>
		<tr><th>Appointment Date</th><td>{{$appointmenttrashed->appointment_date}}</td></tr>
		<tr><th>Appointment Time</th><td>{{$appointmenttrashed->appointment_time}}</td></tr>
		<tr><th>Status Id</th><td>{{$appointmenttrashed->status_id}}</td></tr>
		<tr><th>Created At</th><td>{{$appointmenttrashed->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$appointmenttrashed->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script') --}}

@extends('layout.erp.app')

@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Appointment Trashed Details</h3>
                        <a href="{{ route('appointmenttrasheds.index') }}" class="btn btn-lg btn-warning">Back to List</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $appointmenttrashed->id }}</td>
                                </tr>
                                <tr>
                                    <th>Doctor</th>
                                    <td>{{ $appointmenttrashed->doctor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Patient</th>
                                    <td>{{ $appointmenttrashed->patient->name }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment Date</th>
                                    <td>{{ $appointmenttrashed->appointment_date }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment Time</th>
                                    <td>{{ $appointmenttrashed->appointment_time }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $appointmenttrashed->status_id }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $appointmenttrashed->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $appointmenttrashed->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('appointmenttrasheds.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('appointmenttrasheds.edit', $appointmenttrashed->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('appointmenttrasheds.destroy', $appointmenttrashed->id) }}" method="POST"
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

