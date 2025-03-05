{{-- 
@extends('layout.erp.app')
@section('title','Manage BillingMedicine')
@section('style')


@endsection
@section('page')
<a href="{{route('billingmedicines.create')}}">New BillingMedicine</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Billing Id</th>
			<th>Medicine Id</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($billingmedicines as $billingmedicine)
		<tr>
			<td>{{$billingmedicine->id}}</td>
			<td>{{$billingmedicine->billing_id}}</td>
			<td>{{$billingmedicine->medicine_id}}</td>
			<td>{{$billingmedicine->quantity}}</td>
			<td>{{$billingmedicine->price}}</td>
			<td>{{$billingmedicine->created_at}}</td>
			<td>{{$billingmedicine->updated_at}}</td>

			<td>
			<form action = "{{route('billingmedicines.destroy',$billingmedicine->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('billingmedicines.show',$billingmedicine->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('billingmedicines.edit',$billingmedicine->id)}}"> Edit </a>
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


@endsection --}}

@extends('layout.erp.app')

@section('page')
    <section id="multilingual-datatable">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                                        <h2 class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
                                            {{ session('success') ?? session('error') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bolder fs-2">Billing Medicine List</h2>
                        <a href="{{ route('billingmedicines.create') }}" class="btn btn-lg btn-primary">Add Billing Medicine</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1"
                            role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Billing ID</th>
                                    <th>Medicine ID</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($billingmedicines as $billingmedicine)
                                    <tr>
                                        <td>{{ $billingmedicine->id }}</td>
                                        <td>{{ $billingmedicine->billing_id }}</td>
                                        <td>{{ $billingmedicine->medicine_id }}</td>
                                        <td>{{ $billingmedicine->quantity }}</td>
                                        <td>{{ $billingmedicine->price }}</td>
                                        <td>{{ $billingmedicine->created_at }}</td>
                                        <td>{{ $billingmedicine->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu p-2">
                                                    <a class="dropdown-item text-success fs-6" href="{{ route('billingmedicines.show', $billingmedicine->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>Show</span>
                                                    </a>
                                                    <a class="dropdown-item text-primary fs-6" href="{{ route('billingmedicines.edit', $billingmedicine->id) }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <form action="{{ route('billingmedicines.destroy', $billingmedicine->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this billing medicine?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger fs-6">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <script>
                                                feather.replace();
                                            </script>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center fw-bold text-danger fs-10">No Billing Medicines Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
