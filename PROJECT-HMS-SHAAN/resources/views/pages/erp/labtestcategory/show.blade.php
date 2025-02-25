
@extends('layout.erp.app')
@section('title','Show LabTestCategory')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('labtestcategorys.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$labtestcategory->id}}</td></tr>
		<tr><th>Name</th><td>{{$labtestcategory->name}}</td></tr>
		<tr><th>Description</th><td>{{$labtestcategory->description}}</td></tr>
		<tr><th>Status Id</th><td>{{$labtestcategory->status_id}}</td></tr>
		<tr><th>Created At</th><td>{{$labtestcategory->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$labtestcategory->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
