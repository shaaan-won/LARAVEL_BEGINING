{{-- 
@extends('layout.erp.app')
@section('title','Edit Medicine')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('medicines.index')}}">Manage</a>
<form action="{{route('medicines.update',$medicine)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$medicine->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="category" class="col-sm-2 col-form-label">Category</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="category" value="{{$medicine->category}}" id="category" placeholder="Category">
	</div>
</div>
<div class="row mb-3">
	<label for="dosage" class="col-sm-2 col-form-label">Dosage</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="dosage" value="{{$medicine->dosage}}" id="dosage" placeholder="Dosage">
	</div>
</div>
<div class="row mb-3">
	<label for="strength" class="col-sm-2 col-form-label">Strength</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="strength" value="{{$medicine->strength}}" id="strength" placeholder="Strength">
	</div>
</div>
<div class="row mb-3">
	<label for="manufacturer" class="col-sm-2 col-form-label">Manufacturer</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="manufacturer" value="{{$medicine->manufacturer}}" id="manufacturer" placeholder="Manufacturer">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$medicine->price}}" id="price" placeholder="Price">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection --}}


@extends('layout.erp.app')
@section('title', 'Edit Medicine')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder fs-2">Edit Medicine Details of <span class="text-white">{{ $medicine->name }}</span></h3>
                    <a href="{{ route('medicines.index') }}" class="btn btn-lg btn-warning">Back</a>
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
                    <form action="{{ route('medicines.update', $medicine) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Name Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="name">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter Medicine Name" value="{{ old('name', $medicine->name) }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Category Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="category">Category</label>
                            <input type="text" class="form-control form-control-lg" id="category" name="category"
                                placeholder="Enter Category" value="{{ old('category', $medicine->category) }}" />
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Dosage Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="dosage">Dosage</label>
                            <input type="text" class="form-control form-control-lg" id="dosage" name="dosage"
                                placeholder="Enter Dosage" value="{{ old('dosage', $medicine->dosage) }}" />
                            @error('dosage')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Strength Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="strength">Strength</label>
                            <input type="text" class="form-control form-control-lg" id="strength" name="strength"
                                placeholder="Enter Strength" value="{{ old('strength', $medicine->strength) }}" />
                            @error('strength')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Manufacturer Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="manufacturer">Manufacturer</label>
                            <input type="text" class="form-control form-control-lg" id="manufacturer" name="manufacturer"
                                placeholder="Enter Manufacturer" value="{{ old('manufacturer', $medicine->manufacturer) }}" />
                            @error('manufacturer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Price Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="price">Price</label>
                            <input type="text" class="form-control form-control-lg" id="price" name="price"
                                placeholder="Enter Price" value="{{ old('price', $medicine->price) }}" />
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