{{-- 
@extends('layout.erp.app')
@section('title','Edit Service')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('services.index')}}">Manage</a>
<form action="{{route('services.update',$service)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$service->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$service->price}}" id="price" placeholder="Price">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')
@section('title', 'Edit Service')
@section('style')
@endsection

@section('page')
<section class="bs-validation">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9 col-12 mt-3 fw-bold fs-4 mx-auto">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bolder fs-2">Edit Service Details of <span class="text-white">{{ $service->name }}</span></h3>
                    <a href="{{ route('services.index') }}" class="btn btn-lg btn-warning">Back</a>
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
                    <form action="{{ route('services.update', $service) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Name Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="name">Service Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter Service Name" value="{{ old('name', $service->name) }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Price Input --}}
                        <div class="mb-1">
                            <label class="form-label fw-bold fs-5" for="price">Price</label>
                            <input type="text" class="form-control form-control-lg" id="price" name="price"
                                placeholder="Enter Price" value="{{ old('price', $service->price) }}" />
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