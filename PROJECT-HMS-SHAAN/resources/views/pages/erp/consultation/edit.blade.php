
@extends('layout.erp.app')
@section('title','Edit Consultation')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('consultations.index')}}">Manage</a>
<form action="{{route('consultations.update',$consultation)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="id" class="col-sm-2 col-form-label">Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="id" value="{{$consultation->id}}" id="id" placeholder="Id">
	</div>
</div>
<div class="row mb-3">
	<label for="appointment_id" class="col-sm-2 col-form-label">Appointment Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="appointment_id" value="{{$consultation->appointment_id}}" id="appointment_id" placeholder="Appointment Id">
	</div>
</div>
<div class="row mb-3">
	<label for="symptoms" class="col-sm-2 col-form-label">Symptoms</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="symptoms" value="{{$consultation->symptoms}}" id="symptoms" placeholder="Symptoms">
	</div>
</div>
<div class="row mb-3">
	<label for="diagnosis" class="col-sm-2 col-form-label">Diagnosis</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="diagnosis" value="{{$consultation->diagnosis}}" id="diagnosis" placeholder="Diagnosis">
	</div>
</div>
<div class="row mb-3">
	<label for="prescription" class="col-sm-2 col-form-label">Prescription</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="prescription" value="{{$consultation->prescription}}" id="prescription" placeholder="Prescription">
	</div>
</div>
<div class="row mb-3">
	<label for="consultation_notes" class="col-sm-2 col-form-label">Consultation Notes</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="consultation_notes" value="{{$consultation->consultation_notes}}" id="consultation_notes" placeholder="Consultation Notes">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
