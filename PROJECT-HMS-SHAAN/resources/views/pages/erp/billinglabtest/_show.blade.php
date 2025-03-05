
@extends('layout.erp.app')
@section('title','Show BillingLabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billinglabtests.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$billinglabtest->id}}</td></tr>
		<tr><th>Billing Id</th><td>{{$billinglabtest->billing_id}}</td></tr>
		<tr><th>Lab Test Id</th><td>{{$billinglabtest->lab_test_id}}</td></tr>
		<tr><th>Price</th><td>{{$billinglabtest->price}}</td></tr>
		<tr><th>Created At</th><td>{{$billinglabtest->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$billinglabtest->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
