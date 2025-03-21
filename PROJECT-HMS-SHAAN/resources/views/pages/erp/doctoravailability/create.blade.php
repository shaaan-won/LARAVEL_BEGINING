{{-- 
@extends('layout.erp.app')
@section('title', 'Create DoctorAvailability')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('doctoravailabilitys.index')}}">Manage</a>
<form action="{{route('doctoravailabilitys.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="doctor_id" class="col-sm-2 col-form-label">Doctor</label>
	<div class="col-sm-10">
		<select class="form-control" name="doctor_id" id="doctor_id">
			@foreach ($doctors as $doctor)
				<option value="{{$doctor->id}}">{{$doctor->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="day" class="col-sm-2 col-form-label">Day</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="day" id="day" placeholder="Day">
	</div>
</div>
<div class="row mb-3">
	<label for="start_time" class="col-sm-2 col-form-label">Start Time</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="start_time" id="start_time" placeholder="Start Time">
	</div>
</div>
<div class="row mb-3">
	<label for="end_time" class="col-sm-2 col-form-label">End Time</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="end_time" id="end_time" placeholder="End Time">
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
                        <h3 class="mb-0 fw-bolder text-white fs-2">Add Doctor Availability</h3>
                        <a href="{{ route('doctoravailabilitys.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success') || session('error'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                                {{ session('success') ?? session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('doctoravailabilitys.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="doctor_id">Doctor</label>
                                <select class="form-select form-control-lg" id="doctor_id" name="doctor_id">
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
								<label class="form-label fw-bold fs-5" for="day">Day(s)</label>
								<select class="form-select form-control-lg select2" id="day" name="day[]" multiple>
									<option value="Monday" {{ in_array('Monday', old('day', [])) ? 'selected' : '' }}>Monday</option>
									<option value="Tuesday" {{ in_array('Tuesday', old('day', [])) ? 'selected' : '' }}>Tuesday</option>
									<option value="Wednesday" {{ in_array('Wednesday', old('day', [])) ? 'selected' : '' }}>Wednesday</option>
									<option value="Thursday" {{ in_array('Thursday', old('day', [])) ? 'selected' : '' }}>Thursday</option>
									<option value="Friday" {{ in_array('Friday', old('day', [])) ? 'selected' : '' }}>Friday</option>
									<option value="Saturday" {{ in_array('Saturday', old('day', [])) ? 'selected' : '' }}>Saturday</option>
									<option value="Sunday" {{ in_array('Sunday', old('day', [])) ? 'selected' : '' }}>Sunday</option>
								</select>
								@error('day')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>																				
							<script>
								$(document).ready(function() {
									$('#day').select2({
										placeholder: "Select Day(s)",
										allowClear: true
									});
								});
							</script>	
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="start_time">Start Time</label>
                                <input type="time" class="form-control form-control-lg" id="start_time" name="start_time"
                                    value="{{ old('start_time') }}" />
                                @error('start_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="end_time">End Time</label>
                                <input type="time" class="form-control form-control-lg" id="end_time" name="end_time"
                                    value="{{ old('end_time') }}" />
                                @error('end_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection