@extends('layout.erp.app')

@section('page')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0 card-title fw-bolder fs-2 text-white">{{ $doctor->name }} Details</h3>
                <a href="{{ url('doctors') }}" class="btn btn-warning float-end">Back</a>
            </div>
            <div class="card-body table-responsive mt-2">
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $doctor->id }}</td>
                        </tr>
                        <tr>
                            <th>Author User</th>
                            <td>{{ optional($doctor->user)->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $doctor->name }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $doctor->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>{{ optional($doctor->department)->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Specialization</th>
                            <td>{{ $doctor->specialization ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Experience</th>
                            <td>{{ $doctor->experience ? $doctor->experience . ' years' : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $doctor->contact_number ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $doctor->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $doctor->address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ ucfirst($doctor->gender) }}</td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td>{{ $doctor->qualification ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Medical Registration No</th>
                            <td>{{ $doctor->registration_no ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Biography</th>
                            <td>{{ $doctor->bio ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Consultation Fee</th>
                            <td>{{ $doctor->consultation_fee ? '$' . number_format($doctor->consultation_fee, 2) : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-{{ $doctor->status->name == 'Active' ? 'success' : 'danger' }}">
                                    {{ Str::upper($doctor->status->name) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $doctor->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $doctor->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                @if ($doctor->photo)
                                    <img src="{{ asset('img/doctors/' . $doctor->photo) }}" alt="Doctor Photo" style="max-width: 120px; height: auto; border: 1px solid #ccc;">
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center justify-content-between">
                <a href="{{ url('doctors/') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ url('doctors/' . $doctor->id . '/edit') }}" class="btn btn-warning">Edit</a>
                <form action="{{ url('doctors/' . $doctor->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

