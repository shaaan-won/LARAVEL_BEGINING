@extends('layouts.backend.main')



@section('page-content')

<div class="container mt-5">
    <div class="card shadow-lg">
        {{-- @if (session('success'))   WHY??????????????
            <div class="card-header m-2 p-2 d-flex justify-content-center alert alert-danger">
                {{ session('success') }}
            </div>        
        @endif --}}
        <div class="card-header bg-warning text-white">
            <h3 class="mb-0 card-title fw-bolder fs-2 text-white ">Are you sure you want to delete?</h3>
            <form action="{{ url('hospital_list/' . $data_id['id']) }}" method="POST" class="d-inline float-end ">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0 card-title fw-bolder fs-2 text-white ">{{ $data_id['name'] }} Details for Deletion</h3>
            <a href="{{ url('hospital_list') }}" class="btn btn-warning float-end">Back</a>
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
            <a href="{{ url('hospital_list') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ url('hospital_list/' . $data_id['id'] . '/edit') }}" class="btn btn-warning">Edit</a>
            <form action="{{ url('hospital_list/' . $data_id['id']) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
