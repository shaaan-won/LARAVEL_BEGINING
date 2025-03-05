
@extends('layout.erp.app')
@section('title','Manage Billing')
@section('style')


@endsection
@section('page')
<a href="{{route('billings.create')}}">New Billing</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Patient Id</th>
			<th>Appointment Id</th>
			<th>Total Amount</th>
			<th>Discount</th>
			<th>Tax</th>
			<th>Paid Amount</th>
			<th>Balance Amount</th>
			<th>Payment Status Id</th>
			<th>Payment Mode</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($billings as $billing)
		<tr>
			<td>{{$billing->id}}</td>
			<td>{{$billing->patient_id}}</td>
			<td>{{$billing->appointment_id}}</td>
			<td>{{$billing->total_amount}}</td>
			<td>{{$billing->discount}}</td>
			<td>{{$billing->tax}}</td>
			<td>{{$billing->paid_amount}}</td>
			<td>{{$billing->balance_amount}}</td>
			<td>{{$billing->payment_status_id}}</td>
			<td>{{$billing->payment_mode}}</td>
			<td>{{$billing->created_at}}</td>
			<td>{{$billing->updated_at}}</td>

			<td>
			<form action = "{{route('billings.destroy',$billing->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('billings.show',$billing->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('billings.edit',$billing->id)}}"> Edit </a>
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
