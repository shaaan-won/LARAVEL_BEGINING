{{-- 
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


@endsection --}}

@extends('layout.erp.app')

@section('title', 'Show Billing')

@section('style')
    <!-- Add any custom styles here -->
@endsection

@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Billing Details</h3>
                        <a href="{{ route('billings.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $billing->id }}</td>
                                </tr>
                                <tr>
                                    <th>Patient ID</th>
                                    <td>{{ $billing->patient_id }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment ID</th>
                                    <td>{{ $billing->appointment_id }}</td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>{{ $billing->total_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td>{{ $billing->discount }}</td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td>{{ $billing->tax }}</td>
                                </tr>
                                <tr>
                                    <th>Paid Amount</th>
                                    <td>{{ $billing->paid_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Balance Amount</th>
                                    <td>{{ $billing->balance_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status ID</th>
                                    <td>{{ $billing->payment_status_id }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Mode</th>
                                    <td>{{ $billing->payment_mode }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $billing->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $billing->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('billings.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('billings.edit', $billing->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('billings.destroy', $billing->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this billing?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Add any custom scripts here -->
@endsection