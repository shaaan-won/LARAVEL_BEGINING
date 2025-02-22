
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
		<input type = "text" class="form-control" name="doctor_id" value="{{$appointment->doctor_id}}" id="doctor_id" placeholder="Doctor Id">
	</div>
</div>
<div class="row mb-3">
	<label for="patient_id" class="col-sm-2 col-form-label">Patient Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="patient_id" value="{{$appointment->patient_id}}" id="patient_id" placeholder="Patient Id">
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


@endsection
