{{-- 
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


@endsection --}}


@extends('layout.erp.app')
@section('title', 'Edit BillingConsultation')
@section('style')
@endsection

@section('page')
    <section class="bs-validation">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder fs-2">Edit BillingConsultation Details</h3>
                        <a href="{{ route('billingconsultations.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        {{-- Validation Errors if there is any --}}
                        @if (session('success') || session('error'))
                            <div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="alert alert-{{ session('success') ? 'success' : (session('error') ? 'danger' : '' )}}"
                                                role="alert">
                                                {{ session('success') ?? session('error') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Form starts here --}}
                        <form action="{{ route('billingconsultations.update', $billingconsultation) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="billing_id">Billing</label>
                                <select class="form-select form-control-lg" name="billing_id" id="billing_id">
                                    @foreach ($billings as $billing)
                                        <option value="{{ $billing->id }}"
                                            {{ $billing->id == $billingconsultation->billing_id ? 'selected' : '' }}>
                                            {{ $billing->id }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('billing_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="consultation_id">Consultation</label>
                                <select class="form-select form-control-lg" name="consultation_id" id="consultation_id">
                                    @foreach ($consultations as $consultation)
                                        <option value="{{ $consultation->id }}"
                                            {{ $consultation->id == $billingconsultation->consultation_id ? 'selected' : '' }}>
                                            {{ $consultation->id }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('consultation_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label fw-bold fs-5" for="consultation_fee">Consultation Fee</label>
                                <input type="text" class="form-control form-control-lg" name="consultation_fee"
                                    id="consultation_fee" placeholder="Consultation Fee"
                                    value="{{ old('consultation_fee', $billingconsultation->consultation_fee) }}" />
                                @error('consultation_fee')
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