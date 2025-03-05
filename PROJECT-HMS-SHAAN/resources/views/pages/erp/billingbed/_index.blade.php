
@extends('layout.erp.app')
@section('title','Manage BillingBed')
@section('style')


@endsection
@section('page')
<a href="{{route('billingbeds.create')}}">New BillingBed</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Billing Id</th>
			<th>Bed Id</th>
			<th>Price</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($billingbeds as $billingbed)
		<tr>
			<td>{{$billingbed->id}}</td>
			<td>{{$billingbed->billing_id}}</td>
			<td>{{$billingbed->bed_id}}</td>
			<td>{{$billingbed->price}}</td>
			<td>{{$billingbed->created_at}}</td>
			<td>{{$billingbed->updated_at}}</td>

			<td>
			<form action = "{{route('billingbeds.destroy',$billingbed->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('billingbeds.show',$billingbed->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('billingbeds.edit',$billingbed->id)}}"> Edit </a>
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
