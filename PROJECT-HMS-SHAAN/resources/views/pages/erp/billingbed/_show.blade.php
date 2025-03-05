
?>
@extends('layout.erp.app')
@section('title','Show BillingBed')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billingbeds.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$billingbed->id}}</td></tr>
		<tr><th>Billing Id</th><td>{{$billingbed->billing_id}}</td></tr>
		<tr><th>Bed Id</th><td>{{$billingbed->bed_id}}</td></tr>
		<tr><th>Price</th><td>{{$billingbed->price}}</td></tr>
		<tr><th>Created At</th><td>{{$billingbed->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$billingbed->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
