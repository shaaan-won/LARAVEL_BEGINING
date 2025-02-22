{{-- 
@extends('layout.erp.app')
@section('title','Show DoctorAvailability')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('doctoravailabilitys.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$doctoravailability->id}}</td></tr>
		<tr><th>Doctor Id</th><td>{{$doctoravailability->doctor_id}}</td></tr>
		<tr><th>Day</th><td>{{$doctoravailability->day}}</td></tr>
		<tr><th>Start Time</th><td>{{$doctoravailability->start_time}}</td></tr>
		<tr><th>End Time</th><td>{{$doctoravailability->end_time}}</td></tr>
		<tr><th>Created At</th><td>{{$doctoravailability->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$doctoravailability->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Doctor Availability Details</h3>
                        <a href="{{ route('doctoravailabilitys.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr><th>ID</th><td>{{ $doctoravailability->id }}</td></tr>
                                <tr><th>Doctor ID</th><td>{{ $doctoravailability->doctor_id }}</td></tr>
                                <tr><th>Day</th><td>{{ $doctoravailability->day }}</td></tr>
                                <tr><th>Start Time</th><td>{{ $doctoravailability->start_time }}</td></tr>
                                <tr><th>End Time</th><td>{{ $doctoravailability->end_time }}</td></tr>
                                <tr><th>Created At</th><td>{{ $doctoravailability->created_at->format('d M Y, h:i A') }}</td></tr>
                                <tr><th>Updated At</th><td>{{ $doctoravailability->updated_at->format('d M Y, h:i A') }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('doctoravailabilitys.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('doctoravailabilitys.edit', $doctoravailability->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('doctoravailabilitys.destroy', $doctoravailability->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');" class="d-inline">
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
