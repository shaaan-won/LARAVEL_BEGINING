@extends('layout.erp.app')

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
                        <h2 class="mb-0 fw-bolder fs-2">Doctor List</h2>
                        <a href="{{ url('doctors/create') }}" class="btn btn-lg btn-primary">Add Doctor</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Consultation Fee</th>
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                                        <td>{{ $doctor->contact_number }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>
                                            <img class="img-fluid" style="max-width: 50px; height: auto;" src="{{ asset('img/doctors/' . $doctor->photo) }}" alt="Doctor Photo">
                                        </td>
                                        <td>{{ $doctor->consultation_fee }}</td>
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm hide-arrow bg-light" data-bs-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-2">
                                                        <a class="dropdown-item text-success fs-6" href="{{ url('doctors/' . $doctor->id) }}">
                                                            <i data-feather="eye" class="me-50"></i>
                                                            <span>Show</span>
                                                        </a>
                                                        <a class="dropdown-item text-primary fs-6" href="{{ url('doctors/' . $doctor->id . '/edit') }}">
                                                            <i data-feather="edit-2" class="me-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <form action="{{ url('doctors/' . $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this doctor?');" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger fs-6">
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ? 8 : 7 }}" class="text-center fw-bold text-danger fs-10">No Doctors Found</td>
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