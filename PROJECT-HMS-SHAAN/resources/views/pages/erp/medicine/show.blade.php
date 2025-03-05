{{-- 
@extends('layout.erp.app')
@section('title','Show Medicine')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('medicines.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$medicine->id}}</td></tr>
		<tr><th>Name</th><td>{{$medicine->name}}</td></tr>
		<tr><th>Category</th><td>{{$medicine->category}}</td></tr>
		<tr><th>Dosage</th><td>{{$medicine->dosage}}</td></tr>
		<tr><th>Strength</th><td>{{$medicine->strength}}</td></tr>
		<tr><th>Manufacturer</th><td>{{$medicine->manufacturer}}</td></tr>
		<tr><th>Price</th><td>{{$medicine->price}}</td></tr>
		<tr><th>Created At</th><td>{{$medicine->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$medicine->updated_at}}</td></tr>

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
                        <h3 class="mb-0 fw-bolder text-white fs-2">Medicine Details</h3>
                        <a href="{{ route('medicines.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $medicine->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $medicine->name }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $medicine->category }}</td>
                                </tr>
                                <tr>
                                    <th>Dosage</th>
                                    <td>{{ $medicine->dosage }}</td>
                                </tr>
                                <tr>
                                    <th>Strength</th>
                                    <td>{{ $medicine->strength }}</td>
                                </tr>
                                <tr>
                                    <th>Manufacturer</th>
                                    <td>{{ $medicine->manufacturer }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $medicine->price }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $medicine->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $medicine->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('medicines.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this medicine?');" class="d-inline">
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
