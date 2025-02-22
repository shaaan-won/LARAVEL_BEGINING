
@extends('layout.erp.app')
@section('title','Create Department')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('departments.index')}}">Manage</a>
<form action="{{route('departments.store')}}" method ="post" enctype="multipart/form-data">
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

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
