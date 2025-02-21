@extends('layout.erp.app')
@section('page')

{{-- {{print_r($data_id->toArray())}} --}}

{{-- {{print_r($data_id->name)}}
{{print_r($data_id['name'])}} --}}

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bolder text-white fs-2">{{ $data_id['name'] }} Details</h3>
            <a href="{{ url('hospital_list') }}" class="btn btn-lg btn-warning">Back</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover table-responsive">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $data_id['id'] }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $data_id['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $data_id['country'] }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $data_id['address'] }}</td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>
                            <a href="{{ $data_id['website'] }}" target="_blank">{{ $data_id['website'] }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $data_id['phone'] }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data_id['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $data_id['description'] }}</td>
                    </tr>
                    <tr>
                        <th>Logo</th>
                        <td>
                            <img src="{{ asset('img/hospital_list/logos/' . $data_id['logo']) }}" 
                                 alt="Hospital Logo" class="img-fluid" style="max-width: 100px; height: auto;">
                        </td>
                    </tr>
                    <tr>
                        <th>Banner</th>
                        <td>
                            <img src="{{ asset('img/hospital_list/banners/' . $data_id['banner']) }}" 
                                 alt="Hospital Banner" class="img-fluid" style="max-width: 200px; height: auto;">
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $data_id['created_at']->format('d M Y, h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $data_id['updated_at']->format('d M Y, h:i A') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center justify-content-between">
            <a href="{{ url('hospital_list') }}" class="btn btn-lg btn-secondary">Back to List</a>
            <a href="{{ url('hospital_list/' . $data_id['id'] . '/edit') }}" class="btn btn-lg btn-warning">Edit</a>
            <form action="{{ url('hospital_list/' . $data_id['id']) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this hospital?');" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
