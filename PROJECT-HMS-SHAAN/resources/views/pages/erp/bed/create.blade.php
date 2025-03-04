{{-- 
@extends('layout.erp.app')
@section('title','Create Bed')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('beds.index')}}">Manage</a>
<form action="{{route('beds.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="bed_number" class="col-sm-2 col-form-label">Bed Number</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="bed_number" id="bed_number" placeholder="Bed Number">
	</div>
</div>
<div class="row mb-3">
	<label for="ward_id" class="col-sm-2 col-form-label">Ward</label>
	<div class="col-sm-10">
		<select class="form-control" name="ward_id" id="ward_id">
			@foreach($wards as $ward)
				<option value="{{$ward->id}}">{{$ward->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				<option value="{{$status->id}}">{{$status->name}}</option>
			@endforeach
		</select>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
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
                    <h3 class="mb-0 fw-bolder text-white fs-2">Add Bed</h3>
                    <a href="{{ route('beds.index') }}" class="btn btn-lg btn-warning">Back</a>
                </div>
                <div class="card-body">
                    @if (session('success') || session('error'))
                        <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                            {{ session('success') ?? session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('beds.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="bed_number">Bed Number</label>
                            <input type="text" class="form-control form-control-lg" id="bed_number" name="bed_number" placeholder="Enter Bed Number" value="{{ old('bed_number') }}" required>
                            @error('bed_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="ward_id">Ward</label>
                            <select class="form-select form-control-lg" id="ward_id" name="ward_id" required>
                                <option value="">Select Ward</option>
                                @foreach($wards as $ward)
                                    <option value="{{ $ward->id }}" {{ old('ward_id') == $ward->id ? 'selected' : '' }}>{{ $ward->name }}</option>
                                @endforeach
                            </select>
                            @error('ward_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="status_id">Status</label>
                            <select class="form-select form-control-lg" id="status_id" name="status_id" required>
                                <option value="">Select Status</option>
                                @foreach($status as $s)
                                    <option value="{{ $s->id }}" {{ old('status_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
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