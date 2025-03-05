
@extends('layout.erp.app')
@section('title','Edit BillingConsultation')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billingconsultations.index')}}">Manage</a>
<form action="{{route('billingconsultations.update',$billingconsultation)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="billing_id" class="col-sm-2 col-form-label">Billing</label>
	<div class="col-sm-10">
		<select class="form-control" name="billing_id" id="billing_id">
			@foreach($billings as $billing)
				@if($billing->id==$billingconsultation->billing_id)
					<option value="{{$billing->id}}" selected>{{$billing->name}}</option>
				@else
					<option value="{{$billing->id}}">{{$billing->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="consultation_id" class="col-sm-2 col-form-label">Consultation</label>
	<div class="col-sm-10">
		<select class="form-control" name="consultation_id" id="consultation_id">
			@foreach($consultations as $consultation)
				@if($consultation->id==$billingconsultation->consultation_id)
					<option value="{{$consultation->id}}" selected>{{$consultation->name}}</option>
				@else
					<option value="{{$consultation->id}}">{{$consultation->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="consultation_fee" class="col-sm-2 col-form-label">Consultation Fee</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="consultation_fee" value="{{$billingconsultation->consultation_fee}}" id="consultation_fee" placeholder="Consultation Fee">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
