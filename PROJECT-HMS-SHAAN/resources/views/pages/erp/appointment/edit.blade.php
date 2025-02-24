{{-- 
@extends('layout.erp.app')
@section('title','Edit Appointment')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('appointments.index')}}">Manage</a>
<form action="{{route('appointments.update',$appointment)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="id" class="col-sm-2 col-form-label">Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="id" value="{{$appointment->id}}" id="id" placeholder="Id">
	</div>
</div>
<div class="row mb-3">
	<label for="doctor_id" class="col-sm-2 col-form-label">Doctor Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="doctor_id" value="{{$appointment->doctor->name}}" id="doctor_id" placeholder="Doctor Id">
	</div>
</div>
<div class="row mb-3">
	<label for="patient_id" class="col-sm-2 col-form-label">Patient Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="patient_id" value="{{$appointment->patient->name}}" id="patient_id" placeholder="Patient Id">
	</div>
</div>
<div class="row mb-3">
	<label for="appointment_date" class="col-sm-2 col-form-label">Appointment Date</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="appointment_date" value="{{$appointment->appointment_date}}" id="appointment_date" placeholder="Appointment Date">
	</div>
</div>
<div class="row mb-3">
	<label for="appointment_time" class="col-sm-2 col-form-label">Appointment Time</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="appointment_time" value="{{$appointment->appointment_time}}" id="appointment_time" placeholder="Appointment Time">
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				@if($status->id==$appointment->status_id)
					<option value="{{$status->id}}" selected>{{$status->name}}</option>
				@else
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="cancellation_reason" class="col-sm-2 col-form-label">Cancellation Reason</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="cancellation_reason" value="{{$appointment->cancellation_reason}}" id="cancellation_reason" placeholder="Cancellation Reason">
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
                        <h3 class="mb-0 fw-bolder fs-2">Edit Appointment of <span class="text-white">{{ $appointment->patient->name }}</span></h3>
                        <a href="{{ route('appointments.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        @if (session('success') || session('error'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                                {{ session('success') ?? session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('appointments.update', $appointment) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-5" for="doctor_id">Doctor</label>
                                <select class="form-select form-control-lg" name="doctor_id" id="doctor_id">
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-5" for="patient_id">Patient</label>
                                <select class="form-select form-control-lg" name="patient_id" id="patient_id">
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ $patient->id == $appointment->patient_id ? 'selected' : '' }}>{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-5" for="appointment_date">Appointment Date</label>
                                <input type="date" class="form-control form-control-lg" id="appointment_date" name="appointment_date" value="{{ $appointment->appointment_date }}" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-5" for="appointment_time">Appointment Time</label>
                                <input type="time" class="form-control form-control-lg" id="appointment_time" name="appointment_time" value="{{ $appointment->appointment_time }}" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-5" for="status_id">Status</label>
                                <select class="form-select form-control-lg" name="status_id" id="status_id">
                                    @foreach($status as $stat)
                                        <option value="{{ $stat->id }}" {{ $stat->id == $appointment->status_id ? 'selected' : '' }}>{{ $stat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold fs-5" for="cancellation_reason">Cancellation Reason</label>
                                <input type="text" class="form-control form-control-lg" name="cancellation_reason" id="cancellation_reason" value="{{ $appointment->cancellation_reason }}" placeholder="Enter reason (if any)" />
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