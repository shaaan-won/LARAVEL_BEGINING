{{-- 
@extends('layout.erp.app')
@section('title','Show BillingMedicine')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billingmedicines.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$billingmedicine->id}}</td></tr>
		<tr><th>Billing Id</th><td>{{$billingmedicine->billing_id}}</td></tr>
		<tr><th>Medicine Id</th><td>{{$billingmedicine->medicine_id}}</td></tr>
		<tr><th>Quantity</th><td>{{$billingmedicine->quantity}}</td></tr>
		<tr><th>Price</th><td>{{$billingmedicine->price}}</td></tr>
		<tr><th>Created At</th><td>{{$billingmedicine->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$billingmedicine->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')

@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Billing Medicine Details</h3>
                        <a href="{{ route('billingmedicines.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $billingmedicine->id }}</td>
                                </tr>
                                <tr>
                                    <th>Billing ID</th>
                                    <td>{{ $billingmedicine->billing_id }}</td>
                                </tr>
                                <tr>
                                    <th>Medicine ID</th>
                                    <td>{{ $billingmedicine->medicine_id }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $billingmedicine->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $billingmedicine->price }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $billingmedicine->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $billingmedicine->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('billingmedicines.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('billingmedicines.edit', $billingmedicine->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('billingmedicines.destroy', $billingmedicine->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this billing medicine?');" class="d-inline">
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