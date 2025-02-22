
@extends('layout.erp.app')
@section('title','Show Status')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('statuss.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$status->id}}</td></tr>
		<tr><th>Name</th><td>{{$status->name}}</td></tr>
		<tr><th>Created At</th><td>{{$status->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$status->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
