{{-- 
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


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Create Billing Lab Test')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder text-white fs-2">Create Billing Lab Test</h3>
                    <a href="{{ route('billinglabtests.index') }}" class="btn btn-lg btn-warning">Manage Billing Lab Tests</a>
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

                    <form action="{{ route('billinglabtests.store') }}" method="post" enctype="multipart/form-data">
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

                        <!-- Lab Test Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="lab_test_id">Lab Test</label>
                            <select class="form-select form-control-lg" name="lab_test_id" id="lab_test_id">
                                <option value="">Select Lab Test</option>
                                @foreach($lab_tests as $lab_test)
                                    <option value="{{ $lab_test->id }}" {{ old('lab_test_id') == $lab_test->id ? 'selected' : '' }}>
                                        {{ $lab_test->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lab_test_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Price Input -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5" for="price">Price</label>
                            <input type="text" class="form-control form-control-lg" 
                                   name="price" id="price" 
                                   placeholder="Enter Price"
                                   value="{{ old('price') }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-50">Save Billing Lab Test</button>
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