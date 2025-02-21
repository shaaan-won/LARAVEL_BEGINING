{{-- 
@extends('layout.erp.app')
@section('title', 'Show User')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('users.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$user->id}}</td></tr>
		<tr><th>Name</th><td>{{$user->name}}</td></tr>
		<tr><th>Email</th><td>{{$user->email}}</td></tr>
		<tr><th>Email Verified At</th><td>{{$user->email_verified_at}}</td></tr>
		<tr><th>Role Id</th><td>{{$user->role_id}}</td></tr>
		<tr><th>Phone</th><td>{{$user->phone}}</td></tr>
		<tr><th>Address</th><td>{{$user->address}}</td></tr>
		<tr><th>Password</th><td>{{$user->password}}</td></tr>
		<tr><th>Remember Token</th><td>{{$user->remember_token}}</td></tr>
		<tr><th>Created At</th><td>{{$user->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$user->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection --}}


@extends('layout.erp.app')
@section('title', 'Show User')
@section('style')

@endsection
@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">{{ $user->name }} Details</h3>
                        <a href="{{ route('users.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Email Verified At</th>
                                    <td>{{ $user->email_verified_at }}</td>
                                </tr>
                                <tr>
                                    <th>Role Id</th>
                                    <td>{{ $user->role_id }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                {{-- <tr><th>Password</th><td>{{ $user->password }}</td></tr> --}}
                                <tr>
                                    <th>Password</th>
                                    <td>[Encrypted]</td>
                                </tr>
                                <tr>
                                    <th>Remember Token</th>
                                    <td>{{ $user->remember_token }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $user->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('users.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this user?');" class="d-inline">
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
@section('script')

@endsection
