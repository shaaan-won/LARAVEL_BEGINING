
@extends('layout.erp.app')
@section('title','Show PaymentDetail')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('paymentdetails.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$paymentdetail->id}}</td></tr>
		<tr><th>Billing Id</th><td>{{$paymentdetail->billing_id}}</td></tr>
		<tr><th>Amount</th><td>{{$paymentdetail->amount}}</td></tr>
		<tr><th>Payment Mode</th><td>{{$paymentdetail->payment_mode}}</td></tr>
		<tr><th>Created At</th><td>{{$paymentdetail->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$paymentdetail->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
