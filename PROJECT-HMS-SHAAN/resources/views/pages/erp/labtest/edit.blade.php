
@extends('layout.erp.app')
@section('title','Edit LabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('labtests.index')}}">Manage</a>
<form action="{{route('labtests.update',$labtest)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$labtest->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="description" class="col-sm-2 col-form-label">Description</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="description" value="{{$labtest->description}}" id="description" placeholder="Description">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$labtest->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="discount_percentage" class="col-sm-2 col-form-label">Discount Percentage</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount_percentage" value="{{$labtest->discount_percentage}}" id="discount_percentage" placeholder="Discount Percentage">
	</div>
</div>
<div class="row mb-3">
	<label for="category_id" class="col-sm-2 col-form-label">Category</label>
	<div class="col-sm-10">
		<select class="form-control" name="category_id" id="category_id">
			@foreach($categories as $category)
				@if($category->id==$labtest->category_id)
					<option value="{{$category->id}}" selected>{{$category->name}}</option>
				@else
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="status_id" class="col-sm-2 col-form-label">Status</label>
	<div class="col-sm-10">
		<select class="form-control" name="status_id" id="status_id">
			@foreach($status as $status)
				@if($status->id==$labtest->status_id)
					<option value="{{$status->id}}" selected>{{$status->name}}</option>
				@else
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="created_by" class="col-sm-2 col-form-label">Created By</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="created_by" value="{{$labtest->created_by}}" id="created_by" placeholder="Created By">
	</div>
</div>
<div class="row mb-3">
	<label for="updated_by" class="col-sm-2 col-form-label">Updated By</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="updated_by" value="{{$labtest->updated_by}}" id="updated_by" placeholder="Updated By">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
