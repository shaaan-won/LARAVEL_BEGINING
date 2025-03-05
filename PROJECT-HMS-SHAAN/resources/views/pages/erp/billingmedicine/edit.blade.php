{{-- 
@extends('layout.erp.app')
@section('title','Edit BillingMedicine')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billingmedicines.index')}}">Manage</a>
<form action="{{route('billingmedicines.update',$billingmedicine)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="billing_id" class="col-sm-2 col-form-label">Billing</label>
	<div class="col-sm-10">
		<select class="form-control" name="billing_id" id="billing_id">
			@foreach($billings as $billing)
				@if($billing->id==$billingmedicine->billing_id)
					<option value="{{$billing->id}}" selected>{{$billing->name}}</option>
				@else
					<option value="{{$billing->id}}">{{$billing->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="medicine_id" class="col-sm-2 col-form-label">Medicine</label>
	<div class="col-sm-10">
		<select class="form-control" name="medicine_id" id="medicine_id">
			@foreach($medicines as $medicine)
				@if($medicine->id==$billingmedicine->medicine_id)
					<option value="{{$medicine->id}}" selected>{{$medicine->name}}</option>
				@else
					<option value="{{$medicine->id}}">{{$medicine->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="quantity" value="{{$billingmedicine->quantity}}" id="quantity" placeholder="Quantity">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$billingmedicine->price}}" id="price" placeholder="Price">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Edit Billing Medicine')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder fs-2">Edit Billing Medicine Details</h3>
                    <a href="{{ route('billingmedicines.index') }}" class="btn btn-lg btn-warning">Back</a>
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
                    <form action="{{ route('billingmedicines.update', $billingmedicine) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Billing ID Dropdown --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="billing_id">Billing</label>
                            <select class="form-select form-control-lg" name="billing_id" id="billing_id">
                                <option value="">Select Billing</option>
                                @foreach($billings as $billing)
                                    <option value="{{ $billing->id }}" {{ old('billing_id', $billingmedicine->billing_id) == $billing->id ? 'selected' : '' }}>
                                        {{ $billing->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('billing_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Medicine ID Dropdown --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="medicine_id">Medicine</label>
                            <select class="form-select form-control-lg" name="medicine_id" id="medicine_id">
                                <option value="">Select Medicine</option>
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}" {{ old('medicine_id', $billingmedicine->medicine_id) == $medicine->id ? 'selected' : '' }}>
                                        {{ $medicine->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('medicine_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Quantity Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="quantity">Quantity</label>
                            <input type="text" class="form-control form-control-lg" name="quantity" id="quantity"
                                placeholder="Enter Quantity" value="{{ old('quantity', $billingmedicine->quantity) }}" />
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Price Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="price">Price</label>
                            <input type="text" class="form-control form-control-lg" name="price" id="price"
                                placeholder="Enter Price" value="{{ old('price', $billingmedicine->price) }}" />
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
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