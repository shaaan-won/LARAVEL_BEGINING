
@extends('layout.erp.app')
@section('title','Show Billing')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billings.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$billing->id}}</td></tr>
		<tr><th>Patient Id</th><td>{{$billing->patient_id}}</td></tr>
		<tr><th>Appointment Id</th><td>{{$billing->appointment_id}}</td></tr>
		<tr><th>Total Amount</th><td>{{$billing->total_amount}}</td></tr>
		<tr><th>Discount</th><td>{{$billing->discount}}</td></tr>
		<tr><th>Tax</th><td>{{$billing->tax}}</td></tr>
		<tr><th>Paid Amount</th><td>{{$billing->paid_amount}}</td></tr>
		<tr><th>Balance Amount</th><td>{{$billing->balance_amount}}</td></tr>
		<tr><th>Payment Status Id</th><td>{{$billing->payment_status_id}}</td></tr>
		<tr><th>Payment Mode</th><td>{{$billing->payment_mode}}</td></tr>
		<tr><th>Created At</th><td>{{$billing->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$billing->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
