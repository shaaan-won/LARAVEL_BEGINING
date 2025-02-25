@extends('layout.erp.app')

@section('page')
    <section id="all-appointments">
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
                        <h2 class="mb-0 fw-bolder fs-2">All Appointments</h2>
                        <a href="{{ route('appointments.pending') }}" class="btn btn-lg btn-warning">View Pending
                            Appointments</a>
                    </div>

                    <div class="table-responsive theme-scrollbar card-body">
                        <table class="table table-striped display dataTable no-footer" id="basic-1" role="grid">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->appointment_time }}</td>
                                        <td>
                                            <span
                                                class="badge fs-6 lg fw-bold 
                                                {{ $appointment->status->name == 'Pending'
                                                    ? 'bg-warning text-dark'
                                                    : ($appointment->status->name == 'Approved'
                                                        ? 'bg-success'
                                                        : ($appointment->status->name == 'Completed'
                                                            ? 'bg-primary'
                                                            : 'bg-danger')) }}">
                                                {{ $appointment->status->name }}
                                            </span>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <!-- Update Status Form -->
                                            {{-- <div class="d-flex flex-column align-items-center w-50 me-2">
                                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status_id" class="form-select form-control-sm"
                                                        data-appointment-id="{{ $appointment->id }}" required>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}"
                                                                {{ $appointment->status_id == $status->id ? 'selected' : '' }}>
                                                                {{ $status->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <div class="mt-2" id="cancellation-reason-{{ $appointment->id }}"
                                                        style="display: {{ $appointment->status->name == 'Cancelled' ? 'block' : 'none' }};">
                                                        <textarea name="cancellation_reason" class="form-control" placeholder="Enter cancellation reason">{{ $appointment->cancellation_reason }}</textarea>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm mt-2 w-100">Update</button>
                                                </form>
                                            </div> --}}

                                            <!-- Trash Button to Move Appointment to Trashed Table -->
                                            <div class="d-flex flex-column align-items-center w-50">
                                                <form action="{{ url('appointments/trash', $appointment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2 w-100">Move to
                                                        Trash</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center fw-bold text-danger fs-5">No Appointments
                                            Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            $('select[name="status_id"]').on('change', function() {
                const appointmentId = $(this).data('appointment-id');
                const reasonDiv = $('#cancellation-reason-' + appointmentId);
                const selectedText = $(this).find('option:selected').text();

                if (selectedText === 'Cancelled' || selectedText === 'Rejected') {
                    reasonDiv.show();
                } else {
                    reasonDiv.hide();
                }
            });
        });
    </script>
@endsection
