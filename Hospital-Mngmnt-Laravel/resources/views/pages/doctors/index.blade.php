@extends('layouts.backend.main')

@section('page-content')
    <section id="multilingual-datatable">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success'))
                    <div class="card-header m-2 p-2 d-flex justify-content-center alert alert-success">
                        {{ session('success') }}</div>
                @endif
                <div class="card">

                    <div class="card-header">
                        <h2 class="card-title fw-bolder">DOCTOR List</h2>
                        <a href="{{ url('doctors/create') }}" class="btn btn-primary float-end">Add DOCTORS</a>
                    </div>
                    <div class="table-responsive">
                        {{-- {{print_r($doctors->toArray())}} --}}
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Department</th>
                                    <th>Specialization</th>
                                    <th>Experience (Years)</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Qualification</th>
                                    <th>Registration No</th>
                                    <th>Photo</th>
                                    <th>Available Days</th>
                                    <th>Available Time</th>
                                    <th>Consultation Fee</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->user_id }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->date_of_birth }}</td>
                                        <td>{{ $doctor->department_id ?? 'N/A' }}</td>
                                        <td>{{ $doctor->specialization }}</td>
                                        <td>{{ $doctor->experience }}</td>
                                        <td>{{ $doctor->contact_number }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->address }}</td>
                                        <td>{{ ucfirst($doctor->gender) }}</td>
                                        <td>{{ $doctor->qualification }}</td>
                                        <td>{{ $doctor->registration_no }}</td>
                                        <td><img src="{{ asset('img/doctors/' . $doctor->photo) }}" alt="Doctor Photo" width="50"></td>
                                        <td>{{ $doctor->available_days }}</td>
                                        <td>{{ $doctor->available_time }}</td>
                                        <td>{{ $doctor->consultation_fee }}</td>
                                        <td>{{ ucfirst($doctor->status) }}</td>
                                        <td>{{ $doctor->created_at }}</td>
                                        <td>{{ $doctor->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url('doctors/' . $doctor->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>Show</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ url('doctors/' . $doctor->id . '/edit') }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ url('doctors/delete/' . $doctor->id) }}">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <script>
                                                feather.replace();
                                            </script>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="21" class="text-center fw-bold text-danger fs-10">No Doctors Found</td>
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