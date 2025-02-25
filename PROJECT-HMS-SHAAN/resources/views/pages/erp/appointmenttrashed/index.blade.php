{{-- 
@extends('layout.erp.app')
@section('title','Manage AppointmentTrashed')
@section('style')


@endsection
@section('page')
<a href="{{route('appointmenttrasheds.create')}}">New AppointmentTrashed</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Doctor Id</th>
			<th>Patient Id</th>
			<th>Appointment Date</th>
			<th>Appointment Time</th>
			<th>Status Id</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($appointmenttrasheds as $appointmenttrashed)
		<tr>
			<td>{{$appointmenttrashed->id}}</td>
			<td>{{$appointmenttrashed->doctor_id}}</td>
			<td>{{$appointmenttrashed->patient_id}}</td>
			<td>{{$appointmenttrashed->appointment_date}}</td>
			<td>{{$appointmenttrashed->appointment_time}}</td>
			<td>{{$appointmenttrashed->status_id}}</td>
			<td>{{$appointmenttrashed->created_at}}</td>
			<td>{{$appointmenttrashed->updated_at}}</td>

			<td>
			<form action = "{{route('appointmenttrasheds.destroy',$appointmenttrashed->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('appointmenttrasheds.show',$appointmenttrashed->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('appointmenttrasheds.edit',$appointmenttrashed->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection --}}

@extends('layout.erp.app')

@section('page')
    <section id="appointment-trashed-list">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div
                                        class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                                        <h2
                                            class="text-center font-weight-bold {{ session('success') ? 'text-success' : 'text-danger' }}">
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
                        <h2 class="mb-0 fw-bolder fs-2">Manage Trashed  Appointment</h2>
                        <a href="{{ route('appointmenttrasheds.create') }}" class="btn btn-lg btn-primary">New Appointment Trashed</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1"
                            role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Doctor ID</th>
                                    <th>Patient ID</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status ID</th>
                                    {{-- <th>Created At</th>
                                    <th>Updated At</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointmenttrasheds as $appointmenttrashed)
                                    <tr>
                                        <td>{{ $appointmenttrashed->id }}</td>
                                        <td>{{ $appointmenttrashed->doctor->name }}</td>
                                        <td>{{ $appointmenttrashed->patient->name }}</td>
                                        <td>{{ $appointmenttrashed->appointment_date }}</td>
                                        <td>{{ $appointmenttrashed->appointment_time }}</td>
                                        <td>{{ $appointmenttrashed->status->name }}</td>
                                        {{-- <td>{{ $appointmenttrashed->created_at }}</td>
                                        <td>{{ $appointmenttrashed->updated_at }}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm hide-arrow bg-light"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu p-2">
                                                    <!-- View Link -->
                                                    <a class="dropdown-item text-success fs-6"
                                                        href="{{ route('appointmenttrasheds.show', $appointmenttrashed->id) }}">
                                                        <i data-feather="eye" class="me-50"></i>
                                                        <span>View</span>
                                                    </a>

                                                    <!-- Edit Link -->
                                                    <a class="dropdown-item text-primary fs-6"
                                                        href="{{ route('appointmenttrasheds.edit', $appointmenttrashed->id) }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>

                                                    <!-- Delete Link (with confirmation) -->
                                                    <form action="{{ route('appointmenttrasheds.destroy', $appointmenttrashed->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this appointment?');"
                                                        style="display: inline;">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
