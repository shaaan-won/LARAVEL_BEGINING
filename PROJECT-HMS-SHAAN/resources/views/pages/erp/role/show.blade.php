{{-- 
@extends('layout.erp.app')
@section('title','Show Role')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('roles.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$role->id}}</td></tr>
		<tr><th>Name</th><td>{{$role->name}}</td></tr>
		<tr><th>Created At</th><td>{{$role->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$role->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')

@section('title', 'Show Role')

@section('page')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bolder text-white fs-2">{{ $role->name }} Details</h3>
            <a href="{{ route('roles.index') }}" class="btn btn-lg btn-warning">Back</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover table-responsive">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $role->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $role->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $role->updated_at->format('d M Y, h:i A') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center justify-content-between">
            <a href="{{ route('roles.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-lg btn-warning">Edit</a>
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
