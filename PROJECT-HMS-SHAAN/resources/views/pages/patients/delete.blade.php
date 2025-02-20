@extends('layout.erp.app')
@section('page')
    <div class="container mt-5">
        {{-- {{print_r($patient)}} --}}
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-white">
                <h3 class="mb-0 card-title fw-bolder fs-2 text-white ">Are you sure you want to delete?</h3>
                <form action="{{ url('patients/' . $patient['id']) }}" method="POST" class="d-inline float-end ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0 card-title fw-bolder fs-2 text-white">{{ $patient->name }} Details</h3>
                <a href="{{ url('patients') }}" class="btn btn-warning float-end">Back</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $patient->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $patient->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $patient->email }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $patient->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>Emergency Contact</th>
                            <td>{{ $patient->emergency_contact }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $patient->address }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ ucfirst($patient->gender) }}</td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>{{ $patient->blood_group }}</td>
                        </tr>
                        <tr>
                            <th>Insurance Provider</th>
                            <td>{{ $patient->insurance_provider }}</td>
                        </tr>
                        <tr>
                            <th>Insurance Number</th>
                            <td>{{ $patient->insurance_number }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ optional($patient->created_at)->format('d M Y, h:i A') }}</td>
                            
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ optional($patient->updated_at)->format('d M Y, h:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center justify-content-between">
                <a href="{{ url('patients') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ url('patients/' . $patient->id . '/edit') }}" class="btn btn-warning">Edit</a>
                <form action="{{ url('patients/' . $patient->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
