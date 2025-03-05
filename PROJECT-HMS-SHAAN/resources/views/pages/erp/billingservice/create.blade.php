{{-- 
@extends('layout.erp.app')
@section('title','Create BillingService')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billingservices.index')}}">Manage</a>
<form action="{{route('billingservices.store')}}" method ="post" enctype="multipart/form-data">
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
	<label for="service_id" class="col-sm-2 col-form-label">Service</label>
	<div class="col-sm-10">
		<select class="form-control" name="service_id" id="service_id">
			@foreach($services as $service)
				<option value="{{$service->id}}">{{$service->name}}</option>
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


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Create Billing Service')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder text-white fs-2">Add Billing Service</h3>
                    <a href="{{ route('billingservices.index') }}" class="btn btn-lg btn-warning">Back</a>
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
                    <form action="{{ route('billingservices.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Billing ID Dropdown --}}
                        <div class="mb-1">
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

                        {{-- Service ID Dropdown --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="service_id">Service</label>
                            <select class="form-select form-control-lg" name="service_id" id="service_id">
                                <option value="">Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Price Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="price">Price</label>
                            <input type="text" class="form-control form-control-lg" name="price" id="price"
                                placeholder="Enter Price" value="{{ old('price') }}" />
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
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