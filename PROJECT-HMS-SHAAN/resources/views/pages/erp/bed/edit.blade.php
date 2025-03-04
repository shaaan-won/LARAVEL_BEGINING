{{-- 
@extends('layout.erp.app')
@section('title','Edit Bed')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('beds.index')}}">Manage</a>
<form action="{{route('beds.update',$bed)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="bed_number" class="col-sm-2 col-form-label">Bed Number</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="bed_number" value="{{$bed->bed_number}}" id="bed_number" placeholder="Bed Number">
	</div>
</div>
<div class="row mb-3">
	<label for="ward_id" class="col-sm-2 col-form-label">Ward</label>
	<div class="col-sm-10">
		<select class="form-control" name="ward_id" id="ward_id">
			@foreach($wards as $ward)
				@if($ward->id==$bed->ward_id)
					<option value="{{$ward->id}}" selected>{{$ward->name}}</option>
				@else
					<option value="{{$ward->id}}">{{$ward->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				@if($status->id==$bed->status_id)
					<option value="{{$status->id}}" selected>{{$status->name}}</option>
				@else
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endif
			@endforeach
		</select>
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
                        <h3 class="mb-0 fw-bolder fs-2">Edit Bed</h3>
                        <a href="{{ route('beds.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success') || session('error'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                                {{ session('success') ?? session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('beds.update', $bed) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="bed_number">Bed Number</label>
                                <input type="text" class="form-control form-control-lg" id="bed_number" name="bed_number" placeholder="Enter Bed Number" value="{{ old('bed_number', $bed->bed_number) }}" />
                                @error('bed_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="ward_id">Ward</label>
                                <select class="form-select form-control-lg" id="ward_id" name="ward_id">
                                    <option value="">Select Ward</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}" {{ old('ward_id', $bed->ward_id) == $ward->id ? 'selected' : '' }}>
                                            {{ $ward->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ward_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="status_id">Status</label>
                                <select class="form-select form-control-lg" id="status_id" name="status_id">
                                    <option value="">Select Status</option>
                                    @foreach ($status as $stat)
                                        <option value="{{ $stat->id }}" {{ old('status_id', $bed->status_id) == $stat->id ? 'selected' : '' }}>
                                            {{ $stat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status_id')
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
