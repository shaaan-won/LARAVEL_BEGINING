{{-- 
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


@endsection --}}

@extends('layout.erp.app')

@section('title', 'Manage PaymentDetail')

@section('style')
    <!-- Add any custom styles here -->
@endsection

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
                        <h2 class="mb-0 fw-bolder fs-2">Payment Details</h2>
                        <a href="{{ route('paymentdetails.create') }}" class="btn btn-lg btn-primary">New PaymentDetail</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Billing ID</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($paymentdetails as $paymentdetail)
                                    <tr>
                                        <td>{{ $paymentdetail->id }}</td>
                                        <td>{{ $paymentdetail->billing_id }}</td>
                                        <td>{{ $paymentdetail->amount }}</td>
                                        <td>{{ $paymentdetail->payment_mode }}</td>
                                        <td>{{ $paymentdetail->created_at }}</td>
                                        <td>{{ $paymentdetail->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu p-2">
                                                    <!-- Show Link -->
                                                    <a class="dropdown-item text-success fs-6" href="{{ route('paymentdetails.show', $paymentdetail->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>Show</span>
                                                    </a>

                                                    <!-- Edit Link -->
                                                    <a class="dropdown-item text-primary fs-6" href="{{ route('paymentdetails.edit', $paymentdetail->id) }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>

                                                    <!-- Delete Link (with confirmation) -->
                                                    <form action="{{ route('paymentdetails.destroy', $paymentdetail->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment detail?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger fs-6">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Feather Icons Script -->
                                            <script>
                                                feather.replace();
                                            </script>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center fw-bold text-danger fs-10">No Payment Details Found</td>
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

@section('script')
    <!-- Add any custom scripts here -->
@endsection