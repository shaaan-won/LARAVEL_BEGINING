{{-- 
@extends('layout.erp.app')
@section('title','Show BedAssignment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('bedassignments.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$bedassignment->id}}</td></tr>
		<tr><th>Bed Id</th><td>{{$bedassignment->bed_id}}</td></tr>
		<tr><th>Patient Id</th><td>{{$bedassignment->patient_id}}</td></tr>
		<tr><th>Assigned At</th><td>{{$bedassignment->assigned_at}}</td></tr>
		<tr><th>Discharged At</th><td>{{$bedassignment->discharged_at}}</td></tr>
		<tr><th>Created At</th><td>{{$bedassignment->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$bedassignment->updated_at}}</td></tr>

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
                        <h3 class="mb-0 fw-bolder text-white fs-2">Bed Assignment Details</h3>
                        <a href="{{ route('bedassignments.index') }}" class="btn btn-lg btn-warning">Manage Assignments</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $bedassignment->id }}</td>
                                </tr>
                                <tr>
                                    <th>Bed ID</th>
                                    <td>{{ $bedassignment->bed_id }}</td>
                                </tr>
                                <tr>
                                    <th>Patient ID</th>
                                    <td>{{ $bedassignment->patient_id }}</td>
                                </tr>
                                <tr>
                                    <th>Assigned At</th>
                                    <td>{{ $bedassignment->assigned_at ? $bedassignment->assigned_at->format('d M Y, h:i A') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Discharged At</th>
                                    <td>{{ $bedassignment->discharged_at ? $bedassignment->discharged_at->format('d M Y, h:i A') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $bedassignment->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $bedassignment->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('bedassignments.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('bedassignments.edit', $bedassignment->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('bedassignments.destroy', $bedassignment->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this assignment?');" class="d-inline">
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
