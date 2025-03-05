{{-- 
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


@endsection --}}


@extends('layout.erp.app')
@section('title','Create PaymentDetail')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder text-white fs-2">Create Payment Detail</h3>
                    <a href="{{ route('paymentdetails.index') }}" class="btn btn-lg btn-warning">Manage Payments</a>
                </div>
                <div class="card-body">
                    @if (session('success') || session('error'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}" role="alert">
                                    {{ session('success') ?? session('error') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('paymentdetails.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Billing Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="billing_id">Billing</label>
                            <select class="form-select form-control-lg" name="billing_id" id="billing_id">
                                <option value="">Select Billing</option>
                                @foreach($billings as $billing)
                                    <option value="{{ $billing->id }}" {{ old('billing_id') == $billing->id ? 'selected' : '' }}>
                                        {{ $billing->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('billing_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Amount Input -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="amount">Amount</label>
                            <input type="text" class="form-control form-control-lg" 
                                   name="amount" id="amount" 
                                   placeholder="Enter Amount"
                                   value="{{ old('amount') }}">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Payment Mode Input -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="payment_mode">Payment Mode</label>
                            <select class="form-select form-control-lg" name="payment_mode" id="payment_mode">
                                <option value="">Select Payment Mode</option>
                                <option value="Credit Card" {{ old('payment_mode') == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                                <option value="Bank Transfer" {{ old('payment_mode') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Digital Wallet" {{ old('payment_mode') == 'Digital Wallet' ? 'selected' : '' }}>Digital Wallet</option>
                            </select>
                            @error('payment_mode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-50">Save Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection