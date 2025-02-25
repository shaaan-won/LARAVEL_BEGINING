
@extends('layout.erp.app')
@section('title','Create ConsultationLabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('consultationlabtests.index')}}">Manage</a>
<form action="{{route('consultationlabtests.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="consultation_id" class="col-sm-2 col-form-label">Consultation Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="consultation_id" id="consultation_id" placeholder="Consultation Id">
	</div>
</div>
<div class="row mb-3">
	<label for="lab_test_id" class="col-sm-2 col-form-label">Lab_Test</label>
	<div class="col-sm-10">
		<select class="form-control" name="lab_test_id" id="lab_test_id">
			@foreach($lab_tests as $lab_test)
				<option value="{{$lab_test->id}}">{{$lab_test->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="lab_test_result" class="col-sm-2 col-form-label">Lab Test Result</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="lab_test_result" id="lab_test_result" placeholder="Lab Test Result">
	</div>
</div>
<div class="row mb-3">
	<label for="created_by" class="col-sm-2 col-form-label">Created By</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="created_by" id="created_by" placeholder="Created By">
	</div>
</div>
<div class="row mb-3">
	<label for="updated_by" class="col-sm-2 col-form-label">Updated By</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
