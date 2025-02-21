{{-- @extends('layout.erp.app')
@section('title','Create Role')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('roles.index')}}">Manage</a>
<form action="{{route('roles.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Create Role')
@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder text-white fs-2">Add Role</h3>
                    <a href="{{ route('roles.index') }}" class="btn btn-lg btn-warning">Manage</a>
                </div>
                <div class="card-body">

                    {{-- /// Validation Messages --}}
                    @if (session('success') || session('error'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-{{ session('success') ? 'success' : (session('error') ? 'danger' : '') }}"
                                    role="alert">
                                    {{ session('success') ?? session('error') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- // Form starts here --}}
                    <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold fs-5">Role Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name"
                                placeholder="Enter Role Name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
