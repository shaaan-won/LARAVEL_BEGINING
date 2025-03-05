{{-- 
@extends('layout.erp.app')
@section('title','Edit Billing')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billings.index')}}">Manage</a>
<form action="{{route('billings.update',$billing)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="patient_id" class="col-sm-2 col-form-label">Patient</label>
	<div class="col-sm-10">
		<select class="form-control" name="patient_id" id="patient_id">
			@foreach($patients as $patient)
				@if($patient->id==$billing->patient_id)
					<option value="{{$patient->id}}" selected>{{$patient->name}}</option>
				@else
					<option value="{{$patient->id}}">{{$patient->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="appointment_id" class="col-sm-2 col-form-label">Appointment</label>
	<div class="col-sm-10">
		<select class="form-control" name="appointment_id" id="appointment_id">
			@foreach($appointments as $appointment)
				@if($appointment->id==$billing->appointment_id)
					<option value="{{$appointment->id}}" selected>{{$appointment->name}}</option>
				@else
					<option value="{{$appointment->id}}">{{$appointment->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="total_amount" class="col-sm-2 col-form-label">Total Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="total_amount" value="{{$billing->total_amount}}" id="total_amount" placeholder="Total Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$billing->discount}}" id="discount" placeholder="Discount">
	</div>
</div>
<div class="row mb-3">
	<label for="tax" class="col-sm-2 col-form-label">Tax</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="tax" value="{{$billing->tax}}" id="tax" placeholder="Tax">
	</div>
</div>
<div class="row mb-3">
	<label for="paid_amount" class="col-sm-2 col-form-label">Paid Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="paid_amount" value="{{$billing->paid_amount}}" id="paid_amount" placeholder="Paid Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="balance_amount" class="col-sm-2 col-form-label">Balance Amount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="balance_amount" value="{{$billing->balance_amount}}" id="balance_amount" placeholder="Balance Amount">
	</div>
</div>
<div class="row mb-3">
	<label for="payment_status_id" class="col-sm-2 col-form-label">Payment_Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="payment_status_id" id="payment_status_id">
			@foreach($payment_statuss as $payment_status)
				@if($payment_status->id==$billing->payment_status_id)
					<option value="{{$payment_status->id}}" selected>{{$payment_status->name}}</option>
				@else
					<option value="{{$payment_status->id}}">{{$payment_status->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="payment_mode" class="col-sm-2 col-form-label">Payment Mode</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="payment_mode" value="{{$billing->payment_mode}}" id="payment_mode" placeholder="Payment Mode">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Edit Billing')
@section('style')
@endsection

@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder fs-2">Edit Billing Details</h3>
                        <a href="{{ route('billings.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        {{-- Validation Errors if there is any --}}
                        @if (session('success') || session('error'))
                            <div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="alert alert-{{ session('success') ? 'success' : (session('error') ? 'danger' : '') }}"
                                                role="alert">
                                                {{ session('success') ?? session('error') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Form starts here --}}
                        <form action="{{ route('billings.update', $billing) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="patient_id">Patient</label>
                                <select class="form-select form-control-lg" name="patient_id" id="patient_id">
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ $patient->id == $billing->patient_id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="appointment_id">Appointment</label>
                                <select class="form-select form-control-lg" name="appointment_id" id="appointment_id">
                                    @foreach ($appointments as $appointment)
                                        <option value="{{ $appointment->id }}"
                                            {{ $appointment->id == $billing->appointment_id ? 'selected' : '' }}>
                                            {{ $appointment->id}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('appointment_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="total_amount">Total Amount</label>
                                <input type="text" class="form-control form-control-lg" name="total_amount"
                                    id="total_amount" placeholder="Total Amount"
                                    value="{{ old('total_amount', $billing->total_amount) }}" />
                                @error('total_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="discount">Discount</label>
                                <input type="text" class="form-control form-control-lg" name="discount" id="discount"
                                    placeholder="Discount" value="{{ old('discount', $billing->discount) }}" />
                                @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="tax">Tax</label>
                                <input type="text" class="form-control form-control-lg" name="tax" id="tax"
                                    placeholder="Tax" value="{{ old('tax', $billing->tax) }}" />
                                @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="paid_amount">Paid Amount</label>
                                <input type="text" class="form-control form-control-lg" name="paid_amount"
                                    id="paid_amount" placeholder="Paid Amount"
                                    value="{{ old('paid_amount', $billing->paid_amount) }}" />
                                @error('paid_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="balance_amount">Balance Amount</label>
                                <input type="text" class="form-control form-control-lg" name="balance_amount"
                                    id="balance_amount" placeholder="Balance Amount"
                                    value="{{ old('balance_amount', $billing->balance_amount) }}" />
                                @error('balance_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="payment_status_id">Payment Status</label>
                                <select class="form-select form-control-lg" name="payment_status_id" id="payment_status_id">
                                    @foreach ($payment_statuss as $payment_status)
                                        <option value="{{ $payment_status->id }}"
                                            {{ $payment_status->id == $billing->payment_status_id ? 'selected' : '' }}>
                                            {{ $payment_status->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('payment_status_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="payment_mode">Payment Mode</label>
                                <input type="text" class="form-control form-control-lg" name="payment_mode"
                                    id="payment_mode" placeholder="Payment Mode"
                                    value="{{ old('payment_mode', $billing->payment_mode) }}" />
                                @error('payment_mode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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

@section('script')
@endsection