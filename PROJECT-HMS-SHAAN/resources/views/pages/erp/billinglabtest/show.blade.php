
{{-- @extends('layout.erp.app')
@section('title','Show BillingLabTest')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('billinglabtests.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$billinglabtest->id}}</td></tr>
		<tr><th>Billing Id</th><td>{{$billinglabtest->billing_id}}</td></tr>
		<tr><th>Lab Test Id</th><td>{{$billinglabtest->lab_test_id}}</td></tr>
		<tr><th>Price</th><td>{{$billinglabtest->price}}</td></tr>
		<tr><th>Created At</th><td>{{$billinglabtest->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$billinglabtest->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')

@section('title', 'Show BillingLabTest')

@section('style')
    <!-- Add any custom styles here -->
@endsection

@section('page')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-12 mt-3 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bolder text-white fs-2">Billing Lab Test Details</h3>
                        <a href="{{ route('billinglabtests.index') }}" class="btn btn-lg btn-warning">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $billinglabtest->id }}</td>
                                </tr>
                                <tr>
                                    <th>Billing ID</th>
                                    <td>{{ $billinglabtest->billing_id }}</td>
                                </tr>
                                <tr>
                                    <th>Lab Test ID</th>
                                    <td>{{ $billinglabtest->lab_test_id }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $billinglabtest->price }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $billinglabtest->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $billinglabtest->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center justify-content-between">
                        <a href="{{ route('billinglabtests.index') }}" class="btn btn-lg btn-secondary">Back to List</a>
                        <a href="{{ route('billinglabtests.edit', $billinglabtest->id) }}" class="btn btn-lg btn-warning">Edit</a>
                        <form action="{{ route('billinglabtests.destroy', $billinglabtest->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this billing lab test?');" class="d-inline">
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