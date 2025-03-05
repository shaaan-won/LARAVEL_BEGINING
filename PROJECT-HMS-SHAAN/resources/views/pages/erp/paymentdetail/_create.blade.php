
@extends('layout.erp.app')
@section('title','Create PaymentDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('paymentdetails.index')}}">Manage</a>
<form action="{{route('paymentdetails.store')}}" method ="post" enctype="multipart/form-data">
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
	<label for="amount" class="col-sm-2 col-form-label">Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="amount" id="amount" placeholder="Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="payment_mode" class="col-sm-2 col-form-label">Payment Mode</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
