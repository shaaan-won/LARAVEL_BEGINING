{{-- 
@extends('layout.erp.app')
@section('title', 'Manage Appointment')
@section('style')


@endsection
@section('page')
<a href="{{route('appointments.create')}}">New Appointment</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Doctor Id</th>
			<th>Patient Id</th>
			<th>Appointment Date</th>
			<th>Appointment Time</th>
			<th>Status Id</th>
			<th>Cancellation Reason</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($appointments as $appointment)
		<tr>
			<td>{{$appointment->id}}</td>
			<td>{{$appointment->doctor->name}}</td>
			<td>{{$appointment->patient->name}}</td>
			<td>{{$appointment->appointment_date}}</td>
			<td>{{$appointment->appointment_time}}</td>
			<td>{{$appointment->status->name}}</td>
			<td>{{$appointment->cancellation_reason}}</td>
			<td>{{$appointment->created_at}}</td>
			<td>{{$appointment->updated_at}}</td>

			<td>
			<form action = "{{route('appointments.destroy',$appointment->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('appointments.show',$appointment->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('appointments.edit',$appointment->id)}}"> Edit </a>
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

@section('title', 'Manage Appointment')

@section('page')
    <section id="appointment-datatable">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                @if (session('success') || session('error'))
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
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bolder fs-2">Appointment List</h2>
                        <a href="{{ route('appointments.create') }}" class="btn btn-lg btn-primary">Book New Appointment</a>
                    </div>
                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped table-responsive display dataTable no-footer" id="basic-1"
                            role="grid" aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status</th>
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        <th>Reason/Message</th>
                                        {{-- <th>Created At</th>
                                    	<th>Updated At</th> --}}
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ optional($appointment->patient)->name }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->appointment_time }}</td>
                                        <td>{{ optional($appointment->status)->name }}</td>
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                            <td>{{ $appointment->cancellation_reason }}</td>
                                            {{-- <td>{{ $appointment->created_at }}</td>
                                            <td>{{ $appointment->updated_at }}</td> --}}
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm hide-arrow bg-light"
                                                        data-bs-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-2">
                                                        <a class="dropdown-item text-success fs-6"
                                                            href="{{ route('appointments.show', $appointment->id) }}">
                                                            <i data-feather="eye" class="me-50"></i> <span>View</span>
                                                        </a>
                                                        <a class="dropdown-item text-primary fs-6"
                                                            href="{{ route('appointments.edit', $appointment->id) }}">
                                                            <i data-feather="edit-2" class="me-50"></i> <span>Edit</span>
                                                        </a>
                                                        <form
                                                            action="{{ route('appointments.destroy', $appointment->id) }}"
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
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ? 9 : 7 }}"
                                            class="text-center fw-bold text-danger">No Appointments Found
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

    <!-- Feather Icons Script -->
    <script>
        feather.replace();
    </script>
@endsection
