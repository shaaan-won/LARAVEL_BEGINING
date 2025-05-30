{{-- 
@extends('layout.erp.app')
@section('title','Show Bed')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('beds.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$bed->id}}</td></tr>
		<tr><th>Bed Number</th><td>{{$bed->bed_number}}</td></tr>
		<tr><th>Ward Id</th><td>{{$bed->ward_id}}</td></tr>
		<tr><th>Status Id</th><td>{{$bed->status_id}}</td></tr>
		<tr><th>Created At</th><td>{{$bed->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$bed->updated_at}}</td></tr>

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
                        <h3 class="mb-0 fw-bolder text-white fs-2">Bed Details</h3>
                        <a href="{{ route('beds.index') }}" class="btn btn-lg btn-warning">Manage Beds</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $bed->id }}</td>
                                </tr>
                                <tr>
                                    <th>Bed Number</th>
                                    <td>{{ $bed->bed_number }}</td>
                                </tr>
                                <tr>
                                    <th>Ward ID</th>
                                    <td>{{ $bed->ward_id }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $bed->status_id }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $bed->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $bed->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('beds.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('beds.edit', $bed->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('beds.destroy', $bed->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this bed?');" class="d-inline">
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