
@extends('layout.erp.app')
@section('title','Show LabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('labtests.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$labtest->id}}</td></tr>
		<tr><th>Name</th><td>{{$labtest->name}}</td></tr>
		<tr><th>Description</th><td>{{$labtest->description}}</td></tr>
		<tr><th>Price</th><td>{{$labtest->price}}</td></tr>
		<tr><th>Discount Percentage</th><td>{{$labtest->discount_percentage}}</td></tr>
		<tr><th>Category Id</th><td>{{$labtest->category_id}}</td></tr>
		<tr><th>Status Id</th><td>{{$labtest->status_id}}</td></tr>
		<tr><th>Created By</th><td>{{$labtest->created_by}}</td></tr>
		<tr><th>Updated By</th><td>{{$labtest->updated_by}}</td></tr>
		<tr><th>Created At</th><td>{{$labtest->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$labtest->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
