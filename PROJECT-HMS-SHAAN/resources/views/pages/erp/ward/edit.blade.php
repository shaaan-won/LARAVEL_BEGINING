{{-- 
@extends('layout.erp.app')
@section('title','Edit Ward')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('wards.index')}}">Manage</a>
<form action="{{route('wards.update',$ward)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$ward->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="type" class="col-sm-2 col-form-label">Type</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="type" value="{{$ward->type}}" id="type" placeholder="Type">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder fs-2">Edit Ward</h3>
                        <a href="{{ route('wards.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success') || session('error'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                                {{ session('success') ?? session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('wards.update', $ward) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="name">Ward Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter Ward Name" value="{{ old('name', $ward->name) }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="type">Ward Type</label>
                                <input type="text" class="form-control form-control-lg" id="type" name="type" placeholder="Enter Ward Type" value="{{ old('type', $ward->type) }}" />
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

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
