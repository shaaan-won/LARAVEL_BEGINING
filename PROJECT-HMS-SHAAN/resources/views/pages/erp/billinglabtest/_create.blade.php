
@extends('layout.erp.app')
@section('title','Create BillingLabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billinglabtests.index')}}">Manage</a>
<form action="{{route('billinglabtests.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="billing_id" class="col-sm-2 col-form-label">Billing</label>
	<div class="col-sm-10">
		<select class="form-control" name="billing_id" id="billing_id">
			@foreach($billings as $billing)
				<option value="{{$billing->id}}">{{$billing->name}}</option>
			@endforeach
		</select>
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
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" id="price" placeholder="Price">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
