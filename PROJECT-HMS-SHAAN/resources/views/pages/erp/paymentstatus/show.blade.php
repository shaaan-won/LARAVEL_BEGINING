
@extends('layout.erp.app')
@section('title','Show PaymentStatus')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('paymentstatuss.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$paymentstatus->id}}</td></tr>
		<tr><th>Name</th><td>{{$paymentstatus->name}}</td></tr>
		<tr><th>Created At</th><td>{{$paymentstatus->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$paymentstatus->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
