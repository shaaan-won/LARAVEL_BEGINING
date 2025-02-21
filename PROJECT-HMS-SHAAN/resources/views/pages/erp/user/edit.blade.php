{{-- 
@extends('layout.erp.app')
@section('title','Edit User')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('users.index')}}">Manage</a>
<form action="{{route('users.update',$user)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="id" class="col-sm-2 col-form-label">Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="id" value="{{$user->id}}" id="id" placeholder="Id">
	</div>
</div>
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$user->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="email" value="{{$user->email}}" id="email" placeholder="Email">
	</div>
</div>
<div class="row mb-3">
	<label for="role_id" class="col-sm-2 col-form-label">Role</label>
	<div class="col-sm-10">
		<select class="form-control" name="role_id" id="role_id">
			@foreach($roles as $role)
				@if($role->id==$user->role_id)
					<option value="{{$role->id}}" selected>{{$role->name}}</option>
				@else
					<option value="{{$role->id}}">{{$role->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="phone" class="col-sm-2 col-form-label">Phone</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="phone" value="{{$user->phone}}" id="phone" placeholder="Phone">
	</div>
</div>
<div class="row mb-3">
	<label for="address" class="col-sm-2 col-form-label">Address</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="address" value="{{$user->address}}" id="address" placeholder="Address">
	</div>
</div>
<div class="row mb-3">
	<label for="password" class="col-sm-2 col-form-label">Password</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="password" value="{{$user->password}}" id="password" placeholder="Password">
	</div>
</div>
<div class="row mb-3">
	<label for="remember_token" class="col-sm-2 col-form-label">Remember Token</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="remember_token" value="{{$user->remember_token}}" id="remember_token" placeholder="Remember Token">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Edit User')
@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder fs-2">Edit User Details of <span class="text-white">{{ $user->name }}</span></h3>
                    <a href="{{ route('users.index') }}" class="btn btn-lg btn-warning">Back</a>
                </div>
                <div class="card-body">
                    @if (session('success') || session('error'))
                        <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                            {{ session('success') ?? session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="id">ID</label>
                            <input type="text" class="form-control form-control-lg" id="id" name="id" value="{{ $user->id }}" placeholder="User ID" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="name">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="email">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $user->email }}" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="role_id">Role</label>
                            <select class="form-select form-control-lg" id="role_id" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="phone">Phone</label>
                            <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Enter Phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="address">Address</label>
                            <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{ $user->address }}" placeholder="Enter Address">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="password">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter New Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="remember_token">Remember Token</label>
                            <input type="text" class="form-control form-control-lg" id="remember_token" name="remember_token" value="{{ $user->remember_token }}" placeholder="Enter Remember Token">
                            @error('remember_token')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
