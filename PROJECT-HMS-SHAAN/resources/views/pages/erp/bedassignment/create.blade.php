{{-- 
@extends('layout.erp.app')
@section('title','Create BedAssignment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('bedassignments.index')}}">Manage</a>
<form action="{{route('bedassignments.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="bed_id" class="col-sm-2 col-form-label">Bed</label>
	<div class="col-sm-10">
		<select class="form-control" name="bed_id" id="bed_id">
			@foreach($beds as $bed)
				<option value="{{$bed->id}}">{{$bed->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="patient_id" class="col-sm-2 col-form-label">Patient</label>
	<div class="col-sm-10">
		<select class="form-control" name="patient_id" id="patient_id">
			@foreach($patients as $patient)
				<option value="{{$patient->id}}">{{$patient->name}}</option>
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
@section('title','Create BedAssignment')
@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder text-white fs-2">Assign Bed</h3>
                    <a href="{{ route('bedassignments.index') }}" class="btn btn-lg btn-warning">Manage</a>
                </div>
                <div class="card-body">
                    @if (session('success') || session('error'))
                        <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                            {{ session('success') ?? session('error') }}
                        </div>
                    @endif
                    {{-- {{print_r($beds)}} --}}

                    <form action="{{ route('bedassignments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="bed_id">Bed</label>
                            <select class="form-select form-control-lg" name="bed_id" id="bed_id">
                                <option value="">Select Bed</option>
                                @foreach($beds as $bed)
                                    <option value="{{ $bed->id }}">{{ $bed->name }}</option>
                                @endforeach
                            </select>
                            @error('bed_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="patient_id">Patient</label>
                            <select class="form-select form-control-lg" name="patient_id" id="patient_id">
                                <option value="">Select Patient</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                            @error('patient_id')
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