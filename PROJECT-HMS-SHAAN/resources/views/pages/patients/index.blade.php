{{-- @extends('layout.erp.app')
@section('page')
    <section id="multilingual-datatable">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success'))
                    <div class="card-header m-2 p-2 d-flex justify-content-center alert alert-success">
                        {{ session('success') }}</div>
                @endif
                <div class="card">

                    <div class="card-header">
                        <h2 class="card-title fw-bolder">Patient List</h2>
                        <a href="{{ url('patients/create') }}" class="btn btn-primary float-end">Add Patient</a>
                    </div>
                    <div class="table-responsive">
                        {{print_r($hospitals->toArray())}}
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Emergency Contact</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Blood Group</th>
                                    <th>Insurance Provider</th>
                                    <th>Insurance Number</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->user_id }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->date_of_birth }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->contact_number }}</td>
                                        <td>{{ $patient->emergency_contact }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>{{ ucfirst($patient->gender) }}</td>
                                        <td>{{ $patient->blood_group }}</td>
                                        <td>{{ $patient->insurance_provider }}</td>
                                        <td>{{ $patient->insurance_number }}</td>
                                        <td>{{ $patient->created_at }}</td>
                                        <td>{{ $patient->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Show Patient Details -->
                                                    <a class="dropdown-item" href="{{ url('patients/' . $patient->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>Show</span>
                                                    </a>
                        
                                                    <!-- Edit Patient -->
                                                    <a class="dropdown-item" href="{{ url('patients/' . $patient->id . '/edit') }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                        
                                                    <!-- Delete Patient -->
                                                    <a class="dropdown-item" href="{{ url('patients/delete/' . $patient->id) }}">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a>
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
                                        <td colspan="15" class="text-center fw-bold text-danger fs-10">No Patients Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}

@extends('layout.erp.app')

@section('page')
    <section id="multilingual-datatable">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
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
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bolder fs-2">Patient List</h2>
                        <a href="{{ url('patients/create') }}" class="btn btn-lg btn-primary">Add Patient</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    {{-- <th>User ID</th> --}}
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    {{-- <th>Emergency Contact</th> --}}
                                    {{-- <th>Address</th> --}}
                                    <th>Gender</th>
                                    <th>Blood Group</th>
                                    {{-- <th>Insurance Provider</th> --}}
                                    {{-- <th>Insurance Number</th> --}}
                                    {{-- <th>Created At</th> --}}
                                    {{-- <th>Updated At</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        {{-- <td>{{ $patient->user_id }}</td> --}}
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->date_of_birth }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->contact_number }}</td>
                                        {{-- <td>{{ $patient->emergency_contact }}</td> --}}
                                        {{-- <td>{{ $patient->address }}</td> --}}
                                        <td>{{ ucfirst($patient->gender) }}</td>
                                        <td>{{ $patient->blood_group }}</td>
                                        {{-- <td>{{ $patient->insurance_provider }}</td> --}}
                                        {{-- <td>{{ $patient->insurance_number }}</td> --}}
                                        {{-- <td>{{ $patient->created_at }}</td> --}}
                                        {{-- <td>{{ $patient->updated_at }}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu p-2">
                                                    <a class="dropdown-item text-success fs-6" href="{{ url('patients/' . $patient->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>Show</span>
                                                    </a>
                                                    <a class="dropdown-item text-primary fs-6" href="{{ url('patients/' . $patient->id . '/edit') }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <form action="{{ url('patients/' . $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');" style="display: inline;">
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
                                        <td colspan="15" class="text-center fw-bold text-danger fs-10">No Patients Found</td>
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
