{{-- 
@extends('layout.erp.app')
@section('title','Create BillingConsultation')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billingconsultations.index')}}">Manage</a>
<form action="{{route('billingconsultations.store')}}" method ="post" enctype="multipart/form-data">
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
	<label for="consultation_id" class="col-sm-2 col-form-label">Consultation</label>
	<div class="col-sm-10">
		<select class="form-control" name="consultation_id" id="consultation_id">
			@foreach($consultations as $consultation)
				<option value="{{$consultation->id}}">{{$consultation->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="consultation_fee" class="col-sm-2 col-form-label">Consultation Fee</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="consultation_fee" id="consultation_fee" placeholder="Consultation Fee">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Create Billing Consultation')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder text-white fs-2">Create Billing Consultation</h3>
                    <a href="{{ route('billingconsultations.index') }}" class="btn btn-lg btn-warning">Manage Billing Consultations</a>
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

                    <form action="{{ route('billingconsultations.store') }}" method="post" enctype="multipart/form-data">
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

                        <!-- Consultation Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="consultation_id">Consultation</label>
                            <select class="form-select form-control-lg" name="consultation_id" id="consultation_id">
                                <option value="">Select Consultation</option>
                                @foreach($consultations as $consultation)
                                    <option value="{{ $consultation->id }}" {{ old('consultation_id') == $consultation->id ? 'selected' : '' }}>
                                        {{ $consultation->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('consultation_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Consultation Fee Input -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="consultation_fee">Consultation Fee</label>
                            <input type="text" class="form-control form-control-lg" 
                                   name="consultation_fee" id="consultation_fee" 
                                   placeholder="Enter Consultation Fee"
                                   value="{{ old('consultation_fee') }}">
                            @error('consultation_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-50">Save Billing Consultation</button>
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