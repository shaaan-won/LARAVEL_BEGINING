
@extends('layout.erp.app')
@section('title','Create LabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('labtests.index')}}">Manage</a>
<form action="{{route('labtests.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="description" class="col-sm-2 col-form-label">Description</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="discount_percentage" class="col-sm-2 col-form-label">Discount Percentage</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount_percentage" id="discount_percentage" placeholder="Discount Percentage">
	</div>
</div>
<div class="row mb-3">
	<label for="category_id" class="col-sm-2 col-form-label">Category</label>
	<div class="col-sm-10">
		<select class="form-control" name="category_id" id="category_id">
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				<option value="{{$status->id}}">{{$status->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="created_by" class="col-sm-2 col-form-label">Created By</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="created_by" id="created_by" placeholder="Created By">
	</div>
</div>
<div class="row mb-3">
	<label for="updated_by" class="col-sm-2 col-form-label">Updated By</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
