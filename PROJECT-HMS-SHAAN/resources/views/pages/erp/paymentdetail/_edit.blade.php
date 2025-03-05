
@extends('layout.erp.app')
@section('title','Edit PaymentDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('paymentdetails.index')}}">Manage</a>
<form action="{{route('paymentdetails.update',$paymentdetail)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="billing_id" class="col-sm-2 col-form-label">Billing</label>
	<div class="col-sm-10">
		<select class="form-control" name="billing_id" id="billing_id">
			@foreach($billings as $billing)
				@if($billing->id==$paymentdetail->billing_id)
					<option value="{{$billing->id}}" selected>{{$billing->name}}</option>
				@else
					<option value="{{$billing->id}}">{{$billing->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="amount" class="col-sm-2 col-form-label">Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="amount" value="{{$paymentdetail->amount}}" id="amount" placeholder="Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="payment_mode" class="col-sm-2 col-form-label">Payment Mode</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="payment_mode" value="{{$paymentdetail->payment_mode}}" id="payment_mode" placeholder="Payment Mode">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
