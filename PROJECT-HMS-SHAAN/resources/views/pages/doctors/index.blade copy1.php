@extends('layout.erp.app')

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
                        <h2 class="card-title fw-bolder">DOCTOR List</h2>
                        <a href="{{ url('doctors/create') }}" class="btn btn-primary float-end">Add DOCTORS</a>
                    </div>
                    <div class="table-responsive">
                        {{-- {{print_r($doctors->toArray())}} --}}
                        <table class="table table-striped table-responsive"  id="basic-1"
                        role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    {{-- <th>Author User</th> --}}
                                    <th>Name</th>
                                    {{-- <th>Date of Birth</th> --}}
                                    <th>Department</th>
                                    {{-- <th>Specialization</th>
                                    <th>Experience (Years)</th> --}}
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    {{-- <th>Address</th> --}}
                                    {{-- <th>Gender</th> --}}
                                    {{-- <th>Qualification</th> --}}
                                    {{-- <th>Registration No</th> --}}
                                    <th>Photo</th>
                                    {{-- <th>Bio</th> --}}
                                    <th>Consultation Fee</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Created At</th>
                                    <th>Updated At</th> --}}
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        {{-- <td>{{ $doctor->user->name }}</td> --}}
                                        <td>{{ $doctor->name }}</td>
                                        {{-- <td>{{ $doctor->date_of_birth }}</td> --}}
                                        <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                                        {{-- <td>{{ $doctor->specialization }}</td> --}}
                                        {{-- <td>{{ $doctor->experience }}</td> --}}
                                        <td>{{ $doctor->contact_number }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        {{-- <td>{{ $doctor->address }}</td> --}}
                                        {{-- <td>{{ ucfirst($doctor->gender) }}</td> --}}
                                        {{-- <td>{{ $doctor->qualification }}</td> --}}
                                        {{-- <td>{{ $doctor->registration_no }}</td> --}}
                                        <td><img src="{{ asset('img/doctors/' . $doctor->photo) }}" alt="Doctor Photo"
                                                width="50"></td>
                                        {{-- <td>{{ $doctor->bio }}</td> --}}
                                        <td>{{ $doctor->consultation_fee }}</td>
                                        {{-- <td>{{ ucfirst($doctor->status->name) }}</td> --}}
                                        {{-- <td>{{ $doctor->created_at }}</td>
                                        <td>{{ $doctor->updated_at }}</td> --}}
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm  hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ url('doctors/' . $doctor->id) }}">
                                                            <i data-feather="eye" class="me-50"></i>
                                                            <span>Show</span>
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ url('doctors/' . $doctor->id . '/edit') }}">
                                                            <i data-feather="edit-2" class="me-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ url('doctors/delete/' . $doctor->id) }}">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <script>
                                                    feather.replace();
                                                </script>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ? 18 : 16 }}" class="text-center fw-bold text-danger fs-10">No Doctors Found
                                        </td>
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
