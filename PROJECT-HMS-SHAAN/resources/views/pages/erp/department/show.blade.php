
@extends('layout.erp.app')
@section('title','Show Department')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('departments.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$department->id}}</td></tr>
		<tr><th>Name</th><td>{{$department->name}}</td></tr>
		<tr><th>Description</th><td>{{$department->description}}</td></tr>
		<tr><th>Created At</th><td>{{$department->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$department->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
