
@extends('layout.erp.app')
@section('title','Manage PaymentDetail')
@section('style')


@endsection
@section('page')
<a href="{{route('paymentdetails.create')}}">New PaymentDetail</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Billing Id</th>
			<th>Amount</th>
			<th>Payment Mode</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($paymentdetails as $paymentdetail)
		<tr>
			<td>{{$paymentdetail->id}}</td>
			<td>{{$paymentdetail->billing_id}}</td>
			<td>{{$paymentdetail->amount}}</td>
			<td>{{$paymentdetail->payment_mode}}</td>
			<td>{{$paymentdetail->created_at}}</td>
			<td>{{$paymentdetail->updated_at}}</td>

			<td>
			<form action = "{{route('paymentdetails.destroy',$paymentdetail->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('paymentdetails.show',$paymentdetail->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('paymentdetails.edit',$paymentdetail->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection
